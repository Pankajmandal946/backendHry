<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class User_login extends Model
{
    public $user_login_id, $user_id, $username, $password, $last_login_time, $new_password, $last_login_ip, $default_password_change, $password_change_time, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $db, $conn;

    function __construct()
    {
        // $db = \Config\Database::connect();
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
        $this->db = \Config\Database::connect();
        $this->table_name = "user_login" ; // $this->db->table('user_login'); 
        
    }

    function validate_login()
    {
        $user = $this->username;
        $is_act = 1;

        $query   = $this->db->query("SELECT user_login_id, " . $this->table_name . ".user_id, name, email_id, mobile_no, username,user_type.user_type, password, default_password_change FROM " . $this->table_name . " INNER JOIN user ON (" . $this->table_name . ".user_id=user.user_id) INNER JOIN user_type ON (user.user_type_id=user_type.user_type_id) WHERE username = '$user' AND " . $this->table_name . ".is_active='$is_act'");
        // $count = $query['resultID']['num_rows'];
        // print_r($count);exit;
        $row   = $query->getRowArray();
        if(isset($row) && count($row)>0) {
            // print_r(count($row));exit;
            if($this->validate_password($this->password, $row['password'])) {
                if($row['default_password_change']==1) {
                    // print_r($row);exit;
                    date_default_timezone_set("Asia/Calcutta");
                    $user_login_id = $row['user_login_id'];
                    $last_login_time = date('Y-m-d H:i:s');
                    
                    $data = [
                        'user_login_id'     => $row['user_login_id'],
                        'last_login_time'   => date('Y-m-d H:i:s')
                    ];
                    // print_r($user_login_id);
                    // echo "<br>";
                    // print_r($last_login_time);exit;
                    $query   = $this->db->query("UPDATE ".$this->table_name." SET last_login_time ='$last_login_time' WHERE user_login_id='$user_login_id'");
                    // print_r($query);exit;
                    $this->db->close();
                    
                    session_start();
                    $_SESSION["pdk_session_status"] = true;
                    $_SESSION["pdk_user_id"]        = $row['user_id'];
                    $_SESSION["pdk_user_login_id"]  = $row['user_login_id'];
                    $_SESSION["pdk_name"]           = $row['name'];
                    $_SESSION["pdk_email_id"]       = $row['email_id'];
                    $_SESSION["pdk_mobile_no"]      = $row['mobile_no'];
                    $_SESSION["pdk_user_type"]      = $row['user_type'];
                    $_SESSION["pdk_username"]       = $row['username'];
                   
                    return true;
                } else {
                    throw new \Exception('Please change your default password', 402);
                }
            } else {
                throw new \Exception("Invalid Password",401);
            }
        }else {
            // print_r('user not exists'); exit;
            throw new \Exception('User does not exists',401);
        }
    }

    function validate_password($password='', $db_password='') {
        if(password_verify($password, $db_password)) {
            return true;
        }
        return false;
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

        $builder = $this->db->table($this->table_name);
        $builder->select('user_login_id, "'.$this->table_name.'".user_id, name, email_id, mobile_no, username,user_type.user_type, password, default_password_change');
        $builder->from($this->table_name);
        $builder->join('user', 'user_login.user_id=user.user_id', 'inner');
        $builder->join('user_type', 'user.user_type_id=user_type.user_type_id', 'inner');
        $builder->where('username', $data);
        $builder->where('"'.$this->table_name.'".is_active', $data1);
        // $res   = $this->db->query("SELECT user_login_id, ".$this->table_name.".user_id, name, email_id, mobile_no, username,user_type.user_type, password, default_password_change FROM ".$this->table_name." INNER JOIN user ON (".$this->table_name.".user_id=user.user_id) INNER JOIN user_type ON (user.user_type_id=user_type.user_type_id) WHERE username = :username AND ".$this->table_name.".is_active=:is_active");
        // echo $builder;exit;
        print_r($builder);exit;
        // print_r($builder);exit;
        // $query->execute($data);
        // $count = $stmt->rowCount();
        // $row = $stmt->fetch();
        // // $debug_query = $stmt->_debugQuery();
        // // echo $debug_query;exit;
        // // print_r($row);exit;
        // $stmt->closeCursor();


        $sql = "UPDATE ".$this->table_name." SET last_login_time =:last_login_time WHERE user_login_id=:user_login_id";
                    $stmt= $this->conn->prepare($sql);
                    $stmt->execute($data);
                    // print_r($stmt);exit; 
                    $stmt->closeCursor();
*/