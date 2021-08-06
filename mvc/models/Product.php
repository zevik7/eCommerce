<?php
    class Product extends DB{
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
        public function getProductList($offset = 0, $productsQuantity = 0){
            $query = 
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
            WHERE ip.imageProductType = 'thumb'
            GROUP BY pd.productId
            LIMIT ?, ?";

            $result = $this->readDB($query, array($offset, $productsQuantity));
            return json_encode($result);
        }
        public function getProduct($productId){
            $productQuery = 
            "SELECT productId, productName,
            productDiscount, productSource, 
            productSold, productBrand, 
            productRating, productSendFrom, 
            productDescription,
            pc.productCategoryName
            FROM product pd
            LEFT JOIN product_category pc
            ON pd.productCategoryId = pc.productCategoryId
            WHERE pd.productId='".$productId."'";

            // $productTypeQuery = 
            // "SELECT pt.productTypeId, pt.productTypeName, pt.productTypeQuantity, 
            // pt.productTypePrice, pt.productFreightCost, 
            // ptl.productTypeLabelId, ptl.productTypeLabelName,
            // pts.productTypeSubId, pts.productTypeSubName,
            // pts.productTypeSubQuantity, pts.productTypeSubPrice,
            // pts.productTypeLabelId as productTypeLabelSubId, pts.productTypeLabelName as productTypeLabelSubName
            // FROM product_type pt
            // INNER JOIN product_type_label ptl 
            // ON pt.productTypeLabelId = ptl.productTypeLabelId
            // LEFT JOIN 
            // (SELECT productTypeId, productTypeSubId, productTypeSubName,
            // productTypeSubQuantity, productTypeSubPrice,
            // ptl.productTypeLabelId, ptl.productTypeLabelName
            // FROM product_type_sub pts 
            // INNER JOIN product_type_label ptl 
            // ON ptl.productTypeLabelId = pts.productTypeLabelId) pts
            // ON pt.productTypeId = pts.productTypeId
            // WHERE productId ='".$productId."'";

            $productTypeQuery = 
            "SELECT * FROM product_type pt
            LEFT JOIN product_type_label ptl
            ON pt.productTypeLabelId = ptl.productTypeLabelId
            WHERE productId ='".$productId."'";

            $productImageQuery = 
            "SELECT imageProductId, imageProductType, 
            imageProductName, imageProductUrl, 
            imageProductDescription 
            FROM image_product
            WHERE productId='".$productId."'";

            $productRatingQuery =
            "SELECT * FROM product_rating
            WHERE productId ='".$productId."'";

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
                $allResult['productTypeSub'] = $this->getProductTypeSub($productTypeResult);
            }          
            if ($productImageResult !== false) {
                $allResult['productImage'] = $productImageResult;
            }
            if ($productRating !== false) {
                $allResult['productRating'] = $productRating;
            }
            if ($productRating !== false) {
                $allResult['productRating'] = $productRating;
            }
            return json_encode($allResult);
        }
        public function getProductQuantity(){
            $query = "SELECT * FROM product_type GROUP BY productId";
            $result = $this->readDB($query);
            if ($result !== false)
            {
                return count($result);
            }
            return 0;
        }

        public function getProductTypeSub($productTypeList){
            $productTypeListId = array_column($productTypeList, 'productTypeId');
            $productTypeSub = array();
            if(!empty($productTypeListId))
            {
                foreach($productTypeListId as $typeId){
                    $query = 
                    "SELECT * FROM product_type_sub pts
                    INNER JOIN product_type_label ptl
                    ON pts.productTypeLabelId = ptl.productTypeLabelId
                    WHERE productTypeId='".$typeId."'";
                    $result = $this->readDB($query);
                    if ($result !== false)
                    {
                        array_push($productTypeSub, $result);
                    }
                }
            }
            return $productTypeSub;
        }
        public function getCategoryId($productId)
        {
            $query = 
            "SELECT productCategoryId 
            FROM product
            WHERE productId = '".$productId."'
            LIMIT 1";

            $result = $this->readDB($query);
            if ($result !== false)
            {
                return $result[0]->productCategoryId;
            }
            return '';
        }
        public function getProductListByCategory($productCategoryId, $offset = 0, $productsQuantity = 0){
            $query= 
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
            WHERE ip.imageProductType = 'thumb'
            AND pc.productCategoryId = ".$productCategoryId."
            GROUP BY pd.productId
            ORDER BY pd.productSold DESC
            LIMIT ?,?";
            $result = $this->readDB($query, array($offset,$productsQuantity));
            if ($result !== false)
            {
                return json_encode($result);
            }
            return json_encode([]);
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
    }
?>