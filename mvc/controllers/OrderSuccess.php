<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Product;
use mvc\models\Shop;
use mvc\models\Cart;

class OrderSuccess extends Controller{
    protected $cartModel;

    function __construct(){
        $this->cartModel = new Cart();
    }
    
    function load($params){
        $this->cartModel->addToOrder($_SESSION['user']['id']);
        $order_id = $this->cartModel->getOrderID();
        $id = $order_id[0]['order_id'];
        $cartData = json_encode($this->cartModel->getCart());
        $this->cartModel->addToOrderDetail($cartData, $id);
        $this->view('Main',[
            'Page' => 'OrderSuccess',
            'id' => $id
        ]);
    }
}
?>