<?php
namespace mvc\models;
use mvc\models\traits\Filter;
use mvc\core\DB;

class Cart extends DB{
    public function getCart(){
        $userId = $_SESSION['user']['id'];
        $query = 
            "SELECT
            ca.productTypeId, 
            ca.cartQuantity, 
            ca.cartDate, 
            pt.productTypeName, 
            pt.productTypePrice,
            pd.productName,
            pd.productDiscount,
            img.url as image_url
            FROM ecommerce.cart ca
            INNER JOIN product_type pt
            ON pt.productTypeId = ca.productTypeId
            INNER JOIN product pd
            ON pt.productId = pd.productId
            INNER JOIN images img
            ON pd.productId = img.imageable_id
            WHERE ca.userId = ?
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
        cart
        (userId, ProductTypeId, cartQuantity)
        VALUES
        ( ?, ?, ?)";
        $result = $this->writeDB($query, [$userId, $typeId, $quantity]);
        return $result;
    }
}
?>