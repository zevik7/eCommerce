<?php
    class User extends DB{
        public function getUserInfo(){
            $result = $this->read('SELECT * FROM user');
            return json_encode($result);
        }
        public function insertUser( $userEmail, $userPhone, $userPassword, $userName){
            $query ='INSERT INTO user( userEmail, userPhone, userPassword, userName)  VALUES ( "'.$userEmail.'", "'.$userPhone.'", "'.$userPassword.'", "'.$userName.'")';
            $result = $this->write($query);
            return json_encode( $result);
        }

        public function validuserPhone($userPhone){
            $query = 'SELECT * FROM user WHERE userPhone = "'.$userPhone.'"';
            $result = $this->read($query);
            return json_encode($result);
        }
       
        public function validUserEmail($userEmail){
            $query = 'SELECT * FROM user WHERE userEmail = "'.$userEmail.'"';
            $result = $this->read($query);
            return json_encode($result);
        }
        //Đăng nhập
        public function checkAccount($userPhone , $userEmail , $userPassword ){
            $query = 'SELECT * FROM user WHERE (userPhone = "'.$userPhone.'" OR userEmail = "'.$userEmail.'") AND userPassword = "'.$userPassword.'"';
            $result = $this->read($query);
            return json_encode($result);
        }
    }
?>