<?php

namespace src\models;

use src\models\traits\Filter;
use src\core\DB;

class Category extends DB
{
    public function getCategories()
    {
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
