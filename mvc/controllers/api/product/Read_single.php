<?php
namespace mvc\api\product;
use mvc\core\Controller;
use mvc\models\Product;

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

class Read_single extends Controller{
    protected $productModel;

    function __construct($productIdQuery = null){
        $this->productModel = new Product();
        $this->productModel->productId = $productIdQuery;
        echo json_encode($this->productModel->read_single());
        die();
    }
}