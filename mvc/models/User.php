<?php
    class User extends DB{
        public function getUserInfo(){
            if (isset($_SESSION['userAccount'])){
                $account = $_SESSION['userAccount'];
                $query = "SELECT * FROM user WHERE userEmail = ? or userPhone = ?";
                $param = array ($account, $account);
                $result = $this->readDB($query, $param);
                if ($result !== false){
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
            if ($result !== false){
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
        public function loginUser($userAccount, $userPassword){
            $query = "SELECT * FROM user WHERE (userPhone = ? OR userEmail = ?) AND userPassword = ?";
            $param = array ($userAccount, $userAccount, $userPassword);
            $result = $this->readDB($query, $param);
            if ($result !== false){
                return true;
            }
            else{
                return false;
            }
        }
        public function editProfile($userName, $userAvatar, $userAccount){
            $query = "UPDATE user SET userName = ?";
            $param = array ($userName);
            if($userAvatar != ''){
                $query = $query . ", userAvatar = ? ";
                array_push($param, $userAvatar);
            }
            $query = $query . "WHERE userEmail = ? OR  userPhone = ?";
            array_push($param, $userAccount, $userAccount);
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
                $query = "UPDATE user SET userEmail = ? WHERE userEmail = ? OR  userPhone = ?";
                $param = array ($userEmail, $userAccount, $userAccount);
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
                $query = "UPDATE user SET userPhone = ? WHERE userEmail = ? OR  userPhone = ?";
                $param = array ($userPhone, $userAccount, $userAccount);
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
        
       
    }
?>