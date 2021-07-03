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
        if (isset($_POST["auth-controls__signupBtn"]))
        {
            $userEmail      = $_POST["auth-body__email"];
            $userPhone      = $_POST["auth-body__phoneNumber"];
            $userPassword   = $_POST["auth-body__password"];
            $userName       = $_POST["auth-body__userName"];
            $result = $this->userModel->insertNewUser( $userEmail, $userPhone, $userPassword, $userName);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Đăng kí thành công']);
            }
            else{
                echo json_encode(['status' => 'error', 'message' => 'Tài khoản đã tồn tại. Vui lòng đăng nhập.']);
            }
            
        }
    }
}
?>