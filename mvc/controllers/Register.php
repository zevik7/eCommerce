<?php
class Register extends Controller{
    public $userModel;
    public function __construct(){
        $this->userModel = $this->model("User");
    }
    public function Hello(){
        if (isset($_SESSION['userEmail']))
        {
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/CChat/Home/Chat');
            die();
        }
        $this->view('Register',[

        ]);
    }
    public function Auth(){
        if (isset($_POST["register-btn"]))
        {
            $checkValid = $this->userModel->checkValidUser($_POST['register-email']);
            if ($checkValid){
                echo json_encode(["status" => "error", "message" => "Tài khoản đã tồn tại"]);
            }
            else {
                $result = $this->userModel->insertUser($_POST['register-email'],$_POST['register-pass'], $_POST['gender']);
                if ($result)
                {
                    echo json_encode(["status" => "success", "message" => "Đăng ký thành công"]);
                }
                else {
                    echo json_encode(["status" => "error", "message" => "Không thể thêm vào CSDL"]);
                }
            }
        }
    }
}
?>