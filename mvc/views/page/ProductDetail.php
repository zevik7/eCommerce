<?php 
    if (isset($data['productData'])){
    
    $productData = json_decode($data['productData'], true);

    $product = 
    array_key_exists('product', $productData) ? $productData['product'] : []; //One product / one row

    $productType = 
    array_key_exists('productType', $productData) ? $productData['productType'] : []; 

    $productImage =
    array_key_exists('productImage', $productData) ? $productData['productImage'] : [];

    $productRating =
    array_key_exists('productRating', $productData) ? $productData['productRating'] : [];
    
    // If false, not enough information to display
    if (!empty($product) || !empty($productType) || !empty($productImage))
    {
        // Flat 1 level
        $product = array_reduce($product, 'array_merge', array());

        /*---------Parse general data--------*/

        // Default min price and max price
        $minPrice = 99999999999;
        $maxPrice = -99999999999;

        // Array filter without callback remove falsy value
        $productTypePrice = array_filter(array_column($productType, 'productTypePrice'));

        // Get min and max price
        if (!empty($productTypePrice))
        {
            $minPrice = min($productTypePrice);
            $maxPrice = max($productTypePrice);
        }

        // Product type label list
        $productTypeLabelList = array_unique(array_column($productType, 'productTypeLabel'));

?>
    <div class="bg-transparent">
        <div class="grid pt-20">
            <div class="product-page">
                <div class="product-detail">
                    <div class="row">
                        <div class="col-5">
                            <div class="product-detail__carousel">
                                <!--Carousel -->
                                <?php require_once './mvc/views/block/ImageCarousel.php' ?>
                                <!-- end of carousel -->
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="product-detail__content">
                                <div class="product-heading">
                                    <span class="product-title">
                                        <span class="product-title__favourite">
                                            Yêu thích
                                        </span>
                                        <?php echo $product['productName'];?>
                                    </span> 
                                </div>
                                <div class="product-statis mt-20">
                                    <div class="statis-item product-rating">
                                        <span class="product-rating__number">
                                            <?php echo $product['productRating'];?>
                                        </span>
                                        <span class="product-rating__star">
                                            <?php
                                                displayStar($product['productRating']);
                                            ?>
                                        </span>
                                    </div>
                                    <div class="statis-item product-vote">
                                        <?php
                                            if (!empty($productRating)){
                                        ?>
                                            <span class="product-vote__number"><?php echo count($productRating);?></span>
                                        <?php
                                            }
                                        ?>
                                        <span class="product-vote__icon">Đánh giá</span>
                                    </div>  
                                    
                                    <div class="statis-item product-sold">
                                        <span class="product-sold__number">
                                            <?php echo $product['productSold'];?>
                                        </span>
                                        <span class="product-sold__icon">Đã bán</span>
                                    </div>
                                </div>
                                <div class="fs-product-price product-price mt-10">
                                    <?php
                                        if ($minPrice==$maxPrice){
                                    ?>
                                        <span class="product-price__from"><?php echo viPrice($minPrice);?></span>
                                    <?php
                                        } else {
                                    ?>
                                        <span class="product-price__from"><?php echo viPrice($minPrice);?></span>
                                        <span> - </span>
                                        <span class="product-price__to">
                                            <?php echo viPrice($maxPrice, 'VND');?>
                                        </span>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="product-freight row mt-10">
                                    <div class="product-freight__header col-3">
                                        <svg class="freight-icon svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g transform="translate(17 -1672.362)"><path fill="#f8b84e" d="m 5.37809,1692.3622 -1.381527,0 0,-0.7797 0,-3.2203 10.503969,0 0,4 -2.953792,0"/><path fill="#4bbfeb" d="m 3.996563,1682.3622 5.730587,0 4.766237,6.0198 -10.503919,-0.02 z"/><path fill="none" stroke="#2b4255" stroke-linecap="round" stroke-linejoin="round" d="m 6.000136,1689.362 1.01436,0"/><path fill="#f17f53" fill-rule="evenodd" d="m 14.500155,1691.3622 0,-1 -1.492879,0 c -0.676161,-0.01 -0.676161,1.0096 0,1 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path fill="#f8b84e" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m 4.498874,1682.3518 -0.5,0 -0.0059,5.9918 c 2.8e-5,0.2761 0.223869,0.5 0.5,0.5 l 9.504278,0.017 c 0.428638,-4e-4 0.658155,-0.5046 0.376953,-0.8281 l -4.334356,-5.5195 c -0.09444,-0.1086 -0.231088,-0.1712 -0.375,-0.1719 -2.171834,0 -5.165975,0.011 -5.165975,0.011 z m 0.5,0.9898 4.439453,0 3.455451,4.5176 -7.900763,-0.014 0.0059,-4.5039 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible"/><path fill="#f8b84e" fill-rule="evenodd" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m 7.493015,1682.8611 0,6 1,0 0,-6 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible"/><path fill="#25b39e" d="m -16.5,1684.4852 0,-5.123 20.5,0 0,13.0001 -6.1621384,0 -2.4543194,0 -7.6811982,0 -4.202344,0 0,-5.1711"/><path fill="#34485c" d="m -14.168175,1694.3623 -2.831825,0 0,-2 4.330756,0 5.8002374,0 7.01425554,0 3.99965936,0 6.1586787,0 4.696413,0 0,2 -3.295236,0 -8.9121551,0 -7.9997522,0 z"/><path fill="#576d7e" d="m 8.000016,1691.3622 a 4,4 0 0 0 -3.86914,3 l 1.30664,0 6.009766,0 0.421875,0 a 4,4 0 0 0 -3.869141,-3 z"/><circle cx="-9" cy="1696.362" r="1" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"/><g transform="translate(1 -1.5)"><circle cx="7" cy="1696.862" r="3" fill="#2b4255"/><circle cx="7" cy="1696.862" r="1" fill="#e9eded"/></g><path fill="#e9eded" d="m -16.5,1685.3652 5.332593,0 0.01467,-0.5029 0.0067,-1.5001 3.3152369,2.9919 -3.3333699,3.0083 0.0067,-1.5 -0.0099,-0.5001 -5.332593,0"/><g transform="translate(-16.5 -.5)"><path fill="#576d7e" d="m 7.500011,1691.8622 a 4,4 0 0 0 -3.86914,3 l 1.30664,0 6.009766,0 0.421875,0 a 4,4 0 0 0 -3.869141,-3 z"/><g transform="translate(.5 -1)"><circle cx="7" cy="1696.862" r="3" fill="#2b4255"/><circle cx="7" cy="1696.862" r="1" fill="#e9eded"/></g></g><path fill="#f17f53" fill-rule="evenodd" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m -16.5,1691.3622 0,-1 1.9785,0 a 0.50005,0.50005 0 1 1 0,1 l -1.9785,0 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible"/></g></svg>    
                                        <h6 class="freight-title title-sm">
                                            Vận chuyển
                                        </h6>
                                    </div>
                                    <div class="product-freight__body col-9">
                                        <div class="freight-body__row">
                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#ef5350" d="M17.564,37.251a1,1,0,0,1-1-1v-8.5a1,1,0,0,1,1-1h4.6a1,1,0,0,1,0,2h-3.6v7.5A1,1,0,0,1,17.564,37.251Z"/><path fill="#ef5350" d="M20.851 33H17.564a1 1 0 0 1 0-2h3.287a1 1 0 0 1 0 2zM30.252 37.251a.993.993 0 0 1-.679-.266l-2.917-2.7v1.963a1 1 0 0 1-2 0v-8.5a1 1 0 0 1 1-1h2.47A3.126 3.126 0 0 1 28.209 33l2.722 2.519a1 1 0 0 1-.679 1.733zM26.656 31h1.47a1.126 1.126 0 1 0 0-2.251h-1.47zM38.344 37.251h-4.6a1 1 0 0 1-1-1v-8.5a1 1 0 0 1 1-1h4.6a1 1 0 0 1 0 2h-3.6v6.5h3.6a1 1 0 0 1 0 2z"/><path fill="#ef5350" d="M36.976 33H33.748a1 1 0 1 1 0-2h3.228a1 1 0 0 1 0 2zM46.436 37.251h-4.6a1 1 0 0 1-1-1v-8.5a1 1 0 0 1 1-1h4.6a1 1 0 0 1 0 2h-3.6v6.5h3.6a1 1 0 0 1 0 2z"/><path fill="#ef5350" d="M45.067,33H41.84a1,1,0,0,1,0-2h3.227a1,1,0,1,1,0,2Z"/><path fill="#ef5350" d="M32,60.246a1,1,0,0,1-.773-.366l-5.048-6.163-7.453,2.816a1,1,0,0,1-1.341-.775l-1.28-7.864L8.24,46.614a1,1,0,0,1-.774-1.341l2.817-7.452L4.12,32.773a1,1,0,0,1,0-1.546l6.163-5.048L7.467,18.726a1,1,0,0,1,.774-1.34l7.865-1.281,1.28-7.864a1,1,0,0,1,1.341-.775l7.452,2.817L31.227,4.12a1.033,1.033,0,0,1,1.546,0l5.048,6.163,7.453-2.816a1,1,0,1,1,.707,1.871l-8.125,3.07a1,1,0,0,1-1.127-.3L32,6.332l-4.729,5.774a1,1,0,0,1-1.127.3L19.164,9.77l-1.2,7.367a1,1,0,0,1-.826.826l-7.368,1.2,2.637,6.981a1,1,0,0,1-.3,1.127L6.332,32l5.774,4.729a1,1,0,0,1,.3,1.127L9.77,44.836l7.368,1.2a1,1,0,0,1,.826.826l1.2,7.368,6.981-2.638a1,1,0,0,1,1.127.3L32,57.668l4.729-5.774a1,1,0,1,1,1.547,1.267l-5.5,6.719A1,1,0,0,1,32,60.246Z"/><path fill="#ef5350" d="M45.627,56.6a1.011,1.011,0,0,1-.354-.064l-8.124-3.071a1,1,0,0,1,.707-1.871l6.98,2.638,1.2-7.367a1,1,0,0,1,.827-.826l7.367-1.2-2.637-6.981a1,1,0,0,1,.3-1.127L57.668,32l-5.774-4.729a1,1,0,0,1-.3-1.127l2.638-6.98-7.368-1.2a1,1,0,1,1,.323-1.974l8.575,1.4a1,1,0,0,1,.774,1.341l-2.817,7.452,6.163,5.048a1,1,0,0,1,0,1.546l-6.163,5.048,2.816,7.453a1,1,0,0,1-.775,1.341L47.894,47.9l-1.28,7.864a1,1,0,0,1-.987.839Z"/></svg>
                                            <span class="freight-text">Miễn phí vận chuyển</span>
                                        </div>
                                        <p class="freight-sub-text title-sm">Khi đạt giá trị đơn hàng tối thiểu</p>    
                                        <div class="freight-body__row mt-10">
                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 82.83 83.01"><g data-name="Layer 2"><g data-name="Layer 1"><path fill="#d0d3d6" d="M60.41 77.11l-19 5-19-5L0 83.01l6.63-63.27 18.78-5.87 16 5 16-5 18.79 5.87 6.63 63.27-22.42-5.9z"/><path fill="#40b29b" d="M73.42 22.01l-16.01-5-16 5-16-5-16 5-5.99 57 18.99-5 19 5 19-5 19.01 5-6-57z"/><path fill="#40b29b" d="M22.41 74.01l-18.99 5 5.99-57 16-5-3 57z"/><path fill="#30917a" d="M41.41 79.01l-19-5 3-57 16 5v57z"/><path fill="#40b29b" d="M60.41 74.01l-19 5v-57l16-5 3 57z"/><path fill="#30917a" d="M41.67 59.59l17.74-7.74V33.01L41.67 59.59z"/><path fill="#30917a" d="M79.42 79.01l-19.01-5-3-57 16.01 5 6 57z"/><path fill="#eec64a" d="M41.42 0a23.25 23.25 0 0 0-23.26 23.25c0 12.84 20.86 36.58 23.25 36.58s23.26-23.74 23.26-36.58A23.25 23.25 0 0 0 41.42 0zm0 31.67A8.71 8.71 0 1 1 50.13 23a8.71 8.71 0 0 1-8.71 8.67z"/><path fill="#ecf0f1" d="M41.42 11.51A11.45 11.45 0 1 0 52.87 23a11.45 11.45 0 0 0-11.45-11.49zm0 20.17A8.71 8.71 0 1 1 50.13 23a8.71 8.71 0 0 1-8.71 8.67z"/></g></g></svg>
                                            <span class="freight-text">Vận chuyển đến: </span>
                        
                                            <div class="select" name="fs-select-shipping-provinces">
                                                <h4 class="select__active"></h4>
                                                <i class="fas fa-sort-down"></i>
                                                <ul class="select__list"> 
                                                </ul>
                                            </div>
                                            <div class="select" name="fs-select-shipping-districts">
                                                <h4 class="select__active"></h4>
                                                <i class="fas fa-sort-down"></i>
                                                <ul class="select__list">
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="freight-sub-text title-sm">
                                            Phí vận chuyển (tạm tính):
                                            <span id="freight-cost">
                                                30.000
                                            </span>
                                        </p>                                                        
                                    </div>
                                </div>
                                <?php
                                    foreach ($productTypeLabelList as $labelType)
                                    {
                                ?>
                                    <div class="fs-product-type product-type row mt-20">
                                        <div class="product-type__header col-3">
                                            <h6 class="fs-product-type__label title-sm">
                                                <?php echo $labelType;?>
                                            </h6>
                                        </div>
                                        <div class="product-type__body col-9">
                                            <ul class="fs-list-type list-type">
                                                <?php
                                                    foreach($productType as $type) {
                                                        if(empty($type['productTypeName'])) break;
                                                        if($type['productTypeLabel'] != $labelType) continue;
                                                ?>
                                                    <li class="list-type__item btn btn-third" 
                                                        id="<?php echo $type['productTypeId'];?>" 
                                                        price="<?php echo $type['productTypePrice'];?>"
                                                        quantity="<?php echo $type['productTypeQuantity'];?>">
                                                        <?php echo $type['productTypeName'];?>
                                                    </li>
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                                <div class="product-quantity-count row mt-20">
                                    <div class="product-quantity-count__header col-3">
                                        <h6 class="title-sm">Số lượng</h6>
                                    </div>
                                    <div class="product-quantity-count__body col-9">
                                        <div class="fs-carousel-quantity carousel-quantity">
                                            <div class="fs-carousel-quantity__minus carousel-quantity__minus">-</div>
                                            <input class="fs-carousel-quantity__number carousel-quantity__number" type="number" value="1">
                                            <div class="fs-carousel-quantity__plus carousel-quantity__plus">+</div>
                                        </div>
                                        <span class="fs-quantity-count__text product-quantity-count__text">
                                            Còn 
                                            <span class="fs-number-quantity fs-number-product-quantity number-quantity">
                                                <?php echo $product['productQuantity'];?>
                                            </span>
                                            sản phẩm
                                        </span>
                                    </div>
                                </div>
                                <div class="js-alert alert alert-danger">
                                    
                                </div>
                                <div class="product-buy mt-20">
                                    <button id="product-add-cart__btn" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 64 64"><path d="M20 64c-3.859 0-7-3.14-7-7s3.141-7 7-7 7 3.14 7 7-3.141 7-7 7zm0-12c-2.757 0-5 2.243-5 5s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5zM44 64c-3.859 0-7-3.14-7-7s3.141-7 7-7 7 3.14 7 7-3.141 7-7 7zm0-12c-2.757 0-5 2.243-5 5s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"/><path d="M26 56h12v2H26zM13.003 57.073L9.07 3H0V1h10.93l4.067 55.927z"/><path d="M13.069 43.998l-.138-1.996 42.263-2.948L61.74 11H11V9h53.26l-7.454 31.946z"/><path d="M36.707 35.707h-1.414l-8-8 1.414-1.414L36 33.586l7.293-7.293 1.414 1.414z"/><path d="M35 15h2v20h-2z"/></svg> 
                                        Thêm vào giỏ hàng
                                    </button>
                                    <button id="product-buy__btn" class="btn btn-primary">Mua ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div> 
                <div class="layout-split mt-24 p-25">
                    <?php require_once './mvc/views/block/ShopBanner.php'; ?>
                </div>
                <div class="product-desc">
                    <div class="row">
                        <div class="col-10">
                            <div class="layout-split mt-24 p-25">
                                <?php require_once './mvc/views/block/product-detail/Desc.php'; ?>
                            </div>
                            <div class="layout-split mt-24 p-25 mb-20">
                                <?php require_once './mvc/views/block/product-detail/Rating.php'; ?>
                            </div>
                        </div>
                        <?php
                        if (isset($data['productsRecommend']))
                        {
                            $productsRecommend = json_decode($data['productsRecommend'], true);
                            if (!empty($productsRecommend))
                            {
                        ?>
                        <div class="col-2">
                            <div class="layout-split mt-24">
                                <div class="suggestion">
                                <h3 class="suggestion__title title titile-sm">Sản phẩm bán chạy</h3>
                                    <div class="suggestion__list">
                                        <?php
                                            foreach ($productsRecommend as $recommend) {
                                                if($recommend['productId'] == $product['productId']) continue;
                                        ?>
                                            <a href="#" class="suggestion-list__item">
                                                <img src="<?php echo $recommend['imageProductUrl'];?>" alt="">
                                                <h3 class="title title-sm"><?php echo $recommend['productName'];?></h3>
                                                <p class="price">
                                                    <?php
                                                        if(isset($recommend['productTypePrice']))
                                                            echo viPrice($recommend['productTypePrice']);
                                                    ?>
                                                    đ
                                                </p>
                                            </a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php 
    }
}
?>