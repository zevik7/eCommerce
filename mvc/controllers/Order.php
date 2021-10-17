<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Product;
use mvc\models\Shop;
use mvc\models\Cart;
use mvc\models\AddOrder;

class Order extends Controller{
    protected $productModel;
    protected $cartModel;
    protected $orderModel;
    //General params
    protected $productId;
    function __construct(){
        $this->productModel = new Product();
        $this->cartModel = new Cart();
        $this->orderModel = new AddOrder();
    }
    function load($params){

        // Cart data
        $cartData = json_encode($this->cartModel->get());

        $this->view('Main',[
            'Page' => 'Order',
            'cart' => $cartData
        ]);
    }
    function order(){

        $this->orderModel->addToOrder($_SESSION['user']['id']);
        $order_id = $this->orderModel->getOrderID();
        $id = $order_id[0]['order_id'];
        $cartData = json_encode($this->cartModel->get());
        $this->orderModel->addToOrderDetail($cartData, $id);

        header('Location: http://'.$_SERVER['HTTP_HOST'].'/OrderSuccess');
        die();

    }
}
?>