<?php
class DashboardModel
{
    private $db;
    public function __construct()
    {
        $this->db = MySQL::getInstance();
    }
    public function getStats()
    {
        try {
            // Fetch general statistics
            $r['statistics'] = $this->db->result(
                $this->db->query("
                SELECT 
                    (
                        SELECT COUNT(*) 
                        FROM users
                    ) AS total_users,
                    (
                        SELECT COUNT(*) 
                        FROM requests
                    ) AS total_cow_pictures,
                    (
                        SELECT COUNT(DISTINCT ip_address) 
                        FROM visitor
                    ) AS unique_visitors,
                    (
                        SELECT COUNT(*) 
                        FROM visitor
                    ) AS total_page_views
                "))[0];
    
            // Fetch weekly data for the "Weeks" series
            $weeklyData = $this->db->result(
                $this->db->query("
                SELECT WEEK(created_at) AS week_number, COUNT(*) AS total_requests 
                FROM requests 
                GROUP BY week_number 
                ORDER BY week_number
            "));
    
            // Fetch monthly data for the "Months" series
            $monthlyData = $this->db->result(
                $this->db->query("
                SELECT MONTH(created_at) AS month_number, COUNT(*) AS total_requests 
                FROM requests 
                GROUP BY month_number 
                ORDER BY month_number
            "));
    
            // Prepare data for the chart
            $r['series'] = [
                [
                    'name' => 'Weeks',
                    'data' => array_map(function($row) {
                        return (int) $row->total_requests;
                    }, $weeklyData),
                    'type' => 'area'
                ],
                [
                    'name' => 'Months',
                    'data' => array_map(function($row) {
                        return (int) $row->total_requests;
                    }, $monthlyData),
                    'type' => 'line'
                ]
            ];
    
            return $r;
    
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function logVisitor()
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? null;

        if (!$this->db->query("
			INSERT INTO visitor
				(page, ip_address, user_agent, referrer)
				VALUES(
                    '" . $_SERVER['REQUEST_URI'] . "',
					'" . Generic::UserIP() . "',
					'" . $_SERVER['HTTP_USER_AGENT'] . "',
                    '" . $referer . "'
				)
			"))
            return false;
        return true;
    }
    

}