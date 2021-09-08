<?php
namespace mvc\models;
use mvc\models\traits\Filter;
use mvc\core\DB;

class Shop extends DB{
    public function getProductInfo(){
        $result = $this->readDB('SELECT * FROM product');
        
        return json_encode($result);
    }
}
?>