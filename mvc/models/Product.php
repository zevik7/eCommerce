<?php
namespace mvc\models;
use mvc\models\traits\Filter;
use mvc\core\DB;

class Product extends DB{

    use Filter;
    public $productId;
    public $shopId;
    public $productCategoryId;
    public $productName; 
    public $productQuantity; 
    public $productDescription; 
    public $productDiscount; 
    public $productSource; 
    public $productSendFrom; 
    public $productSold; 
    public $productBrand; 
    public $productDate; 
    public $productRating;
    /*
        ---------Read, create for API------------
    */
    public function read_all(){
        $query = 
        "SELECT 
            product.productId,
            product.shopId,
            productCategoryId,
            productName, 
            productQuantity, 
            productDescription, 
            productDiscount, 
            productSource, 
            productSendFrom, 
            productSold, 
            productBrand, 
            productDate, 
            productRating
        FROM product";
        $result = $this->readDB($query);
        if ($result !== false)
        {
            return $result;
        }
        return ['message' => 'Empty'];
    }

    public function read_single(){
        $query = 
        "SELECT 
            productId,
            shopId,
            productCategoryId,
            productName, 
            productQuantity, 
            productDescription, 
            productDiscount, 
            productSource, 
            productSendFrom, 
            productSold, 
            productBrand, 
            productDate, 
            productRating
        FROM product
        WHERE productId = ?";
        $result = $this->readDB($query, array($this->productId));
        if ($result !== false)
        {
            return $result;
        }
        return ['message' => 'Empty'];
    }
    
    public function insert(){
        $currentDate = date("Y-m-d h:i:s");
        $this->productDate = $currentDate;
        $query =
        "INSERT INTO product(
                shopId,
                productCategoryId,
                productName, 
                productDescription, 
                productDiscount, 
                productSource, 
                productSendFrom, 
                productBrand, 
                productDate)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $queryParams = array(
            $this->shopId, 
            $this->productCategoryId, 
            $this->productName, 
            $this->productDescription, 
            $this->productDiscount, 
            $this->productSource, 
            $this->productSendFrom, 
            $this->productBrand,                  
            $this->productDate);
        //Clean Data
        // $this->cleanData($queryParams);
        $result = $this->writeDB($query, $queryParams);
        return $result;
    }

    /*-------For Web system-----------*/
    function select($query, $params = [])
    {
        $result = $this->readDB($query, $params);
        if ($result !== false)
        {
            return $result;
        }
        return false;
    }

    public function getProducts($offset = 0, $productsQuantity = 0){
        $query =
        "SELECT pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom, 
        pc.productCategoryId,
        MIN(pt.productTypePrice) as productTypePrice,
        img.id as image_id,
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
        GROUP BY pd.productId
        LIMIT ?, ?";

        $result = $this->readDB($query, array($offset, $productsQuantity));
        return json_encode($result);
    }

    public function getProduct($productId){
        $productQuery = 
            "SELECT pd.productId, pd.productName,
            pd.productDiscount, pd.productSource, 
            pd.productSold, pd.productBrand, 
            pd.productRating, pd.productSendFrom, 
            pd.productDescription,
            pd.productQuantity,
            pc.productCategoryName
            FROM product pd
            LEFT JOIN product_category pc
            ON pd.productCategoryId = pc.productCategoryId
            WHERE pd.productId = '$productId'";

        $productTypeQuery = 
            "SELECT 
            productTypeId, productTypeLabel,
            productTypeName, productTypeQuantity,
            productTypePrice, productFreightCost
            FROM product_type
            WHERE productId = '$productId'";

        $productImageQuery = 
            "SELECT 
            img.id, img.type, 
            img.name, img.url as image_url, 
            img.description 
            FROM images img
            WHERE img.imageable_id = '$productId'";

        $productRatingQuery =
            "SELECT DISTINCT 
            *, img.url as image_url
            FROM product_rating pr
            INNER JOIN product_type pt
            ON pr.productTypeId = pt.productTypeId
            INNER JOIN (
                SELECT ur.userId, ur.userName
                FROM ecommerce.user ur
            ) ur
            ON ur.userId = pr.userId
            INNER JOIN images img
            ON img.imageable_id = ur.userId
            WHERE pr.productId ='$productId'
            AND img.imageable_type = 'user'
            AND img.type ='avatar'";

        $productResult = $this->readDB($productQuery);
        $productTypeResult = $this->readDB($productTypeQuery);
        $productImageResult = $this->readDB($productImageQuery);
        $productRating = $this->readDB($productRatingQuery);
        
        $allResult = array();
        if ($productResult !== false) {
            $allResult['product'] = $productResult;
        }
        if ($productTypeResult !== false) {
            $allResult['productType'] = $productTypeResult;
        }          
        if ($productImageResult !== false) {
            $allResult['productImage'] = $productImageResult;
        }
        if ($productRating !== false) {
            $allResult['productRating'] = $productRating;
        }

        return $allResult !== false ? $allResult : [];
    }

    public function getProductQuantity(){
        $query = "SELECT productId FROM product_type GROUP BY productId";
        $result = $this->readDB($query);
        if ($result !== false)
        {
            return count($result);
        }
        return 0;
    }

    public function getCategoryId($productId)
    {
        $query = 
        "SELECT productCategoryId 
        FROM product
        WHERE productId = '$productId'
        LIMIT 1";

        $result = $this->readDB($query);
        if ($result !== false)
        {
            return $result[0]["productCategoryId"];
        }
        return '';
    }

    public function getProductListByCategory($productCategoryId, $offset = 0, $productsQuantity = 0){
        $query= 
        "SELECT pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom, 
        MIN(pt.productTypePrice) as productTypePrice,
        img.id as image_id,img.url as image_url
        FROM product pd
        INNER JOIN product_category pc
        ON pd.productCategoryId = pc.productCategoryId
        INNER JOIN images img
        ON img.imageable_id = pd.productId
        INNER JOIN product_type pt
        ON pt.productId = pd.productId
        WHERE img.type = 'thumb'
        AND img.imageable_type = 'product'
        AND pc.productCategoryId = '$productCategoryId'
        GROUP BY pd.productId
        ORDER BY pd.productSold DESC
        LIMIT ?,?";
        
        $result = $this->readDB($query, array($offset,$productsQuantity));
        
        return $result;
    }

    public function getProductQuantityByCategory($categoryId)
    {
        $query =
        "SELECT * from product pd
        INNER JOIN product_type pt
        ON pd.productId = pt.productId
        WHERE productCategoryId = ?
        GROUP BY pd.productId";

        $result = $this->readDB($query, array($categoryId));

        if($result !== false){
            return count($result);
        }
        return 0;
    }

    public function getProductListByName($productName = '',$offset = 0, $productsQuantity = 0){
        $query = 
        "SELECT pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom, 
        MIN(pt.productTypePrice) as productTypePrice,
        img.id as image_id,
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
        AND pd.productName LIKE '%$productName%'
        GROUP BY pd.productId
        LIMIT ?,?";

        $result = $this->readDB($query, array( $offset, $productsQuantity));
        
        return $result;
    }

    public function getProductQuantityByName($keyword = ''){
        $query = 
        "SELECT * FROM product WHERE productName LIKE '%$keyword%'
        GROUP BY productId";
        
        $result = $this->readDB($query);
        return $result !== false ? count($result) : 0;
    }

    function ASC($productName = '' , $offset = 0, $productsQuantity = 0  ){
        $query = 
        "SELECT pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom, 
        MIN(pt.productTypePrice) as productTypePrice,
        img.id as image_id,
        img.url as image_url,
        (MIN(pt.productTypePrice) - ( MIN(pt.productTypePrice)*pd.productDiscount)) AS productSalePrice
        FROM product pd
        INNER JOIN product_category pc
        ON pd.productCategoryId = pc.productCategoryId
        INNER JOIN images img
        ON img.imageable_id = pd.productId
        INNER JOIN product_type pt
        ON pt.productId = pd.productId
        WHERE img.type = 'thumb'
        AND img.imageable_type = 'product'
        AND pd.productName LIKE '%$productName%'
        GROUP BY pd.productId
        ORDER BY productSalePrice ASC
        LIMIT ?,?";

        $result = $this->readDB($query, array( $offset, $productsQuantity));
        if ($result !== false)
        {
            return json_encode($result);
        }
        return json_encode([]);
    }

    function DESC($productName = '' , $offset = 0, $productsQuantity = 0  ){
        $query = 
        "SELECT pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom, 
        MIN(pt.productTypePrice) as productTypePrice,
        img.id as image_id,
        img.url as image_url,
        (MIN(pt.productTypePrice) - ( MIN(pt.productTypePrice)*pd.productDiscount)) AS productSalePrice
        FROM product pd
        INNER JOIN product_category pc
        ON pd.productCategoryId = pc.productCategoryId
        INNER JOIN images img
        ON img.imageable_id = pd.productId
        INNER JOIN product_type pt
        ON pt.productId = pd.productId
        WHERE img.type = 'thumb'
        AND img.imageable_type = 'product'
        AND pd.productName LIKE '%$productName%'
        GROUP BY pd.productId
        ORDER BY productSalePrice DESC
        LIMIT ?,?";

        $result = $this->readDB($query, array( $offset, $productsQuantity));
        if ($result !== false)
        {
            return json_encode($result);
        }
        return json_encode([]);
    }

    function SOLDE($productName = '' , $offset = 0, $productsQuantity = 0  ){
        $query = 
        "SELECT pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom, 
        MIN(pt.productTypePrice) as productTypePrice,
        img.id as image_id,
        img.url as image_url,
        (MIN(pt.productTypePrice) - ( MIN(pt.productTypePrice)*pd.productDiscount)) AS productSalePrice
        FROM product pd
        INNER JOIN product_category pc
        ON pd.productCategoryId = pc.productCategoryId
        INNER JOIN images img
        ON img.imageable_id = pd.productId
        INNER JOIN product_type pt
        ON pt.productId = pd.productId
        WHERE img.type = 'thumb'
        AND img.imageable_type = 'product'
        AND pd.productName LIKE '%$productName%'
        GROUP BY pd.productId
        ORDER BY pd.productSold DESC
        LIMIT ?,?";

        $result = $this->readDB($query, array( $offset, $productsQuantity));
        if ($result !== false)
        {
            return json_encode($result);
        }
        return json_encode([]);
    }

    function NEW($productName = '' , $offset = 0, $productsQuantity = 0  ){
        $query = 
        "SELECT pd.productId, pd.productName,
        pd.productDiscount, pd.productSource, 
        pd.productSold, pd.productBrand, 
        pd.productRating, pd.productSendFrom, 
        pd.productDate,
        MIN(pt.productTypePrice) as productTypePrice,
        img.id as image_id,
        img.url as image_url,
        (MIN(pt.productTypePrice) - ( MIN(pt.productTypePrice)*pd.productDiscount)) AS productSalePrice
        FROM product pd
        INNER JOIN product_category pc
        ON pd.productCategoryId = pc.productCategoryId
        INNER JOIN images img
        ON img.imageable_id = pd.productId
        INNER JOIN product_type pt
        ON pt.productId = pd.productId
        WHERE img.type = 'thumb'
        AND img.imageable_type = 'product'
        AND pd.productName LIKE '%$productName%'
        GROUP BY pd.productId
        ORDER BY pd.productDate DESC
        LIMIT ?,?";

        $result = $this->readDB($query, array( $offset, $productsQuantity));
        if ($result !== false)
        {
            return json_encode($result);
        }
        return json_encode([]);
    }
}
?>