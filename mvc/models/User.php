<?php
namespace mvc\models;
use mvc\models\traits\Filter;
use mvc\core\DB;

class User extends DB{
    protected $userEmail;
    protected $userPhone;
    protected $userName;
    protected $userAvatar;
    protected $userAddress;

    public function getUser(){
        if (isset($_SESSION['user'])){
            $account = $_SESSION['user']['email'];
            $query = "SELECT * FROM user WHERE userEmail = ?";
            $param = array ($account);
            $result = $this->readDB($query, $param);
            if ($result != false){
                return json_encode($result);
            }
            else{
                return null;
            }
        }
        return null;
    }
    // Check xem tài khoản có tồn tại hay không
    public function checkValidUser($userAccount){
        $query = "SELECT * FROM user WHERE userEmail = ? or userPhone = ?";
        $param = array ($userAccount, $userAccount);
        $result = $this->readDB($query, $param);
        if ($result != false){
            return true;
        }
        else{
            return false;
        }
    }
    public function insertNewUser($userEmail, $userPhone, $userPassword, $userName){
        $query ='INSERT INTO user( userEmail, userPhone, userPassword, userName)  VALUES (?,?, ?, ?)';
        $param = array ($userEmail, $userPhone, $userPassword, $userName);
        $result = $this->writeDB($query, $param);
        if ($result)
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function loginCheck($userAccount, $userPassword){
        $query = 
        "SELECT userName, userId, userEmail, userAvatar, userPhone 
        FROM user
        WHERE (userPhone = ? OR userEmail = ?) 
        AND userPassword = ?
        LIMIT 1";
        $param = array($userAccount, $userAccount, $userPassword);
        $result = $this->readDB($query, $param);
        return $result;
    }
    public function editProfile($userName, $userAvatar, $userAccount){
        $query = " UPDATE user SET userName = ? ";
        $param = array ($userName);
        if($userAvatar != ''){
            $query = $query . ", userAvatar = ? ";
            array_push($param, $userAvatar);
        }
        $query = $query . "WHERE userEmail = ?";
        array_push($param, $userAccount);
        $result = $this->writeDB($query, $param);
        if ($result)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function updateAccount($userEmail, $userPhone, $userAccount){
        if($userEmail != '' && $userPhone == ''){
            $query = "UPDATE user SET userEmail = ? WHERE userPhone = ?";
            $param = array ($userEmail, $userAccount);
            $result = $this->writeDB($query, $param);
            if ($result)
            {
                return true;
            }
            else{
                return false;
            }
        }
        if($userEmail == '' && $userPhone != '') {
            $query = "UPDATE user SET userPhone = ? WHERE userEmail = ?";
            $param = array ($userPhone, $userAccount);
            $result = $this->writeDB($query, $param);
            if ($result)
            {
                return true;
            }
            else{
                return false;
            }
        }
        
    }
    public function updatePassword($new_userPassword, $userAccount){
        $query = "UPDATE user SET userPassword = ? WHERE userEmail = ? OR  userPhone = ?";
        $param = array ($new_userPassword, $userAccount, $userAccount);
        $result = $this->writeDB($query, $param);
        if ($result)
        {
            return true;
        }
        else{
            return false;
        }
        
    }
    public function updateAddress($userAddress, $userAccount){
        $query = "UPDATE user SET userAddress = ? WHERE userEmail = ?";
        $param = array ($userAddress, $userAccount);
        $result = $this->writeDB($query, $param);
        if ($result)
        {
            return true;
        }
        else{
            return false;
        }
    }
    
}
?>