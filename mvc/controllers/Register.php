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
            $result = $this->userModel->insertUser( $userEmail, $userPhone, $userPassword, $userName);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Đăng kí thành công']);
            }
            else{
                echo json_encode(['status' => 'error', 'message' => 'Tài khoản đã tồn tại']);
            }
            
        }
    }
    //Kiểm tra SDT đăng ký có tồn tại chưa
    public function CheckUserPhone(){
        $userPhone  = $_POST["validUserPhone"];
        $result = $this->userModel->validuserPhone($userPhone);
            echo json_encode($result);
    }
     //Kiểm tra email đăng ký có tồn tại chưa
    public function CheckUserEmail(){
        $userEmail  = $_POST["validUserEmail"];
        $result = $this->userModel->validUserEmail($userEmail);
            echo json_encode($result);
    }
    // 2 hàm trên nên viết thành 1 hàm như này
    public function CheckAccount(){
        $userEmail  = $_POST["userAccount"];
        $result = $this->userModel->checkValidAccount($userEmail);
        if ($result != false){
            echo json_encode(['status'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            echo json_encode(['status'=>'error','message'=>'Đăng nhập thất bại']);
        }
        // Không nên lấy json trả từ model
    }
}
?>