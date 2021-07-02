<?php
class Login extends Controller{
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
        $this->view('Login',[

        ]);
    }

    // 2 cái này viết chung như bên user model luôn, so sánh chuỗi nếu có @ thì chắc chắn là email, còn lại là điện thoại
     // Đăng nhập bằng SDT
    public function LoginUserPhone(){
        if (isset($_POST["auth-controls__signinBtn"]))
        {  
            $userPhone      = $_POST["auth-body-signin__account"];
            $userPassword   = $_POST["auth-body-signin__password"];
            $result = $this->userModel->checkAccount( $userPhone, null, $userPassword);
            echo json_encode($result);
        }
    }
    // Đăng nhập bằng Email
    public function LoginUserEmail(){
        if (isset($_POST["auth-controls__signinBtn"]))
        {  
            $userEmail      = $_POST["auth-body-signin__account"];
            $userPassword   = $_POST["auth-body-signin__password"];
            $result = $this->userModel->checkAccount( null,  $userEmail , $userPassword);
            echo json_encode($result);
        }
    }
    public function Logout(){
        session_destroy();
        //header('Location: http://'.$_SERVER['HTTP_HOST'].'/CChat');
        die();
    
    }
}
?>