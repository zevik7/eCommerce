<?php
    class User extends DB{
        public function getUserInfo(){
            // $result = $this->read('SELECT * FROM user');
            // return json_encode($result);
        }
        // Check xem tài khoản có tồn tại hay không
        public function checkUser($userAccount){
            $query = "SELECT * FROM user WHERE userEmail = '$userAccount' or userPhone = '$userAccount'";
            $param = array ($userAccount);
            $result = $this->read($query, $param);
            if ($result !== false){
                return true;
            }
            else{
                return false;
            }
        }
        public function insertNewUser( $userEmail, $userPhone, $userPassword, $userName){
            if($this->checkUser($userEmail)) return false;
            $query ='INSERT INTO user( userEmail, userPhone, userPassword, userName)  VALUES ( "'.$userEmail.'", "'.$userPhone.'", "'.$userPassword.'", "'.$userName.'")';
            $param = array ($userEmail, $userPhone, $userPassword, $userName);
            $result = $this->write($query, $param);
            return $result;
        }
        public function loginUser($userAccount, $userPassword){
            if($this->checkUser($userAccount) === false) return false;
            $query = "SELECT * FROM user WHERE (userPhone = '$userAccount' OR userEmail = '$userAccount') AND userPassword = '$userPassword'";
            $param = array ($userAccount, $userPassword);
            $result = $this->read($query, $param);
            return $result;
        }
    }
?>