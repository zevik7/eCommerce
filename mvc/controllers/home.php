<?php
class Home extends Controller{
    protected $userModel;
    protected $productModel;
    protected $shopModel;

    function __construct(){
        $this->userModel = $this->model('User');
        $this->productModel = $this->model('Product');
    }
    function Main(){
        $this->view('Main',[
            'Page' => 'ItemList',
            'User' => $this->userModel->getUserInfo(),
            'Product' => $this->productModel->getProductInfo()
        ]);
    }
}
?>