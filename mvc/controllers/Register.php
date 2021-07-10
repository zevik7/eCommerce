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
        if (isset($_POST["modal-signup__submit"]))
        {
            $userEmail      = $_POST["modal-signup__email"];
            $userPhone      = $_POST["modal-signup__phone"];
            $userPassword   = $_POST["modal-signup__password"];
            $userName       = $_POST["modal-signup__username"];
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