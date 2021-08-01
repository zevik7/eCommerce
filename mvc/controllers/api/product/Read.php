<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
class Read extends Controller{
    protected $productModel;
    function __construct(){
        $this->productModel = $this->model('Product');
        echo json_encode($this->productModel->read());
        die();
    }
}