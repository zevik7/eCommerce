<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
class Read_single extends Controller{
    protected $productModel;
    function __construct($productIdQuery = null){
        $this->productModel = $this->model('Product');
        $this->productModel->productId = $productIdQuery;
        echo json_encode($this->productModel->read_single());
        die();
    }
}