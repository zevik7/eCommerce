<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Product;
use mvc\models\Shop;

class OrderSuccess extends Controller{
    protected $cartModel;

    
    function load($params){
       
        $this->view('Main',[
            'Page' => 'OrderSuccess',
        ]);
    }
}
?>