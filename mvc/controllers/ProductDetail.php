<?php
class ProductDetail extends Controller{
    protected $productModel;
    protected $shopModel;
    function __construct(){
        $this->shopModel = $this->model('Shop');
        $this->productModel = $this->model('Product');
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
}
?>