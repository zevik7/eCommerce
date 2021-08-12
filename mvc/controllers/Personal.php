<?php
class Personal extends Controller{
    protected $userModel;

    function __construct(){
        $this->userModel = $this->model('User');
    }
    public function loadList($param = null){
        $PP = current($param);
        $this->view('Main',[
            'Page' => 'Personal',
            'User' => $this->userModel->getUser(),
            'PP'   => $PP
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
            $userAccount    =   $_SESSION['userAccount'];
            $result = $this->userModel->editProfile($userName, $userAvatar, $userAccount);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Đã cập nhật thành công']);
            }
            else{
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm vào cơ sở dữ liệu']);
            }
            die();
        
    }
    public function UpdateConfirm(){
        $userAccount    =   $_SESSION['userAccount'];
        $userPassword   =   $_POST['password-confirm'];
        $result         = $this->userModel->loginUser($userAccount, $userPassword);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Đã xác thực']);
        }
        else{
            echo json_encode(['status' => 'error', 'message' => 'Mật khẩu chưa chính xác!!']);
        }
    }
    public function UpdateEmail(){
        $userAccount    =   $_SESSION['userAccount'];
        $userEmail      =   $_POST['update-email'];
        $result         = $this->userModel->updateAccount($userEmail, '' , $userAccount);
        if ($result) {
            $_SESSION['userAccount'] =  $userEmail;
            echo json_encode(['status' => 'success', 'message' => 'Thay đổi thành công']);
        }
        else{
            echo json_encode(['status' => 'error', 'message' => 'Thay đổi không thành công!!']);
        }
    }
    public function UpdatePhone(){
        $userAccount    =   $_SESSION['userAccount'];
        $userPhone      = $_POST['update-phone'];
        $result         = $this->userModel->updateAccount('', $userPhone , $userAccount);
        if ($result) {
            $_SESSION['userAccount'] =  $userPhone;
            echo json_encode(['status' => 'success', 'message' => 'Thay đổi thành công']);
        }
        else{
            echo json_encode(['status' => 'error', 'message' => 'Thay đổi không thành công!!']);
        }
    }
    public function UpdatePassword(){
        $userAccount            =   $_SESSION['userAccount'];
        $old_userPassword       =   $_POST['old-password'];
        $new_userPassword       =   $_POST['new-password'];
        $check                  =   $this->userModel->loginUser( $userAccount , $old_userPassword );
        if ($check) {
            $result         = $this->userModel->updatePassword($new_userPassword , $userAccount);
            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Đổi mật khẩu thành công']);
            }
            else{
                echo json_encode(['status' => 'error', 'message' => 'Thay đổi không thành công!!']);
            }
        }
        else{
            echo json_encode(['status' => 'error', 'message' => 'Sai mật khẩu!!']);
        }
    }
    public function setAddress(){
        $userAccount   =   $_SESSION['userAccount'];
        // $userprovinces  =   $_POST['user-provinces'];
        // $userdistricts =  $_POST['user-districts'];
        // $userdetail =  $_POST['user-detail'];
        // $userAddress = $userdetail.'/'.$userdistricts.'/'.$userprovinces;
        $userAddress =  $_POST['user-detail'].'/'.$_POST['user-address'];
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