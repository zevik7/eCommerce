<?php
namespace mvc\models;
use mvc\core\DB;

class Product extends DB{

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
        "SELECT 
        pd.id as productId, 
        pd.name as productName,
        pd.discount as productDiscount, 
        pd.source as productSource, 
        pd.sold as productSold, 
        pd.brand as productBrand, 
        pd.rating as productRating, 
        pd.send_from as productSendFrom, 
        pc.id as productCategoryId,
        MIN(pt.price) as productTypePrice,
        img.id as imageId,
        img.url as imageUrl
        FROM products pd
        INNER JOIN product_categories pc
        ON pd.product_category_id = pc.id
        INNER JOIN images img
        ON img.imageable_id = pd.productId
        INNER JOIN product_types pt
        ON pt.id = pd.product_id
        WHERE img.type = 'thumb'
        AND img.imageable_type = 'product'
        GROUP BY pd.id
        LIMIT ?, ?";

        $result = $this->readDB($query, array($offset, $productsQuantity));
        return json_encode($result);
    }

    public function getProduct($productId){
        $productQuery = 
            "SELECT 
            pd.id as productId, 
            pd.name as productName,
            pd.discount as productDiscount, 
            pd.source as productSource,
            pd.sold as productSold, 
            pd.brand as productBrand,
            pd.rating as productRating, 
            pd.send_from as productSendFrom,
            pd.description as productDescription,
            pd.quantity as productQuantity,
            pc.name as productCategoryName
            FROM products pd
            LEFT JOIN product_categories pc
            ON pd.product_category_id = pc.id
            WHERE pd.id = '$productId'";

        $productTypeQuery = 
            "SELECT 
            id as productTypeId, 
            label as productTypeLabel,
            name as productTypeName, 
            quantity as productTypeQuantity,
            price as productTypePrice, 
            freight_cost as productFreightCost
            FROM product_types
            WHERE product_id = '$productId'";

        $productImageQuery = 
            "SELECT 
            img.id as imageId,
            img.type as imageType,
            img.name as imageName,
            img.url as imageUrl,
            img.description as imageDescription
            FROM images img
            WHERE img.imageable_id = '$productId'";

        $productRatingQuery =
            "SELECT
            pr.id as productRatingId,
            pr.product_type_id as productTypeId,
            pr.user_id as userId,
            pr.star as productRatingStar,
            pr.comment as productRatingComment,
            pr.date as productRatingDate,
            pr.type as productRatingType,
            pt.label as productTypeLabel,
            pt.name as productTypeName,
            ur.name as userName,
            img.url as imageUrl
            FROM product_ratings pr
            INNER JOIN product_types pt
            ON pr.product_type_id = pt.id
            INNER JOIN users ur
            ON ur.id = pr.user_id
            INNER JOIN images img
            ON img.imageable_id = ur.id
            WHERE pt.product_id ='$productId'
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
        $query = 
            "SELECT 
            product_id as productId 
            FROM product_types 
            GROUP BY product_id";
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
            "SELECT 
            product_category_id as productCategoryId 
            FROM products
            WHERE id = '$productId'
            LIMIT 1";

        $result = $this->readDB($query);
        if ($result !== false)
        {
            return $result[0]["productCategoryId"];
        }
        return '';
    }

    public function getProductQuantityByCategory($categoryId)
    {
        $query =
            "SELECT
            quantity as productQuantity
            from products pd
            WHERE pd.product_category_id = ?";

        $result = $this->readDB($query, array($categoryId));

        if($result !== false){
            return count($result);
        }
        return 0;
    }

    public function getProductQuantityByName($keyword = ''){
        $query = 
        "SELECT 
        quantity as productQuantity 
        FROM products 
        WHERE name 
            LIKE '%$keyword%'
        GROUP BY id";
        
        $result = $this->readDB($query);
        return $result !== false ? count($result) : 0;
    }

    public function getProductListByCategory($productCategoryId, $offset = 0, $productsQuantity = 0){
        $query= 
        "SELECT
        pd.id as productId, 
        pd.name as productName,
        pd.discount as productDiscount, 
        pd.source as productSource, 
        pd.sold as productSold, 
        pd.brand as productBrand, 
        pd.rating as productRating, 
        pd.send_from as productSendFrom, 
        MIN(pt.price) as productTypePrice,
        img.id as imageId,
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
        AND pc.id = '$productCategoryId'
        GROUP BY pd.id
        ORDER BY pd.sold DESC
        LIMIT ?,?";
        
        $result = $this->readDB($query, array($offset,$productsQuantity));
        
        return $result;
    }
}
?>