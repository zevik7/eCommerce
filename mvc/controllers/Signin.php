<?php

namespace mvc\controllers;

use mvc\core\Controller;
use mvc\models\User;

class Signin extends Controller
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function Auth()
    {
        if (isset($_POST["modal-signin__submit"])) {
            $userAccount    = $_POST["modal-signin__account"];
            $userPassword   = $_POST["modal-signin__password"];
            $result         = $this->userModel->loginCheck($userAccount, $userPassword);
            if ($result !== false) {
                echo json_encode(['status' => 'success', 'message' => 'Đăng nhập thành công']);
                $_SESSION['user'] = [
                                    'id' => $result['id'],
                                    'name' => $result['name'],
                                    'avatar' => $result['url'],
                                    'email' => $result['email'],
                                    'phone' => $result['phone'],
                                    'address' => $result['address']
                                ];
            } else {
                echo json_encode(['status' => 'invalid account', 'message' => 'Tài khoản hoặc mật khẩu không đúng']);
            }
        }
    }
    public function Logout()
    {
        session_destroy();
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/eCommerce');
        die();
    }
}
