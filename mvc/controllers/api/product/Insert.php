<?php
namespace mvc\api\product;
use mvc\core\Controller;
use mvc\models\Product;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-MethodS: POST');   
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');   

class Insert extends Controller{
    protected $productModel;
    function __construct(){
        $this->productModel = new Product();
        //Get raw data
        $data = json_decode(file_get_contents("php://input")); 
        $this->productModel->shopId = $data->shopId;
        $this->productModel->productCategoryId = $data->productCategoryId;
        $this->productModel->productName = $data->productName;
        $this->productModel->productDescription = $data->productDescription;
        $this->productModel->productDiscount = $data->productDiscount;
        $this->productModel->productSource = $data->productSource;
        $this->productModel->productSendFrom = $data->productSendFrom;
        $this->productModel->productBrand = $data->productBrand;

        $result = $this->productModel->insert();
        if ($result)
        {
            echo json_encode(['message' => 'success']);
        }
        else echo json_encode(['message' => 'error']);
        die();
    }
}