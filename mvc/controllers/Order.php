<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Product;
use mvc\models\Shop;
use mvc\models\Cart;

class Order extends Controller{
    protected $productModel;
    protected $shopModel;
    protected $cartModel;
    //General params
    protected $productId;
    function __construct(){
        $this->shopModel = new Shop();
        $this->productModel = new Product();
        $this->cartModel = new Cart();
    }
    function load($params){
        // Cart data
        $cartData = json_encode($this->cartModel->getCart());
        $this->view('Main',[
            'Page' => 'Order',
            'cart' => $cartData
        ]);
    }
}
?>