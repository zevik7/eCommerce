<?php
    class Product extends DB{
        public function getProductInfo(){
            $query = 
            "SELECT product.productId, productName, productDiscount, productSource, productSold, productBrand, productRating, imageProductUrl, productTypePrice 
            FROM product, image_product, product_type
            where product.productId = image_product.productId AND product_type.productId = image_product.productId 
            AND imageProductType='thumb'
            GROUP BY product.productId
            ORDER BY productTypePrice;";
            $result = $this->read($query);
            return json_encode($result);
        }
    }
?>