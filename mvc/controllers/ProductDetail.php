<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Product;
use mvc\models\Shop;
use mvc\models\Cart;

class ProductDetail extends Controller{
    protected $productModel;
    protected $shopModel;
    //General params
    protected $productId;
    function __construct(){
        $this->shopModel = new Shop();
        $this->productModel = new Product();
        $this->cartModel = new Cart();
    }
    function loadProduct($params){
        $productId = current($params);
        if ($productId !== false) {
            $productCategoryId = 
                $this->productModel->getCategoryId($productId);
            $productsRecommend = 
                json_encode($this->productModel->getProductListByCategory($productCategoryId, 0, 5));
            $productData = 
                json_encode($this->productModel->getProduct($productId));
            $cartData = 
                json_encode($this->cartModel->getCart($_SESSION['user']['id']));
            $this->view('Main',[
                'Page' => 'ProductDetail',
                'productData' => $productData,
                'productsRecommend' => $productsRecommend,
                'cart' => $cartData
            ]);
        }
    }
    function addToCart(){
        
    }
}
?>