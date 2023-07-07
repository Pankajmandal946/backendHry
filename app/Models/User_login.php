<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class User_login extends Model
{
    public $user_login_id, $user_id, $username, $password, $last_login_time, $new_password, $last_login_ip, $default_password_change, $password_change_time, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $db, $conn;

    function __construct()
    {
        // $db[] = \Config\Database::connect();
        parent::__construct();
        $this->user_login_id = "";
        $this->user_id = 0;
        $this->username = "";
        $this->password = "";
        $this->last_login_time = NULL;
        $this->last_login_ip = "";
        $this->default_password_change = 0;
        $this->password_change_time = NULL;
        $this->is_active = 1;
        $this->created_by = 0;
        $this->updated_by = 0;
        $this->table_name = "user_login";
        $this->db = new Database();
        $this->conn = $this->db;
    }

    function validate_login()
    {
        $data = [
            'username'  => $this->username,
            'is_active' => 1
        ];
        
        // $query   = $this->conn->query("SELECT user_login_id, " . $this->table_name . ".user_id, name, email_id, mobile_no, username,user_type.user_type, password, default_password_change FROM " . $this->table_name . " INNER JOIN user ON (" . $this->table_name . ".user_id=user.user_id) INNER JOIN user_type ON (user.user_type_id=user_type.user_type_id) WHERE username = :username AND " . $this->table_name . ".is_active=:is_active");
       
    }
}
/*
$stmt = $this->conn->prepare("SELECT user_login_id, " . $this->table_name . ".user_id, name, email_id, mobile_no, username,user_type.user_type, password, default_password_change FROM " . $this->table_name . " INNER JOIN user ON (" . $this->table_name . ".user_id=user.user_id) INNER JOIN user_type ON (user.user_type_id=user_type.user_type_id) WHERE username = :username AND " . $this->table_name . ".is_active=:is_active");
        $stmt->execute($data);
        $count = $stmt->rowCount();
        echo $count;exit;
        $row = $stmt->fetch();
        $debug_query = $stmt->_debugQuery();
        echo $debug_query;exit;
        // print_r($row);exit;
        $stmt->closeCursor();
*/