<?php
class SearchList extends Controller{
    protected $userModel;
    protected $searchModel;
    protected $paginationModel;
    protected $productModel;

    function __construct(){
        $this->userModel = $this->model('User');
        $this->searchModel = $this->model('Search');
        $this->productModel = $this->model('Product');
        $this->paginationModel = $this->model('Pagination');
    }
    function LoadList(){
        //Pagination
        // if (isset($_GET['pageNumber']) && is_numeric($_GET['pageNumber'])) {
        //     $this->paginationModel->currentPage = $_GET['pageNumber'];
        // }

        if (isset($_GET['keyword'])) {
            if (isset($_GET['pageNumber']) && is_numeric($_GET['pageNumber'])) {
                $this->paginationModel->currentPage = $_GET['pageNumber'];
            }

            $productName = trim($_GET['keyword']);
            // trim($_GET["url"]
            $totalItem = $this->searchModel->searchProductQuantity($productName);

            if($totalItem == 0){
                $productQuantity = $this->productModel->getProductQuantity();
                $this->paginationModel->calpagination($productQuantity);
                $productsData = 
                    $this->productModel->getProductList($this->paginationModel->offset, $this->paginationModel->itemPerPage);
                $this->view('Main',[
                    'Page' => 'ProductList',
                    'User' => $this->userModel->getUser(),
                    'Product' => $productsData,
                    'Pagination' => $this->paginationModel->getPagination(),
                    'Keyword'   => $productName,
                    'ProductQuantity' => $totalItem
                ]);
            }
            else{
                $productQuantity = $totalItem;
                $this->paginationModel->calpagination($productQuantity);
                // echo $productQuantity;
                $productsData = 
                $this->searchModel->searchProductList($productName, $this->paginationModel->offset, $this->paginationModel->itemPerPage);
        
                $this->view('Main',[
                    'Page' => 'ProductList',
                    'User' => $this->userModel->getUser(),
                    'Product' => $productsData,
                    'Pagination' => $this->paginationModel->getPagination(),
                    'Keyword'   => $productName,
                    'ProductQuantity' => $totalItem
                ]);
            }
        }
    }
}
?>