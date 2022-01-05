<?php

namespace mvc\models;

use mvc\models\traits\Filter;
use mvc\core\DB;

class OrderDetail extends DB
{
    public function addToOrderDetail($cart, $id)
    {
        foreach ($cart as $value) {
            $query =
            "INSERT INTO order_details ( order_id, product_type_id, quantity, price) 
            VALUE( $id, " . $value['productTypeId'] . ", "
            . $value['cartQuantity'] . ", "
            . $value['productTypePrice'] * (1 - $value['productDiscount']) . ");";
            $this->writeDB($query);
        }

        if (isset($_SESSION['user']['id'])) {
            $userId = $_SESSION['user']['id'];
        }

        $query = " DELETE FROM carts WHERE user_id =  $userId ;";
        $this->writeDB($query);
    }

    public function buyNowOrderDetail($id, $buyNowData, $productTypeQty)
    {
        $query =
        "INSERT INTO order_details ( order_id, product_type_id, quantity, price) 
        VALUE( ?, ?, ?, ?);";
        $param =
        array($id, $buyNowData[0]['productTypeId'], $productTypeQty,
            $buyNowData[0]['productTypePrice'] * (1 - $buyNowData[0]['productDiscount']));

        $this->writeDB($query, $param);
    }
}
