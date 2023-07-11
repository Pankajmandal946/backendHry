<?php namespace App\Controllers;

use \App\Models\User_login;

class Login extends BaseController
{
    public function Login()
    {
        return view("login");
    }
    public function validation_login()
    {
        try {
            $json = file_get_contents('php://input');
            if (isset($json) && !empty($json)) {
                $request = json_decode($json);
                $user_login = new User_login();
                // print_r($user_login);exit;
                if (isset($request->activity) && $request->activity == 'login') {
                    $user_login->username = $request->username;
                    $user_login->password = $request->password;
                    $user_login->password = $request->password;
                    $user_login->password = $request->password;
                    // print_r($user_login);exit;
                    if ($user_login->validate_login()) {
        
                        $response = [
                            'success' => 1,
                            'code' => 200,
                            'msg' => 'Valid Login Details!'
                        ];
        
                        http_response_code(200);
                        echo json_encode($response);
                    } else {
                        throw new \Exception('Please post request in json format or it can not be blank', 400);
                    }
                }
            } else {
                // print_r("bcs");exit;
                throw new \Exception('Please post request in json format or it can not be blank', 400);
            }
        } catch (PDOException $e) {
            $response = [
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
            http_response_code(500);
            echo json_encode($response);
        } catch (\Exception $e) {
            $response = [
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
            http_response_code($e->getCode());
            echo json_encode($response);
        } 
        // echo view("login");
    }
}
