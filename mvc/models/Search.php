<?php
    class Search extends DB{
        //Product's general information
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
        //Product's type
        // public $productTypeName;
        // public $productTypeQuantity;
        // public $productTypePrice;
        // public $productFreightCost;
        // public $currentDate;

        /*-------For Web system-----------*/
        public function searchProductList($productName = '',$offset = 0, $productsQuantity = 0){
            $query = 
            // "SELECT * FROM product WHERE MATCH(productName) AGAINST ('$productName')
            // GROUP BY productId
            // LIMIT ?, ?";

            "SELECT pd.productId, pd.productName,
            pd.productDiscount, pd.productSource, 
            pd.productSold, pd.productBrand, 
            pd.productRating, pd.productSendFrom, 
            -- pd.productDescription,
            -- pc.productCategoryId,
            -- pc.productCategoryName,
            -- pt.productTypeId,
            -- pt.productTypeName,
            MIN(pt.productTypePrice) as productTypePrice,
            ip.imageProductId,
            ip.imageProductUrl,
            -- pts.productTypeSubId,
            -- pts.productTypeSubName,
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
            WHERE pd.productName LIKE '%$productName%'
            GROUP BY pd.productId
            LIMIT ?,?";

            $result = $this->readDB($query, array( $offset, $productsQuantity));
            if ($result !== false)
            {
                return json_encode($result);
            }
            return json_encode([]);
        }
        public function searchProductQuantity($productName){
            $query = 
            "SELECT * FROM product WHERE productName LIKE '%$productName%'
            GROUP BY productId";
            
            $result = $this->readDB($query);
            if ($result !== false)
            {
                return count($result);
            }
            return 0;
        }


        

    }
?>