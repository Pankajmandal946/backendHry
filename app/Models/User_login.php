<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class User_login extends Model
{
    public $user_login_id;
    public $user_id;
    public $username;
    public $password;
    public $last_login_time;
    public $new_password;
    public $last_login_ip;
    public $default_password_change;
    public $password_change_time;
    public $is_active;
    public $created_by;
    public $created_on;
    public $updated_by;
    public $updated_on;
    public $table_name;
    public $db, $conn;

    function __construct()
    {
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
        // $this->conn = $this->db->connect();
    }

    function CheckInsert()
    {
        $data = [
            'user_id'                  => $this->user_id,
            'username'                 => $this->username,
            'password'                 => $this->generate_password($this->password),
            'last_login_time'          => $this->last_login_time,
            'last_login_ip'            => $this->last_login_ip,
            'default_password_change'  => $this->default_password_change,
            'password_change_time'     => $this->password_change_time,
            'is_active'                => $this->is_active,
            'created_by'               => $this->created_by
        ];

        $sql = "INSERT INTO " . $this->table_name . " (user_id, username, password, last_login_time, last_login_ip, default_password_change, password_change_time, is_active, created_by) VALUES (:user_id, :username, :password, :last_login_time , :last_login_ip, :default_password_change, :password_change_time, :is_active, :created_by)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        $stmt->closeCursor();
        return true;
    }

    function CheckUpdate()
    {
        $data = [
            'user_login_id'     => $this->user_login_id,
            'user_id'           => $this->user_id,
            'username'          => $this->username,
            'password'          => $this->generate_password($this->password),
            'is_active'         => $this->is_active,
            'updated_by'        => $this->updated_by
        ];
        $sql = "UPDATE " . $this->table_name . " SET user_id=:user_id, username=:username, password=:password,  is_active=:is_active, updated_by=:updated_by WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        $stmt->closeCursor();
        return true;
    }

    function validate_login()
    {
        $data = [
            'username'  => $this->username,
            'is_active' => 1
        ];
        $stmt = $this->conn->prepare("SELECT user_login_id, " . $this->table_name . ".user_id, name, email_id, mobile_no, username,user_type.user_type, password, default_password_change FROM " . $this->table_name . " INNER JOIN user ON (" . $this->table_name . ".user_id=user.user_id) INNER JOIN user_type ON (user.user_type_id=user_type.user_type_id) WHERE username = :username AND " . $this->table_name . ".is_active=:is_active");
        $stmt->execute($data);
        $count = $stmt->rowCount();
        $row = $stmt->fetch();
        // $debug_query = $stmt->_debugQuery();
        // echo $debug_query;exit;
        // print_r($row);exit;
        $stmt->closeCursor();
        if ($count > 0) {

            // print_r($row['password']);exit;
            if ($this->validate_password($this->password, $row['password'])) {
                if ($row['default_password_change'] == 1) {
                    $data = [
                        'user_login_id'     => $row['user_login_id'],
                        'last_login_time'   => date('Y-m-d H:i:s')
                    ];
                    $sql = "UPDATE " . $this->table_name . " SET last_login_time =:last_login_time WHERE user_login_id=:user_login_id";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute($data);
                    // print_r($stmt);exit; 
                    $stmt->closeCursor();

                    session_start();
                    $_SESSION["admin_session_status"] = true;
                    $_SESSION["admin_user_id"]        = $row['user_id'];
                    $_SESSION["admin_user_login_id"]  = $row['user_login_id'];
                    $_SESSION["admin_name"]           = $row['name'];
                    $_SESSION["admin_email_id"]       = $row['email_id'];
                    $_SESSION["admin_mobile_no"]      = $row['mobile_no'];
                    $_SESSION["admin_user_type"]      = $row['user_type'];
                    $_SESSION["admin_username"]       = $row['username'];

                    return true;
                } else {
                    throw new \Exception('Please change your default password', 402);
                }
            } else {
                throw new \Exception("Invalid Password", 401);
            }
        } else {
            throw new \Exception('User does not exists', 401);
        }
    }
}
