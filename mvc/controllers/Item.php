<?php
class Item extends Controller{
    protected $productModel;
    protected $shopModel;

    function __construct(){
        $this->shopModel = $this->model('Shop');
        $this->productModel = $this->model('Product');
    }
    function Main(){
        $this->view('Main',[
            'Page' => 'ItemDetail',
            'Product' => $this->productModel->getProductInfo()
        ]);
    }
}
?>