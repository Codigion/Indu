<?php
class UsersModel
{
    private $db;
    public function __construct()
    {
        $this->db = MySQL::getInstance();
    }


    public function getAllUsers()
    {
        try {

            $condition = '';
            if (Request::post('search')) {
                $condition .= "AND (
                    u.name LIKE " . $this->db->escape('%' . Request::post('search') . '%') . "
                    OR
                    r.quality LIKE " . $this->db->escape('%' . Request::post('search') . '%') . "
                    OR
                    r.cow_id LIKE " . $this->db->escape('%' . Request::post('search') . '%') . "
            )";
            }

            return $this->db->result(
                $this->db->query("
                SELECT 
                    u.created_at AS timestamp,
                    u.name,
                    u.id AS user_id,
                    COUNT(r.id) AS no_requests
                FROM 
                    users u
                LEFT JOIN 
                    requests r ON u.id = r.user_id
                    WHERE u.status = '1'
                    AND r.status = '1'
                    " . $condition . "
                GROUP BY 
                    u.id
                ORDER BY 
                    u.created_at
                ")
            );
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function getUserDetails($userID)
    {
        try {

            return $this->db->result(
                $this->db->query("
                  SELECT 
                    m.version AS model_ver,
                    m.name AS model_name,
                    r.created_at AS timestamp,
                    r.*
                FROM 
                    users u
                JOIN 
                    requests r ON u.id = r.user_id
                JOIN 
                    models m ON r.model_version = m.id
                WHERE 
                    u.id = " . $this->db->escape($userID) . "
                    AND u.status = '1'
                    AND r.status = '1'
                ")
            );
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function getUserName($userID)
    {
        try {

            return $this->db->result(
                $this->db->query("
                SELECT 
                    u.name AS username
                    FROM 
                    users u
                WHERE 
                    u.id = " . $this->db->escape($userID) . "
                ")
            );
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function tryNow($userID = false)
    {
        try {

            // For APP
            if ($userID) {
                if (!$this->db->query("
                UPDATE users
                  SET name =  " . $this->db->escape(Request::post('name')) . ",
                  status = '1'
                WHERE id = ". $this->db->escape($userID) . "
                "))
                    return false;
                return true;
            }

            if (!$this->db->query("
                    INSERT INTO users
                        (name, status)
                        VALUES(
                            " . $this->db->escape(Request::post('name')) . ",
                            '1'
                        )
                    "))
                return false;
            $TryID = $this->db->insertID();
            return $TryID;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function tryNowApp()
    {
        try {
            if (!$this->db->query("
                    INSERT INTO users
                        (status)
                        VALUES(
                            '1'
                        )
                    "))
                return false;
            $TryID = $this->db->insertID();
            return $TryID;
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function isAppUserLogined($userID)
    {
        try {
            if ((int)$this->db->result(
                $this->db->query("
                    SELECT COUNT(*) AS count
                        FROM users
                        WHERE id = " . $this->db->escape($userID) . "
                ")
            )[0]->count > 0)
                return true;
            return false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function identifyCow($pictureOrginal, $pictureMuzzle)
    {
        try {
            if (!$this->db->query("
                    INSERT INTO requests
                        (user_id, quality, temperature, threshold,  picture_orginal, picture_muzzle, cow_id, confidence_score, model_version,  status)
                        VALUES(
                            " . $this->db->escape(Cookie::get('cid')) . ",
                            " . $this->db->escape(Request::post('quality')) . ",
                            " . $this->db->escape(Request::post('temperature')) . ",
                            " . $this->db->escape(Request::post('threshold')) . ",
                            " . $this->db->escape($pictureOrginal) . ",
                            " . $this->db->escape($pictureMuzzle) . ",
                            " . $this->db->escape(Request::post('cow_id')) . ",
                            " . $this->db->escape(Request::post('confidence_score')) . ",
                            " . $this->db->escape(Request::post('model_version')) . ",
                            '1'
                        )
                    "))
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function identifyCowFailed($pictureOrginal, $error, $command)
    {
        try {
            if (!$this->db->query("
                    INSERT INTO requests_failed
                        (user_id, picture_orginal, error ,command , model_version,  status)
                        VALUES(
                            " . $this->db->escape(Cookie::get('cid')) . ",
                            " . $this->db->escape($pictureOrginal) . ",
                            " . $this->db->escape($error) . ",
                            " . $this->db->escape($command) . ",
                            " . $this->db->escape(Request::post('model_version')) . ",
                            '1'
                        )
                    "))
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
