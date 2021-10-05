<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Pagination; 
use mvc\models\Product; 
use mvc\models\User; 
use mvc\models\Cart; 

class ProductList extends Controller{
    protected $userModel;
    protected $productModel;
    protected $paginationModel;
    protected $cartModel;

    function __construct(){
        $this->userModel = new User();
        $this->productModel = new Product();
        $this->paginationModel = new Pagination();
        $this->cartModel = new Cart();
    }
    function load(){
        /*
            1. Get Params
            2. Xu lí tuần tự params: 
                search->
                filter-column->
                filter-order->
                pagination
            3. Trả view
        */
        $productQuantity = $this->productModel->getProductQuantity();
        $query =
        " SELECT 
        pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom,
        MIN(pt.productTypePrice) as productTypePrice,
        img.url as image_url
        FROM product pd
        INNER JOIN product_category pc
        ON pd.productCategoryId = pc.productCategoryId
        INNER JOIN images img
        ON img.imageable_id = pd.productId
        INNER JOIN product_type pt
        ON pt.productId = pd.productId
        WHERE img.type = 'thumb'
        AND img.imageable_type = 'product'
        AND img.imageable_id = pd.productId";

        // Search
        if (isset($_GET['search']))
        {
            $keyword = $_GET['search'];
            $productQuantity = $this->productModel->getProductQuantityByName($keyword);
            if( $productQuantity > 0){
                $_SESSION['search'] = 'found';
                $query = $query . " AND pd.productName LIKE '%$keyword%' ";
            }
            else {
                $productQuantity = $this->productModel->getProductQuantity();
                $_SESSION['search'] = 404;
            }
        }

        //Filter category
        if (isset($_GET['category']))
        {
            $categoryId = $_GET['category'];
            $query = $query . " AND pc.productCategoryId = $categoryId ";
            $productQuantity = $this->productModel->getProductQuantityByCategory($categoryId);
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
                        $query . " ORDER BY pt.productTypePrice ASC";
                    break;
                case 'price-desc':
                    $query = 
                        $query . " ORDER BY pt.productTypePrice DESC";
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
        // Calculate pagination limit
        $this->paginationModel->calPagination($productQuantity);
        
        $query = $query . " LIMIT " 
            . $this->paginationModel->offset
            . " , "
            .$this->paginationModel->perPage;
        
        $productsData = json_encode($this->productModel->select($query));

        // Load cart data
        if (isset($_SESSION['user']['id']))
            $cartData = json_encode($this->cartModel->getCart());
        else $cartData = null;
        
        $this->view('Main',[
            'Page' => 'ProductList',
            'User' => $this->userModel->getUser(),
            'Product' => $productsData,
            'Pagination' => $this->paginationModel->getPagination(),
            'cart' => $cartData
        ]);
    }
}