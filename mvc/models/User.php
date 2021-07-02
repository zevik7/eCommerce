<?php
    class User extends DB{
        public function getUserInfo(){
            // $result = $this->read('SELECT * FROM user');
            // return json_encode($result);
        }
        public function insertUser( $userEmail, $userPhone, $userPassword, $userName){
            $query ='INSERT INTO user( userEmail, userPhone, userPassword, userName)  VALUES ( "'.$userEmail.'", "'.$userPhone.'", "'.$userPassword.'", "'.$userName.'")';
            $result = $this->write($query);
            return json_encode( $result);
        }

        //Nen lam 1 ham checkValidUser, so dien thoai hay email thi minh xu li chung, SELECT * FROM user WHERE userPhone = user or userEmail = user
        public function checkValidUser($userAccount){
            $query = "SELECT * FROM user WHERE userPhone = '$userAccount' or $userEmail = '$userAccount'";
            $result = $this->read($query);
            if ($result !== false){
                return true;
            }
            else{
                return false;
            }
            //Gọn hơn đúng hơm kk
        }
        // Nếu viết cái trên r k cần cái này
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
        // Nên viết đối số như này, vì lớp db nó có sẵn
        public function checkAccount($userPhone, $userEmail ,$userPassword){
            //$query = 'SELECT * FROM user WHERE (userPhone = "'.$userPhone.'" OR userEmail = "'.$userEmail.'") AND userPassword = "'.$userPassword.'"';
            // $param = array ($userPhone, $userEmail ,$userPassword);
            // $result = $this->read($query, $param);
           // Nên trả về true or false
        }
    }
?>