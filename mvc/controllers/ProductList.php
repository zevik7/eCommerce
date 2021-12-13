<?php
namespace mvc\controllers;
use mvc\core\Controller;
use mvc\models\Pagination; 
use mvc\models\Product; 
use mvc\models\User; 
use mvc\models\Cart; 
use mvc\models\Category; 

class ProductList extends Controller{
    protected $userModel;
    protected $productModel;
    protected $paginationModel;
    protected $cartModel;
    protected $categoryModel;

    function __construct(){
        $this->userModel = new User();
        $this->productModel = new Product();
        $this->paginationModel = new Pagination();
        $this->cartModel = new Cart();
        $this->CategoryModel = new Category();
    }
    function load(){    
        $productQuantity = $this->productModel->getProductQuantity();
        $query =
        " SELECT 
        pd.id as productId, 
        pd.name as productName,
        pd.discount as productDiscount, 
        pd.source as productSource, 
        pd.sold as productSold, 
        pd.brand as productBrand, 
        pd.rating as productRating, 
        pd.send_from as productSendFrom,
        MIN(pt.price) as productTypePrice,
        img.url as imageUrl
        FROM products pd
        INNER JOIN product_categories pc
        ON pd.product_category_id = pc.id
        INNER JOIN images img
        ON img.imageable_id = pd.id
        INNER JOIN product_types pt
        ON pt.product_id = pd.id
        WHERE img.type = 'thumb'
        AND img.imageable_type = 'product'
        AND img.imageable_id = pd.id";

        // Search /url?search
        if (isset($_GET['search']))
        {
            $keyword = $_GET['search'];
            $productQuantity = $this->productModel->getProductQuantityByName($keyword);
            if( $productQuantity > 0){
                $_SESSION['search'] = 'found';
                $query = $query . " AND pd.name LIKE '%$keyword%' ";
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
            $query = $query . " AND pc.id = $categoryId ";
            $productQuantity = $this->productModel->getProductQuantityByCategory($categoryId);
        }

        // Group by
        $query = $query . " GROUP BY pd.id ";

        // Filter
        if (isset($_GET['filter']))
        {
            $filter = $_GET['filter'];
            switch ($filter) {
                case 'newest':
                    $query = $query . " ORDER BY pd.date DESC ";
                    break;
                case 'selling':
                    $query = $query . " ORDER BY pd.sold DESC ";
                    break;
                case 'price-asc':
                    $query = 
                        $query . " ORDER BY pt.price ASC";
                    break;
                case 'price-desc':
                    $query = 
                        $query . " ORDER BY pt.price DESC";
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
        $cartData = json_encode($this->cartModel->get());
        
        // Load category
        $categoryData = json_encode($this->CategoryModel->getCategories());
        
        $this->view('Main',[
            'Page' => 'ProductList',
            'User' => $this->userModel->getUser(),
            'Product' => $productsData,
            'Pagination' => $this->paginationModel->getPagination(),
            'cart' => $cartData,
            'category' => $categoryData
        ]);
    }
}