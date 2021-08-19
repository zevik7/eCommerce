<?php
class ProductList extends Controller{
    protected $userModel;
    protected $productModel;
    protected $paginationModel;
    protected $URL;

    function __construct(){
        $this->userModel = $this->model('User');
        $this->productModel = $this->model('Product');
        $this->paginationModel = $this->model('Pagination');
    }
    function loadList(){
        //Pagination
        if (isset($_GET['pageNumber']) && is_numeric($_GET['pageNumber'])) {
            $this->paginationModel->currentPage = $_GET['pageNumber'];
        }
        $productName = '';
        if (isset($_GET['keyword']))  $productName = 'keyword='.$_GET['keyword'].'&';
        $productQuantity = $this->productModel->getProductQuantity();
        $this->paginationModel->calpagination($productQuantity);
        $productsData = 
            $this->productModel->getProductList($this->paginationModel->offset, $this->paginationModel->itemPerPage);
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
            $this->productModel->getProductListByCategory($categoryId, $this->paginationModel->offset, $this->paginationModel->itemPerPage);
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
                    $this->productModel->getProductList($this->paginationModel->offset, $this->paginationModel->itemPerPage);
                    $this-> URL = './ProductList/loadListByName/?keyword='.$productName.'&pageNumber=';
            }
            else
            {
                $productQuantity = $totalItem;
                $this->paginationModel->calpagination($productQuantity);
                $productsData = 
                $this->productModel->getProductListByName($productName, $this->paginationModel->offset, $this->paginationModel->itemPerPage);
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
                $this->productModel->$sortBy('', $this->paginationModel->offset, $this->paginationModel->itemPerPage);
            if($productName !='' ) $url = 'keyword='.$productName.'&';
                
            $this->URL = './ProductList/SortBy/?'.$url.'sortBy='.$sortBy.'&pageNumber=';
        }
    

        if( $totalItem != 0) {
            $productQuantity = $totalItem;
            $this->paginationModel->calpagination($productQuantity);
            $productsData = 
                $this->productModel-> $sortBy($productName, $this->paginationModel->offset, $this->paginationModel->itemPerPage);
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