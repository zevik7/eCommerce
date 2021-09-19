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
    function loadList(){
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
        WHERE ip.imageProductType = 'thumb' ";

        // Search
        if (isset($_GET['search']))
        {
            $keyword = $_GET['search'];
            $query = $query . " AND pd.productName LIKE '%$keyword%' ";
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
        // Calculate pagination limit
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
}