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
        cart
        (user_id, product_type_id, quantity)
        VALUES
        ( ?, ?, ?)";
        $result = $this->writeDB($query, [$userId, $typeId, $quantity]);
        return $result;
    }

    public function addToOrder($user_id){
        $query = "INSERT INTO orders ( orders.user_id, orders.date, orders.`status`) VALUE( $user_id , NOW(), 'waiting');";
        $result = $this->writeDB($query);
        return $result;
    }

    public function getOrderID(){
        $query = "SELECT MAX(orders.id) as order_id FROM orders";
        $result = $this->readDB($query);
        return $result;
    }

    public function addToOrderDetail($cart, $id){
        $order_detail = json_decode($cart, true);
        foreach($order_detail as $value){
            $query = 
            "INSERT INTO order_details ( order_id, product_type_id, quantity, price) 
            VALUE( $id, " . $value['productTypeId'] . ", " 
            . $value['cartQuantity'] . ", " 
            . $value['productTypePrice'] * (1 - $value['productDiscount']) . ");";
            $this->writeDB($query);
        }

        if (isset($_SESSION['user']['id']))
        {
            $userId = $_SESSION['user']['id'];
        }

        $query = " DELETE FROM carts WHERE user_id =  $userId ;";
        $this->writeDB($query);
    }

}
?>