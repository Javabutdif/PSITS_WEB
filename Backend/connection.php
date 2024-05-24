<?php

session_start();

error_reporting(0);

class Database {
    private static $instance;
    private $conn;
    private $db_host = "localhost"; 
    private $db_username = "root"; 
    private $db_password = ""; 
    private $db_name = "psits"; 
    private $db_port = "3306"; 

    private function __construct() {
        $this->conn = mysqli_connect($this->db_host, $this->db_username , $this->db_password, $this->db_name, $this->db_port);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

date_default_timezone_set('Asia/Manila');

function logs($log_name, $log_details)
{
    $db = Database::getInstance();
    $conn = $db->getConnection();
    $log_date = date('m-d-Y');
    $log_time = date('H-i-s');

    $sql = "INSERT INTO logs (`log_name`,`log_details`,`log_date`,`log_time`) VALUES ('$log_name','$log_details','$log_date','$log_time')";

    mysqli_query($conn, $sql);
}

