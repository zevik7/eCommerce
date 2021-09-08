<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Product;
use mvc\models\Shop;

class ProductDetail extends Controller{
    protected $productModel;
    protected $shopModel;
    //General params
    protected $productId;
    function __construct(){
        $this->shopModel = new Shop();
        $this->productModel = new Product();
    }
    function loadProduct($params){
        $productId = current($params);
        if ($productId !== false) {
            $productCategoryId = $this->productModel->getCategoryId($productId);
            $productsRecommend = $this->productModel->getProductListByCategory($productCategoryId, 0, 5);
            $this->view('Main',[
                'Page' => 'ProductDetail',
                'productData' => $this->productModel->getProduct($productId),
                'productsRecommend' => $productsRecommend
            ]);
        }
    }
    function addToCart(){
        
    }
}
?>