<?php
use mvc\models\Product;

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

class Read extends Controller{
    protected $productModel;
    function __construct(){
        $this->productModel = new Product();
        echo json_encode($this->productModel->Read());
        die();
    }
}