<?php
    class User extends DB{
        public function getUserInfo(){
            $result = $this->read('SELECT * FROM user');
            return json_encode($result);
        }
    }
?>