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

    public function LoginUser(){
        if (isset($_POST["modal-signin__submit"]))
        {   
            $userAccount    = $_POST["modal-signin__account"];
            $userPassword   = $_POST["modal-signin__password"];
            $result = $this->userModel->loginUser( $userAccount, $userPassword);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Đăng nhập thành công']);
            }
            else{
                echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy tài khoản']);
            }
            
        }
    }
    public function Logout(){
        session_destroy();
        //header('Location: http://'.$_SERVER['HTTP_HOST'].'/CChat');
        die();
    
    }
}
?>