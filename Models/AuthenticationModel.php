<?php
class AuthenticationModel
{
    private $db;
    public function __construct()
    {
        $this->db = MySQL::getInstance();
    }



    public function signIn()
    {
        try {
         
            return $this->db->result(
                $this->db->query("
                    SELECT *
                        FROM administrator
                        WHERE email = " . $this->db->escape(Request::post('email')) . "
                        AND password = " . $this->db->escape(md5(Request::post('password'))) . "
                        AND status = '1'
                ")
            );
        } catch (Exception $e) {
            throw $e;
        }
    }




    public function isUserPassword($userID, $password)
    {
        try {
            if ((int)$this->db->result(
                $this->db->query("
                    SELECT COUNT(*) AS count
                        FROM administrator
                        WHERE id = " . $this->db->escape($userID) . "
                        AND password = " . $this->db->escape(md5($password)) . "
                ")
            )[0]->count > 0)
                return true;
            return false;
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function updatePassword()
    {
        try {
            if (!$this->db->query("
                UPDATE administrator
                  SET
                    password = " . $this->db->escape(md5(Request::post('password'))) . "
                  WHERE status = '1'
                  AND id = " . $this->db->escape(Session::get('uid')) . "
                "))
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }



}
