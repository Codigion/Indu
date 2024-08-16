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
                $condition .= "WHERE (
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
            // r.thershold,
            // r.temperature,

            return $this->db->result(
                $this->db->query("
                  SELECT 
                    m.version AS model_version,
                    m.name AS model_name,
                    r.created_at AS timestamp,
                    r.cow_id,
                    r.picture_orginal,
                    r.picture_muzzle
                FROM 
                    users u
                JOIN 
                    requests r ON u.id = r.user_id
                JOIN 
                    models m ON r.model_version = m.id
                WHERE 
                    u.id = " . $this->db->escape($userID) . "
                ")
            );
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function tryNow()
    {
        try {
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
}
