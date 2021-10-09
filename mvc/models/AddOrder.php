<?php
namespace mvc\models;
use mvc\models\traits\Filter;
use mvc\core\DB;

class AddOrder extends DB{
   
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