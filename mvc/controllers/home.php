<?php
class Home extends Controller{
    protected $userModel;
    protected $productModel;

    function __construct(){
        $this->userModel = $this->model('User');
        $this->productModel = $this->model('Product');
    }
    function Main(){
        $this->view('Main',[
            'Page' => 'Personal',
            'User' => $this->userModel->getUserInfo(),
            'Product' => $this->productModel->getProductInfo()
        ]);
    }
}
?>