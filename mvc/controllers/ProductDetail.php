<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Product;
use mvc\models\Cart;

class ProductDetail extends Controller{
    protected $productModel;

    function __construct(){
        $this->productModel = new Product();
        $this->cartModel = new Cart();
    }

    function load($params){

        $productId = current($params);

        if ($productId !== false) {

            $productCategoryId = 
                $this->productModel->getCategoryId($productId);

            $productsRecommend = 
                json_encode($this->productModel->getProductListByCategory($productCategoryId, 0, 5));
                
            $productData = 
                json_encode($this->productModel->getProduct($productId));

            $cartData = 
                json_encode($this->cartModel->get());

            $this->view('Main',[
                'Page' => 'ProductDetail',
                'productData' => $productData,
                'productsRecommend' => $productsRecommend,
                'cart' => $cartData
            ]);
        }
    }

    function addCart(){

        // PHP chỉ nhận biến $_POST khi gửi bằng application/x-www-form-urlencoded
        $data = json_decode(file_get_contents('php://input'));
        $id = $data->productTypeId;
        $qty = $data->productTypeQty;
        
        // Check if item exists
        if ($this->cartModel->getQty($id) > 0)
        {
            echo $this->sendResponse('error', 'Sản phẩm đã tồn tại');
            return;
        }

        $addResult = 
            $this->cartModel->add($id, $qty);

        if ($addResult)
        {
            echo $this->sendResponse();
        }
        else
            echo $this->sendResponse('error', 'Thêm sản phẩm thất bại');
    }

    function rmCart(){
        // PHP chỉ nhận biến $_POST khi gửi bằng application/x-www-form-urlencoded
        $data = json_decode(file_get_contents('php://input'));
        
        $addResult = 
            $this->cartModel->delete($data->id);

        if ($addResult)
        {
            echo $this->sendResponse('success', 'Xóa sản phẩm thành công !');
        }
        else
            echo $this->sendResponse('erorr', 'Xóa sản phẩm thất bại !');
    }
}
?>