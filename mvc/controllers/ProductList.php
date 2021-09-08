<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Pagination; 
use mvc\models\Product; 
use mvc\models\User; 

class ProductList extends Controller{
    protected $userModel;
    protected $productModel;
    protected $paginationModel;
    protected $URL;

    function __construct(){
        $this->userModel = new User();
        $this->productModel = new Product();
        $this->paginationModel = new Pagination();
    }
    function test(){
        $query = 
        "SELECT pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom, 
        pc.productCategoryId,
        MIN(pt.productTypePrice) as productTypePrice,
        ip.imageProductId,
        ip.imageProductUrl,
        MIN(pts.productTypeSubPrice) as productTypeSubPrice
        FROM product pd
        INNER JOIN product_category pc
        ON pd.productCategoryId = pc.productCategoryId
        INNER JOIN image_product ip
        ON ip.productId = pd.productId
        INNER JOIN product_type pt
        ON pt.productId = pd.productId
        LEFT JOIN product_type_sub pts 
        ON pts.productTypeId = pt.productTypeId
        WHERE ip.imageProductType = 'thumb'";
        if (isset($_GET['search']))
        {
            $keyword = $_GET['search'];
            $query = 
                $query." AND pd.productName LIKE '%$keyword%'"; 
        }
        $query = $query."  GROUP BY pd.productId";
        $this->view('Main',[
            'Page' => 'ProductList',
            'User' => $this->userModel->getUser(),
            'Product' => json_encode($this->productModel->select($query))
            // 'Pagination' => $this->paginationModel->getPagination(),
            // 'URL' => $this->URL
        ]);
    }
    function loadList(){
        /*
            1. Get Params
            2. Xu lí tuần tự params: 
                search->filtercolumn->filter-order->phântrang
            3. Trả view

            --
            tạo một trait cho model, dùng cho search và filter column

        */
        //Pagination
        if (isset($_GET['pageNumber']) && is_numeric($_GET['pageNumber'])) {
            $this->paginationModel->currentPage = $_GET['pageNumber'];
        }
        $productName = '';
        if (isset($_GET['keyword']))  $productName = 'keyword='.$_GET['keyword'].'&';
        $productQuantity = $this->productModel->getProductQuantity();
        $this->paginationModel->calpagination($productQuantity);
        $productsData = 
            $this->productModel->getProducts($this->paginationModel->offset, $this->paginationModel->perPage);
        $this->URL = './ProductList/loadList/?pageNumber=';
        $this->view('Main',[
            'Page' => 'ProductList',
            'User' => $this->userModel->getUser(),
            'Product' => $productsData,
            'Pagination' => $this->paginationModel->getPagination(),
            'URL' => $this->URL
        ]);
    }
    
    function loadListByCategory($categoryId){
        $categoryId = 1;
        //Pagination
        if (isset($_GET['pageNumber']) && is_numeric($_GET['pageNumber'])) {
            $this->paginationModel->currentPage = $_GET['pageNumber'];
        }
        $productQuantity = $this->productModel->getProductQuantityByCategory($categoryId);
        $this->paginationModel->calpagination($productQuantity);
        $productsData = 
            $this->productModel->getProductListByCategory($categoryId, $this->paginationModel->offset, $this->paginationModel->perPage);
        $this->view('Main',[
            'Page' => 'ProductList',
            'User' => $this->userModel->getUser(),
            'Product' => $productsData,
            'Pagination' => $this->paginationModel->getPagination()
        ]);
    }
    function loadListByName(){
        if (isset($_GET['keyword'])) {

            if (isset($_GET['pageNumber']) && is_numeric($_GET['pageNumber'])) {
                $this->paginationModel->currentPage = $_GET['pageNumber'];
            }

            $productName = trim($_GET['keyword']);
            $totalItem = $this->productModel->getProductQuantityByName($productName);

            if($totalItem == 0)
            {
                $productQuantity = $this->productModel->getProductQuantity();
                $this->paginationModel->calpagination($productQuantity);
                $productsData = 
                    $this->productModel->getProducts($this->paginationModel->offset, $this->paginationModel->perPage);
                    $this-> URL = './ProductList/loadListByName/?keyword='.$productName.'&pageNumber=';
            }
            else
            {
                $productQuantity = $totalItem;
                $this->paginationModel->calpagination($productQuantity);
                $productsData = 
                $this->productModel->getProductListByName($productName, $this->paginationModel->offset, $this->paginationModel->perPage);
                $this-> URL = './ProductList/loadListByName/?keyword='.$productName.'&pageNumber=';
            }
            $this->view('Main',[
                'Page' => 'ProductList',
                'User' => $this->userModel->getUser(),
                'Product' => $productsData,
                'Pagination' => $this->paginationModel->getPagination(),
                'Keyword'   => $productName,
                'ProductQuantity' => $totalItem,
                'URL' => $this->URL
            ]);
        }
    }
    function SortBy(){

        if (isset($_GET['pageNumber']) && is_numeric($_GET['pageNumber'])) {
            $this->paginationModel->currentPage = $_GET['pageNumber'];
        }

        $sortBy = $_GET['sortBy'];

        $productName = '';

        if (isset($_GET['keyword'])) 
            $productName = trim($_GET['keyword']);

        $totalItem = $this->productModel->getProductQuantityByName($productName); 

        if($totalItem == 0)
        {
            $productQuantity = $this->productModel->getProductQuantity();

            $this->paginationModel->calpagination($productQuantity);
    
            $productsData = 
                $this->productModel->$sortBy('', $this->paginationModel->offset, $this->paginationModel->perPage);
            if($productName !='' ) $url = 'keyword='.$productName.'&';
                
            $this->URL = './ProductList/SortBy/?'.$url.'sortBy='.$sortBy.'&pageNumber=';
        }
    

        if( $totalItem != 0) {
            $productQuantity = $totalItem;
            $this->paginationModel->calpagination($productQuantity);
            $productsData = 
                $this->productModel-> $sortBy($productName, $this->paginationModel->offset, $this->paginationModel->perPage);
            $this-> URL = './ProductList/SortBy/?keyword='.$productName.'&sortBy='.$sortBy.'&pageNumber=';
        }
        $this->view('Main',[
            'Page' => 'ProductList',
            'User' => $this->userModel->getUser(),
            'Product' => $productsData,
            'Pagination' => $this->paginationModel->getPagination(),
            'Keyword'   => $productName,
            'ProductQuantity' => $totalItem,
            'URL' => $this->URL
        ]);
        
        
    }
}
?>