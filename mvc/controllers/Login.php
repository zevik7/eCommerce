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
        unset($_SESSION['userEmail']);
        session_destroy();
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/CChat');
        die();
    
    }
}
?>