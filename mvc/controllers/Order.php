<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Product;
use mvc\models\Shop;
use mvc\models\Cart;
use mvc\models\Order as OrderModel;
use mvc\models\OrderDetail;

class Order extends Controller{
    protected $productModel;
    protected $cartModel;
    protected $orderModel;
    protected $orderDetailModel;

    function __construct(){
        $this->productModel = new Product();
        $this->cartModel = new Cart();
        $this->orderModel = new OrderModel();
        $this->orderDetailModel = new OrderDetail();
    }
    
    function load($params){
        // Product buy data
        if($params) {
            $productTypeId = current($params);
            $cart = json_encode($this->orderModel->getProductBuy($productTypeId));
        }
        // Cart data
        else 
          $cart = json_encode($this->cartModel->get());
      
        $this->view('Main',[
            'Page' => 'Order',
            'cart' => $cart,
            'params' => $params
        ]);
    }

    function order(){

        $this->orderModel->addToOrder($_SESSION['user']['id']);
        $order_id = $this->orderModel->getOrderID();
        $id = $order_id[0]['order_id'];
        $cart = json_encode($this->cartModel->get());
        $this->orderModel->addToOrderDetail($cart, $id);

        setcookie('orderID',  $id, time() + 30, "/");
        header('Location: http://' . BASE_URL . '/OrderSuccess');
        die();

    }

    function buyNow($params){
        $productTypeId = current($params);
        $this->orderModel->addToOrder($_SESSION['user']['id']);
        $order_id = $this->orderModel->getOrderID();
        $id = $order_id[0]['order_id'];
        $buyNowData =$this->orderModel->getProductBuy($productTypeId);
        $this->orderDetailModel->buyNowOrderDetail($id, $buyNowData, $_GET['productTypeQty']);

        setcookie('orderID',  $id, time() + 30, "/");
        header('Location: http://' . BASE_URL . '/OrderSuccess');
        die();
    }
}
?>