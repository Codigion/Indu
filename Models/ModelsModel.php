<?php
class ModelsModel
{
    private $db;
    public function __construct()
    {
        $this->db = MySQL::getInstance();
    }


    public function getAllModel()
    {
        try {

            return $this->db->result(
                $this->db->query("
                    SELECT 
                        m.id AS id,
                        m.name AS model_name,
                        m.created_at AS timestamp,
                        m.version AS model_version,
                        COUNT(r.id) AS no_of_consumptions,  
                        m.is_active AS active_status
                    FROM 
                        models AS m
                    LEFT JOIN 
                        requests r ON m.id = r.model_version
                    GROUP BY 
                         m.id;
                ")
            );
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getActiveModel()
    {
        try {

            return $this->db->result(
                $this->db->query("
                    SELECT *
                        FROM models
                        WHERE status = '1'
                        AND is_active = '1'
                ")
            );
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function deleteModel($modelID)
    {
        try {
            if (!$this->db->query("
                UPDATE models
                    SET status = '0'
                    WHERE id = " . $this->db->escape($modelID) . "
                "))
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function changeStatus($modelID, $status)
    {
        try {
            if (!$this->db->query("
                UPDATE models
                    SET is_active = " . $this->db->escape($status) . " 
                    WHERE id = " . $this->db->escape($modelID) . "
                "))
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function updateStatusModel($modelID)
    {
        try {
            if (!$this->db->query("
                UPDATE models
                    SET is_active = '1'
                    WHERE id = " . $this->db->escape($modelID) . "
                    AND status = '1'
                "))
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function isActiveModel()
    {
        try {
            if ((int)$this->db->result(
                $this->db->query("
                    SELECT COUNT(*) AS count
                        FROM models
                        WHERE status = '1'
                        AND is_active = '1'
                ")
            )[0]->count > 0)
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function checkIfModelActiveAndInUse($modelID)
    {
        try {
            if ((int)$this->db->result(
                $this->db->query("
                    SELECT COUNT(*) AS count
                        FROM models
                        WHERE status = '1'
                        AND is_active = '1'
                        AND id = " . $this->db->escape($modelID) . "
                ")
            )[0]->count > 0)
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function addModel($Yolo, $ResNet, $Yml)
    {
        try {

            if (!$this->db->query("
                INSERT INTO models
                    (name,version, yolo, resnet50, cow_ref, status, is_active)
                    VALUES(
                        " . $this->db->escape(Request::post('name'))  . ",
                        " . $this->db->escape(Request::post('version'))  . ",
                        " . $this->db->escape($Yolo)  . ",
                        " . $this->db->escape($ResNet)  . ",
                        " . $this->db->escape($Yml)  . ",
                        '1',
                        '0'
                    )
                "))
                return false;
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
