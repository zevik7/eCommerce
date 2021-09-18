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
    function loadList($params){
        /*
            1. Get Params
            2. Xu lí tuần tự params: 
                search->
                filter-column->
                filter-order->
                pagination
            3. Trả view
        */
        $query =
        " SELECT 
        pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom,
        MIN(pt.productTypePrice) as productTypePrice,
        ip.imageProductUrl,
        MIN(pts.productTypeSubPrice) as productTypeSubPrice
        FROM product pd
        INNER JOIN image_product ip
        ON ip.productId = pd.productId
        INNER JOIN product_type pt
        ON pt.productId = pd.productId
        LEFT JOIN product_type_sub pts 
        ON pts.productTypeId = pt.productTypeId
        WHERE ip.imageProductType = 'thumb' ";

        // Search
        if (isset($_GET['search']))
        {
            $keyword = $_GET['search'];
            $query = $query . " AND pd.productName LIKE '%$keyword%' ";
        }
        // Group by
        $query = $query . " GROUP BY pd.productId ";
        // Filter
        if (isset($_GET['filter']))
        {
            $filter = $_GET['filter'];
            switch ($filter) {
                case 'newest':
                    $query = $query . " ORDER BY pd.productDate DESC ";
                    break;
                case 'selling':
                    $query = $query . " ORDER BY pd.productSold DESC ";
                    break;
                case 'price-asc':
                    $query = 
                        $query . " ORDER BY pt.productTypePrice ASC, pts.productTypeSubPrice ASC ";
                    break;
                case 'price-desc':
                    $query = 
                        $query . " ORDER BY pt.productTypePrice DESC, pts.productTypeSubPrice DESC ";
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        // Pagination
        if (isset($_GET['pageNumber'])) {
            $this->paginationModel->currentPage = $_GET['pageNumber'];
        }
        
        $productQuantity = $this->productModel->getProductQuantity();
        $this->paginationModel->calPagination($productQuantity);
        
        $query = $query . " LIMIT " 
        . $this->paginationModel->offset
        . " , "
        .$this->paginationModel->perPage;
        
        $productsData = json_encode($this->productModel->select($query));

        $this->view('Main',[
            'Page' => 'ProductList',
            'User' => $this->userModel->getUser(),
            'Product' => $productsData,
            'Pagination' => $this->paginationModel->getPagination()
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