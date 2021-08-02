<?php
class ProductDetail extends Controller{
    protected $productModel;
    protected $shopModel;

    function __construct(){
        $this->shopModel = $this->model('Shop');
        $this->productModel = $this->model('Product');
    }
    function loadProduct($productId){
        if (count($productId) === 1) {
            $this->view('Main',[
                'Page' => 'ProductDetail',
                'productData' => $this->productModel->getProduct($productId[0])
            ]);
        }
    }
}
?>