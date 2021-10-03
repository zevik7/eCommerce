<?php
namespace mvc\models;
use mvc\models\traits\Filter;
use mvc\core\DB;

class Cart extends DB{
    public function getCart($userId){
        $query = 
            "SELECT
            ca.productTypeId, ca.cartQuantity, ca.cartDate, 
            pt.productTypeName, pd.productName
            FROM ecommerce.cart ca
            INNER JOIN product_type pt
            ON pt.productTypeId = ca.productTypeId
            INNER JOIN product pd
            ON pt.productId = pd.productId
            INNER JOIN image_product ip
            ON pd.productId = ip.productId
            WHERE ca.userId = ?
            AND ip.imageProductType = 'thumb'";
        $result = $this->readDB($query, [$userId]);
        return $result;
    }
}
?>