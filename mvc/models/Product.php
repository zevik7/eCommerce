<?php
    class Product extends DB{
        public function getProductInfo(){
            $result = $this->read('SELECT * FROM product');
            
            return json_encode($result);
        }
    }
?>