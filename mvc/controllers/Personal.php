<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\User;

class Personal extends Controller{
    protected $userModel;

    function __construct(){
        $this->userModel = new User();
    }
    public function loadList(){
        $this->view('Main',[
            'Page' => 'Personal',
            'User' => $this->userModel->getUser(),
        ]);
    }
    public function Edit(){
            $target_file = '';
            if ($_FILES['personal-image']['name'] != NULL && $_FILES['personal-image']['name'] != '')
            {
                if ($_FILES["personal-image"]['error'] != 0)
                {
                    return json_encode(['status'=>'error', 'message'=>'Hình ảnh upload bị lỗi']);
                }
                $target_dir    = "./public/img/user/";
            
                $target_file   = $target_dir . basename($_FILES["personal-image"]["name"]);

                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                $allowtypes    = array('jpg', 'png', 'jpeg', 'gif','JPG', 'PNG', 'JPEG', 'GIF');

                $maxfilesize   = 1048576;

                $allowUpload   = true;

                $check = getimagesize($_FILES["personal-image"]["tmp_name"]);

                if ($check == false)
                {
                    //Không phải file ảnh
                    $allowUpload = false;
                    return json_encode(["status"=>"error","message"=>"File upload không phải là file ảnh !!!"]);
                }
                if ($_FILES["personal-image"]["size"] > $maxfilesize)
                {
                    $allowUpload = false;
                    return json_encode(["status"=>"error","message"=>"File bạn upload Vượt quá 1MB !!!"]);
                }
                if (!in_array($imageFileType,$allowtypes))
                {
                    $allowUpload = false;
                    return json_encode(["status"=>"error","message"=>"File ảnh của bạn không phù hợp"]);
                }

                if ($allowUpload)
                {
                    if (!move_uploaded_file($_FILES["personal-image"]["tmp_name"], $target_file))
                    {
                    return json_encode(["status"=>"error","message"=>"Không thể di chuyển ra thư mục cần lưu trữ"]);
                    }
                }
            }

            $userName       =   $_POST["profile-username"];
            $userAvatar     =   $target_file;
            $userAccount    =   $_SESSION['user']['email'];
            $result = $this->userModel->editProfile($userName, $userAvatar, $userAccount);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Đã cập nhật thành công']);
            }
            else{
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm vào cơ sở dữ liệu']);
            }
            die();
            // echo json_encode(['status' => 'success', 'message' => 'Lỗi khi thêm vào cơ sở dữ liệu']);
        
    }
    public function UpdateConfirm(){
        $userAccount    =   $_SESSION['user']['email'];
        $userPassword   =   $_POST['password-confirm'];
        $result         = $this->userModel->loginCheck($userAccount, $userPassword);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Đã xác thực']);
        }
        else{
            echo json_encode(['status' => 'error', 'message' => 'Mật khẩu chưa chính xác!!']);
        }
    }
    public function UpdateEmail(){
        $userAccount    =    $_SESSION['user']['phone'];
        $userEmail      =   $_POST['update-email'];
        $result         = $this->userModel->updateAccount($userEmail, '' , $userAccount);
        if ($result) {
            $_SESSION['user']['email'] =  $userEmail;
            echo json_encode(['status' => 'success', 'message' => 'Thay đổi thành công']);
        }
        else{
            echo json_encode(['status' => 'error', 'message' => 'Thay đổi không thành công!!']);
        }
    }
    public function UpdatePhone(){
        $userAccount    =   $_SESSION['user']['email'];
        $userPhone      = $_POST['update-phone'];
        $result         = $this->userModel->updateAccount('', $userPhone , $userAccount);
        if ($result) {
            $_SESSION['user']['phone'] =  $userPhone;
            echo json_encode(['status' => 'success', 'message' => 'Thay đổi thành công']);
        }
        else{
            echo json_encode(['status' => 'error', 'message' => 'Thay đổi không thành công!!']);
        }
    }
    public function UpdatePassword(){
        $userAccount            =   $_SESSION['user']['email'];
        $old_userPassword       =   $_POST['old-password'];
        $new_userPassword       =   $_POST['new-password'];
        $check                  =   $this->userModel->loginCheck( $userAccount , $old_userPassword );
        if ($check) {
            $result         = $this->userModel->updatePassword($new_userPassword , $userAccount);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Đổi mật khẩu thành công']);
            }
            else{
                echo json_encode(['status' => 'error', 'message' => 'Thay đổi không thành công']);
            }
        }
        else{
            echo json_encode(['status' => 'error', 'message' => 'Sai mật khẩu!!']);
        }
    }
    public function setAddress(){
        $userAccount   =   $_SESSION['user']['email'];
        $userAddress =  $_POST['user-address'] . '/' . $_POST['user-detail'] ;
        $result = $this->userModel->updateAddress($userAddress , $userAccount);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Cap nhat dia chi thanh cong']);
        }
        else{
            echo json_encode(['status' => 'error', 'message' => 'Thay đổi không thành công!!']);
        }
    }
}
?>