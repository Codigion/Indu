<?php
class SettingsModel
{
    private $db;
    public function __construct()
    {
        $this->db = MySQL::getInstance();
    }


    public function getAllSetting()
    {
        try {
            return $this->db->result(
                $this->db->query("
                    SELECT *
                        FROM settings
                ")
            );
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function updateSettings()
    {
        try {
            if (!$this->db->query("
                UPDATE settings
                  SET
                   threshold = " . $this->db->escape(Request::post('threshold')) . ",
                   temperature = " . $this->db->escape(Request::post('temperature')) . "
                WHERE id = '1';
                "))
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
