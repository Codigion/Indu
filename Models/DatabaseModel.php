<?php

class DatabaseModel
{
    private $db;
    public function __construct()
    {
        $this->db = MySQL::getInstance();
    }


    public function getAllDatabase()
    {
        try {

            $condition = '';
            if (Request::post('search')) {
                $condition .= "AND (
                    u.name LIKE " . $this->db->escape('%' . Request::post('search') . '%') . "
                    OR
                    r.quality LIKE " . $this->db->escape('%' . Request::post('search') . '%') . "
                    OR
                    m.name LIKE " . $this->db->escape('%' . Request::post('search') . '%') . "
                    OR
                    r.cow_id LIKE " . $this->db->escape('%' . Request::post('search') . '%') . "
            )";
            }

            return $this->db->result(
                $this->db->query("
                 SELECT 
                    u.name AS user_name,
                    r.*,
                    m.version AS model_version,
                    m.name AS model_name
                FROM 
                    requests r
                JOIN 
                    users u ON r.user_id = u.id
                JOIN 
                    models m ON r.model_version = m.id
                     " . $condition . "
                    ORDER BY r.id DESC
                ")
            );
        } catch (Exception $e) {
            throw $e;
        }
    }



}
