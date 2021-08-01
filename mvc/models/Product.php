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
        public function read(){
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
            "SELECT product.productId, productName, productDiscount, 
            productSource, productSold, productBrand, productRating, 
            imageProductUrl, productTypePrice 
            FROM product, image_product, product_type
            where product.productId = image_product.productId 
            AND product_type.productId = image_product.productId 
            AND imageProductType = 'thumb'
            GROUP BY product.productId
            ORDER BY productTypePrice
            LIMIT ?, ?";

            $result = $this->readDB($query, array($offset, $productsQuantity));
            return json_encode($result);
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
    }
?>