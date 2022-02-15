<?php

namespace src\models;

use src\models\traits\Filter;
use src\core\DB;

class Order extends DB
{
    public function addToOrder($user_id)
    {
        $query =
            "INSERT INTO orders 
            ( orders.user_id, orders.date, orders.`status`) 
            VALUE( $user_id , NOW(), 'waiting')";
        $result = $this->writeDB($query);
        return $result;
    }

    public function getOrderID()
    {
        $query = "SELECT MAX(orders.id) as order_id FROM orders WHERE orders.user_id = " . $_SESSION['user']['id'];
        $result = $this->readDB($query);
        return $result;
    }

    public function getProductBuy($productTypeId)
    {
        $query =
            "SELECT
            pt.id as productTypeId,
            pt.price as productTypePrice,
            pd.discount as productDiscount,
            pt.freight_cost as productFreightCost,
            pt.name as productTypeName, 
            pd.name as productName,
            img.url as imageUrl
            FROM product_types as pt
            INNER JOIN products pd
            ON pt.product_id = pd.id
            INNER JOIN images img
            ON pd.id = img.imageable_id
            WHERE pt.id = ?
            AND img.type = 'thumb'
            AND img.imageable_type = 'product'";
        $result = $this->readDB($query, [$productTypeId]);
        return $result;
    }
}
