<?php
class ProductList extends Controller{
    protected $userModel;
    protected $productModel;
    protected $paginationModel;

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
        $productQuantity = $this->productModel->getProductQuantity();
        $this->paginationModel->calpagination($productQuantity);
        $productsData = 
            $this->productModel->getProductList($this->paginationModel->offset, $this->paginationModel->itemPerPage);
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
            $this->productModel->getProductListByCategory($categoryId, $this->paginationModel->offset, $this->paginationModel->itemPerPage);
        $this->view('Main',[
            'Page' => 'ProductList',
            'User' => $this->userModel->getUser(),
            'Product' => $productsData,
            'Pagination' => $this->paginationModel->getPagination()
        ]);
    }
}
?>