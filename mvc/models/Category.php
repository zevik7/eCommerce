<?php
namespace mvc\models;
use mvc\models\traits\Filter;
use mvc\core\DB;

class Category extends DB{
    public function getCategories(){
        $query = 
            "SELECT
            id,
            name,
            svg_icon
            FROM product_categories";
        $result = $this->readDB($query);
        return $result;
    }
}