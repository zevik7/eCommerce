<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Product;
use mvc\models\Shop;

class Order extends Controller{
    protected $productModel;
    protected $shopModel;
    //General params
    protected $productId;
    function __construct(){
        $this->shopModel = new Shop();
        $this->productModel = new Product();
    }
    function load($params){
        $this->view('Main',[
            'Page' => 'Order',
        ]);
    }
}
?>