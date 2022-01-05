<?php

namespace mvc\controllers;

use mvc\core\Controller;
use mvc\models\User;

class Signup extends Controller
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function Auth()
    {
        if (isset($_POST["modal-signup__submit"])) {
            $userEmail      = $_POST["modal-signup__email"];
            $userPhone      = $_POST["modal-signup__phone"];
            $userPassword   = $_POST["modal-signup__password"];
            $userName       = $_POST["modal-signup__username"];

            //Check valid email and phone
            $checkValidEmail = $this->userModel->checkValidUser($userEmail);
            $checkValidPhone = $this->userModel->checkValidUser($userPhone);
            if ($checkValidEmail && $checkValidPhone) {
                echo json_encode(['status' => 'valid all', 'message' => 'Số điện thoại và email đã được sử dụng']);
                die();
            }
            if ($checkValidEmail) {
                echo json_encode(['status' => 'valid email', 'message' => 'Email đã được sử dụng']);
                die();
            }
            if ($checkValidPhone) {
                echo json_encode(['status' => 'valid phone', 'message' => 'Số điện thoại đã được sử dụng']);
                die();
            }
            //Insert to DB
            $result = $this->userModel->insertNewUser($userEmail, $userPhone, $userPassword, $userName);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Đăng kí thành công']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm vào cơ sở dữ liệu']);
            }
            die();
        }
    }
}
