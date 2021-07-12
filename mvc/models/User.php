<?php
    class User extends DB{
        public function getUserInfo(){
            if (isset($_SESSION['userAccount'])){
                $account = $_SESSION['userAccount'];
                $query = "SELECT * FROM user WHERE userEmail = ? or userPhone = ?";
                $param = array ($account, $account);
                $result = $this->read($query, $param);
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
            $result = $this->read($query, $param);
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
            $result = $this->write($query, $param);
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
            $result = $this->read($query, $param);
            if ($result !== false){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>