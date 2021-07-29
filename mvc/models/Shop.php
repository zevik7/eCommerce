<?php
    class Shop extends DB{
        public function getProductInfo(){
            $result = $this->readDB('SELECT * FROM product');
            
            return json_encode($result);
        }
    }
?>