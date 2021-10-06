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
            $query = 
                "SELECT * FROM users WHERE email = ?";
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
        $query = 
            "SELECT id 
            FROM users
            WHERE email = ? or phone = ?";
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
        $query =
            "INSERT INTO 
                users (email, phone, password, name)  
            VALUES (?, ?, ?, ?)";
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
            "SELECT 
            ur.name,
            ur.id,
            email,
            phone,
            address,
            img.url
            FROM users ur
            INNER JOIN images img
            ON img.imageable_id = ur.id
            WHERE (phone = ? OR email = ?) 
            AND password = ?
            AND img.imageable_type = 'user'
            AND img.type = 'avatar'
            LIMIT 1";
        $param = array($userAccount, $userAccount, $userPassword);
        $result = $this->readDB($query, $param);
        return $result[0];
    }
    public function editProfile($userName, $userAvatar, $userAccount){
        $query = 
            " UPDATE users SET name = ? ";
        $param = array ($userName);
        // if($userAvatar != ''){
        //     $query = $query . ", avatar = ? ";
        //     array_push($param, $userAvatar);
        // }
        $query = $query . "WHERE email = ?";
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
            $query = 
                "UPDATE users SET email = ? WHERE phone = ?";
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
            $query = 
                "UPDATE users SET phone = ? WHERE email = ?";
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
        $query = 
            "UPDATE users SET password = ? WHERE email = ? OR  phone = ?";
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
        $query = 
            "UPDATE users SET address = ? WHERE email = ?";
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