<?php
namespace mvc\models;
use mvc\models\traits\Filter;
use mvc\core\DB;

class Cart extends DB{
    public function getCart(){
        $userId = 0;
        if (isset($_SESSION['user']['id']))
        {
            $userId = $_SESSION['user']['id'];
        }
        $query = 
            "SELECT
            ca.product_type_id as productTypeId, 
            ca.quantity as cartQuantity, 
            ca.date as cartDate, 
            pt.name as productTypeName, 
            pt.price as productTypePrice,
            pt.freight_cost as productFreightCost,
            pd.name as productName,
            pd.discount as productDiscount,
            img.url as imageUrl
            FROM ecommerce.carts ca
            INNER JOIN product_types pt
            ON pt.id = ca.product_type_id
            INNER JOIN products pd
            ON pt.product_id = pd.id
            INNER JOIN images img
            ON pd.id = img.imageable_id
            WHERE ca.user_id = ?
            AND img.type = 'thumb'
            AND img.imageable_type = 'product'";
        $result = $this->readDB($query, [$userId]);
        return $result;
    }
    public function addToCart($typeId, $quantity)
    {
        $userId = $_SESSION['user']['id'];
        $query = 
        "INSERT INTO 
        carts
        (user_id, product_type_id, quantity)
        VALUES
        ( ?, ?, ?)";
        $result = $this->writeDB($query, [$userId, $typeId, $quantity]);
        return $result;
    }

   
}
?>