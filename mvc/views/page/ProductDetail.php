<?php 
    if (isset($data['productData'])){
    
    $productData = json_decode($data['productData'], true);

    $product = 
    array_key_exists('product', $productData) ? $productData['product'] : []; //One product / one row

    $productType = 
    array_key_exists('productType', $productData) ? $productData['productType'] : []; 

    $productTypeSub = 
    array_key_exists('productTypeSub', $productData) ? $productData['productTypeSub'] : []; 

    $productImage =
    array_key_exists('productImage', $productData) ? $productData['productImage'] : [];

    $productRating =
    array_key_exists('productRating', $productData) ? $productData['productRating'] : [];
    
    if (!empty($product)) // In false, not enough information to display
    {
        //Flat 1 level
        $productTypeSub = array_reduce($productTypeSub, 'array_merge', array());
        $product = array_reduce($product, 'array_merge', array());

        /*---------Parse general data--------*/

        //Min price and max price
        $minPrice = 99999999999;
        $maxPrice = -99999999999;
        $productTypePrice = array_filter(array_column($productType, 'productTypePrice'));
        $productTypeSubPrice = array_filter(array_column($productTypeSub, 'productTypeSubPrice'));
        if (!empty($productTypePrice))
        {
            $minPrice = min($productTypePrice);
            $maxPrice = max($productTypePrice);
        }
        if (!empty($productTypeSubPrice))
        {
            $minPrice = $minPrice > min($productTypeSubPrice) ? min($productTypeSubPrice) : $minPrice;
            $maxPrice = $maxPrice < max($productTypeSubPrice) ? max($productTypeSubPrice) : $maxPrice;
        }

        // Product total quantity
        $productTotalQuantity = array_sum(array_column($productType, 'productTypeQuantity'));

        // Product type label quantity
        $productTypeLabelList = array_unique(array_column($productType, 'productTypeLabelName'));
        var_dump($productTypeLabelList);

        // Product typeSubName List
        $productTypeSubNameList = array_unique(array_column($productTypeSub, 'productTypeSubName'));
?>
    <div class="bg-transparent">
        <div class="grid pt-20">
            <div class="product-page">
                <div class="product-detail">
                    <div class="row">
                        <div class="col-5">
                            <div class="product-detail__carousel">
                                <!--Carousel -->
                                <div class="amazingslider-wrapper" id="amazingslider-wrapper-1" style="display:block;position:relative;margin:0px auto 116px">
                                    <div class="amazingslider" id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                                        <ul class="amazingslider-slides" style="display:none;">
                                            <?php
                                                foreach ($productImage as $value)
                                                {
                                            ?>
                                                <li>
                                                    <img src="<?php echo $value['imageProductUrl'];?>" alt=""  title="" data-description="" />
                                                </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                        <ul class="amazingslider-thumbnails" style="display:none;">
                                            <?php
                                                foreach ($productImage as $value)
                                                {
                                            ?>
                                                <li>
                                                    <img src="<?php echo $value['imageProductUrl'];?>" alt=""  title=""/>
                                                </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
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
                                                $starValue = $product['productRating'];
                                                $starCount = 0;
                                                while ($starCount < 5)
                                                {
                                                    if ($starValue > 0)
                                                    {
                                                        if ($starValue >= 1) echo '<i class="fas fa-star"></i>';
                                                        else echo '<i class="fas fa-star-half-alt"></i>';
                                                        $starValue--;
                                                    }
                                                    else{
                                                        echo '<i class="far fa-star"></i>';
                                                    }
                                                    $starCount++;
                                                }
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
                                <div class="product-price mt-10">
                                    <?php
                                        if ($minPrice==$maxPrice){
                                    ?>
                                        <span class="product-price__from"><?php echo number_format($minPrice);?></span>
                                    <?php
                                        } else {
                                    ?>
                                        <span class="product-price__from"><?php echo number_format($minPrice);?></span>
                                        -
                                        <span class="product-price__to"><?php echo number_format($maxPrice);?> đ</span>
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
                                <div class="product-type row mt-20">
                                    <div class="product-type__header col-3">
                                        <h6 class="title-sm"><?php echo $labelType;?></h6>
                                    </div>
                                    <div class="product-type__body col-9">
                                        <ul class="list-type">
                                            <?php
                                                foreach($productType as $type) {
                                                    if(empty($type['productTypeName'])) break;
                                                    if($type['productTypeLabelName'] != $labelType) continue;
                                            ?>
                                                <li class="list-type__item btn btn-third" 
                                                    id="<?php echo $type['productTypeId'];?>" 
                                                    price="<?php echo $type['productTypePrice'];?>"
                                                    type-quantity="<?php echo $type['productTypeQuantity'];?>"> 
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
                                <?php
                                    if (!empty($productTypeSub))
                                    {
                                ?>
                                <div class="product-type row mt-20">
                                    <div class="product-type__header col-3">
                                        <h6 class="title-sm"><?php echo $productTypeSub[0]['productTypeLabelName'];?></h6>
                                    </div>
                                    <div class="product-type__body col-9">
                                        <ul class="list-type-display-first">
                                            <?php
                                                foreach($productTypeSubNameList as $name) {
                                            ?>
                                                <li class="list-type__item btn btn-third">
                                                    <?php echo $name;?>
                                                </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                        <ul class="list-type">
                                            <?php
                                                foreach($productTypeSub as $type) {
                                            ?>
                                                <li class="list-type__item btn btn-third" style="display:none"
                                                id="<?php echo $type['productTypeSubId'];?>" 
                                                price="<?php echo $type['productTypeSubPrice'];?>"
                                                typesub-quantity="<?php echo $type['productTypeSubQuantity'];?>">
                                                    <?php echo $type['productTypeSubName'];?>
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
                                    <div class="carousel-quantity">
                                        <div class="carousel-quantity__minus">-</div>
                                            <input class="carousel-quantity__number" type="number" value="1">
                                            <div class="carousel-quantity__plus">+</div>
                                        </div>
                                        <span class="product-quantity-count__text">Còn <?php echo $productTotalQuantity;?> sản phẩm</span>
                                    </div>
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
                    <div class="shop-banner">
                        <div class="row row-al-center">
                            <div class="col-5">
                                <div class="banner-header">
                                    <img src="public/img/user/avatar.png" alt="" class="banner-header__avt">
                                    <div class="banner-header__content">
                                        <h6 class="content-title title">kaxoeofficial.vn</h6>
                                        <p class="content-date">Online 15 phút trước</p>
                                        <button class="content-btn btn btn-outline-primary">
                                            <svg class="svg-icon svg-color-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 16 16" viewBox="0 0 16 16"><g display="none"><line x1="5.5" x2="7.5" y1="3.5" y2="3.5" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"/><line x1="5.5" x2="9.5" y1="5.5" y2="5.5" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"/><line x1="5.5" x2="10.5" y1="7.5" y2="7.5" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"/><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1.5,0.5c-0.6,0-1,0.4-1,1v13l4-4h10c0.6,0,1-0.4,1-1v-8c0-0.6-0.4-1-1-1h-11"/></g><path d="M5.5 4h2C7.8 4 8 3.8 8 3.5S7.8 3 7.5 3h-2C5.2 3 5 3.2 5 3.5S5.2 4 5.5 4zM5.5 6h4C9.8 6 10 5.8 10 5.5S9.8 5 9.5 5h-4C5.2 5 5 5.2 5 5.5S5.2 6 5.5 6zM5.5 8h5C10.8 8 11 7.8 11 7.5S10.8 7 10.5 7h-5C5.2 7 5 7.2 5 7.5S5.2 8 5.5 8z"/><path d="M14.5,0h-11C3.2,0,3,0.2,3,0.5S3.2,1,3.5,1h11C14.8,1,15,1.2,15,1.5v8c0,0.3-0.2,0.5-0.5,0.5h-10c-0.1,0-0.3,0.1-0.4,0.1
                                            L1,13.3V1.5C1,1.2,1.2,1,1.5,1C1.8,1,2,0.8,2,0.5S1.8,0,1.5,0C0.7,0,0,0.7,0,1.5v13c0,0.2,0.1,0.4,0.3,0.5c0.1,0,0.1,0,0.2,0
                                            c0.1,0,0.3-0.1,0.4-0.1L4.7,11h9.8c0.8,0,1.5-0.7,1.5-1.5v-8C16,0.7,15.3,0,14.5,0z"/></svg>
                                            Chat ngay
                                        </button>
                                        <button class="content-btn btn btn-third">
                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g transform="translate(0 -1020.362)"><path style="isolation:auto;mix-blend-mode:normal" fill="#25b39e" d="m 7.513312,1033.9345 c -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 l 0,12 11,0 0,-12.209 c -0.170555,-0.065 -0.344029,-0.1264 -0.5,-0.2187 -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 z" color="#000" overflow="visible"/><path d="M4.0136719 1031.3418l0 16.4883 1 0 0-16.4883-1 0zm24.0000001 0l0 17.0195-9.285156 0 0 1 9.75 0 .03516 0a.50004997.50004997 0 0 0 .5-.5l0-17.5195-1 0zM4.9414062 1021.3613a.50005.50005 0 0 0-.4667968.3223l-3.4277344 9 .9335938.3574 3.3066406-8.6797 22.4531246 0 3.306641 8.6797.933594-.3574-3.427735-9-.46875.6777 0-1-23.1425778 0z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 1.5136719,1047.3613 a 0.50004997,0.50004997 0 0 0 -0.5,0.5 l 0,0.9375 0,2.0625 a 0.50004997,0.50004997 0 0 0 0.3457031,0.4746 0.50004997,0.50004997 0 0 0 0.048828,0.014 0.50004997,0.50004997 0 0 0 0.097656,0.012 0.50004997,0.50004997 0 0 0 0.00781,0 l 16.9648441,0 0.03516,0 a 0.50004997,0.50004997 0 0 0 0.09961,-0.01 0.50004997,0.50004997 0 0 0 0.400391,-0.4903 l 0,-3 -0.0078,0.01 a 0.50004997,0.50004997 0 0 0 -0.492187,-0.5078 l -17.0000001,0 z m 0.5,1 16.0000001,0 0,2 -16.0000001,0 0,-1.5625 0,-0.4375 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 18.519531,1048.3613 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5078 l -0.0078,-0.01 0,2 a 0.50004997,0.50004997 0 0 0 0.5,0.5 l 10.472657,0 0,-1 -9.972657,0 0,-1 9.972657,0 0,-1 -10.472657,0 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="M28.513672 1047.3613a.50005.50005 0 0 0-.5.5l0 3a.50005.50005 0 0 0 .345703.4746.50005.50005 0 0 0 .04883.014.50005.50005 0 0 0 .09766.012.50005.50005 0 0 0 .0078 0l2.964844 0 .03516 0a.50005.50005 0 0 0 .09961-.01.50005.50005 0 0 0 .400391-.4903l0-3-.0078.01a.50005.50005 0 0 0-.492187-.5078l-3 0zm.5 1l2 0 0 2-2 0 0-2zM4.4960938 1030.8418a.50004997.50004997 0 0 0-.4921876.5059l0 16.4511a.50004997.50004997 0 1 0 1 0l0-16.4511a.50004997.50004997 0 0 0-.5078124-.5059zm14.0195312 1.4473a.50004997.50004997 0 0 0-.492187.5078l0 16.0644a.50004997.50004997 0 1 0 1 0l0-16.0644a.50004997.50004997 0 0 0-.507813-.5078zM20.513672 1038.3613c-.276131 0-.499972.2239-.5.5l0 10c.000028.2761.223869.5.5.5l5.964844 0 .03516 0c.276131 0 .499972-.2239.5-.5l0-10.5246-.5.02 0 0zm.5 1l5 0 0 9-5 0z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 1.5058594,1030.3652 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5059 l 0,0.4902 c 0,1.0994 0.9006486,2 2,2 1.0993513,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373514,1 -1,1 -0.5626487,0 -1,-0.4373 -1,-1 l 0,-0.4902 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5059 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 4.5058594,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5058 c 0,1.0994 0.9006486,2 2,2 1.0993513,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373514,1 -1,1 -0.5626487,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 7.5058594,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5058 c 0,1.0994 0.9006486,2 2,2 1.0993511,0 2.0000001,-0.9006 2.0000001,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373515,1 -1.0000001,1 -0.5626487,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 10.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 13.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 16.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 19.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 22.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 25.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 31.505859,1030.3125 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5078 l 0,0.541 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 l 0,-0.541 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5078 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" fill-rule="evenodd" d="M22.013672 1042.3613l0 2 1 0 0-2-1 0zM8.5664062 1035.1387l-2 4 .8945313.4472 2-4-.8945313-.4472zM10.566406 1037.1387l-2.4999998 5 .8945313.4472 2.5000005-5-.894532-.4472z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible"/><path d="m 4.9414062,1021.3613 a 0.50005,0.50005 0 0 0 -0.4667968,0.3223 l -3.4277344,9 0.9335938,0.3574 3.3066406,-8.6797 22.4531246,0 3.306641,8.6797 0.933594,-0.3574 -3.427735,-9 -0.0059,0.01 a 0.50005,0.50005 0 0 0 -0.462891,-0.3301 l -23.1425778,0 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 1.5058594,1030.3652 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5059 l 0,0.4902 c 0,1.0994 0.9006486,2 2,2 1.0993513,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373514,1 -1,1 -0.5626487,0 -1,-0.4373 -1,-1 l 0,-0.4902 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5059 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 4.5058594,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5058 c 0,1.0994 0.9006486,2 2,2 1.0993513,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373514,1 -1,1 -0.5626487,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 7.5058594,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5058 c 0,1.0994 0.9006486,2 2,2 1.0993511,0 2.0000001,-0.9006 2.0000001,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373515,1 -1.0000001,1 -0.5626487,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 10.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 13.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 16.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 19.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 22.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 25.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 31.505859,1030.3125 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5078 l 0,0.541 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 l 0,-0.541 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5078 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path style="isolation:auto;mix-blend-mode:normal" fill="#f8b84e" d="m 5.976283,1023.3621 -2.76953,7.2695 a 1.50015,1.50015 0 0 1 1.30664,-0.7695 1.50015,1.50015 0 0 1 1.5,1.5 1.499995,1.5 0 0 1 1.5,-1.5 1.499995,1.5 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 0.002,-0.09 1.50015,1.50015 0 0 1 2.80274,-0.6445 l -2.76763,-7.2657 -21.07422,0 z m -2.92773,7.6836 -0.0352,0.094 0,0.2031 a 1.50015,1.50015 0 0 1 0.0352,-0.2969 z m 26.92968,0 a 1.50015,1.50015 0 0 1 0.03516,0.2968 l 0,-0.2031 -0.0352,-0.094 z m 0.0352,0.3164 c 0,0.034 -0.0361,0.054 -0.0371,0.088 l 0.0352,0 0.002,-0.088 z" color="#000" overflow="visible"/><path fill="#25b39e" fill-rule="evenodd" d="m 22.013312,1041.3622 0,-1 3,0 0,7 -3,0 0,-2 2,0 0,-4 z"/><path style="isolation:auto;mix-blend-mode:normal" fill="#25b39e" d="m 22.513312,1033.9345 c -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.354699,0 -0.684054,-0.088 -1,-0.209 l 0,3.209 7,0 0,-3 c -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 z" color="#000" overflow="visible"/></g></svg>
                                            Xem shop
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="banner-body">
                                    <div class="banner-body__col">
                                        <div class="banner-body__item">
                                            Đánh giá
                                            <span class="data">341</span>
                                        </div>
                                        <div class="banner-body__item">
                                            Tỉ lệ phản hồi
                                            <span class="data">98%</span>
                                        </div>
                                    </div>
                                    <div class="banner-body__col">
                                        <div class="banner-body__item">
                                            Tham gia
                                            <span class="data">12/2/2018</span>
                                        </div>
                                        <div class="banner-body__item">
                                            Sản phẩm
                                            <span class="data">423</span>
                                        </div>
                                    </div>
                                    <div class="banner-body__col">
                                        <div class="banner-body__item">
                                            Thời gian phản hồi
                                            <span class="data">1 tiếng</span>
                                        </div>
                                        <div class="banner-body__item">
                                            Người theo dõi
                                            <span class="data">4123</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-desc">
                    <div class="row">
                        <div class="col-10">
                            <div class="layout-split mt-24 p-25">
                                <div class="desc">
                                    <div class="desc__header">
                                        <h2 class="desc__title title-lg">Chi tiết sản phẩm</h2>
                                        <div class="desc__box">
                                            <div class="desc__row">
                                                <h3 class="row-title">Danh mục</h3>
                                                <p class="row-text">
                                                    <?php echo $product['productCategoryName'];?>
                                                </p>
                                            </div>
                                            <div class="desc__row">
                                                <h3 class="row-title">
                                                    Kho hàng
                                                </h3>
                                                <p class="row-text">
                                                    <?php
                                                        echo $productTotalQuantity;
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="desc__row">
                                                <h3 class="row-title">
                                                    <?php echo $product['productSendFrom'];?>
                                                </h3>
                                                <p class="row-text">Hồ Chí Minh</p>
                                            </div>
                                            <div class="desc__row">
                                                <h3 class="row-title">Thương hiệu</h3>
                                                <p class="row-text">
                                                    <?php echo $product['productBrand'];?>
                                                </p>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="desc__body">
                                        <div class="desc__title title-lg">Mô tả sản phầm</div>
                                        <div class="desc__box">
                                            <p class="desc__content">
                                                <?php echo $product['productDescription'];?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="layout-split mt-24 p-25 mb-20">
                                <div class="product-rating">
                                    <h2 class="product-rating__header title-lg">Đánh giá sản phẩm</h2>
                                    <div class="product-rating__overview">
                                        <div class="product-rating-overview__header">
                                            <h3 class="overview-title title-lg">
                                                <span class="overview-score">4.8</span>
                                                trên 5
                                            </h3>
                                            <div class="overview-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-rating-overview__body">
                                            <ul class="product-rating-overview__filter">
                                                <li class="overview-filter-item btn active">
                                                    Tất cả
                                                </li>
                                                <li class="overview-filter-item btn">
                                                    5 sao
                                                    <span class="overview-filter-item-five-star">(123)</span>
                                                </li>
                                                <li class="overview-filter-item btn">
                                                    4 sao
                                                    <span class="overview-filter-item-three-star">(234)</span>
                                                </li>
                                                <li class="overview-filter-item btn">
                                                    3 sao
                                                    <span class="overview-filter-item-four-star">(4)</span>
                                                </li>
                                                <li class="overview-filter-item btn">
                                                    2 sao
                                                    <span class="overview-filter-item-two-star">(4)</span>
                                                </li>
                                                <li class="overview-filter-item btn">
                                                    1 sao
                                                    <span class="overview-filter-item-one-star">(4)</span>
                                                </li>
                                                <li class="overview-filter-item btn">
                                                    Có hình ảnh/video
                                                    <span class="overview-filter-item-with-img-video">(34)</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-rating__body">
                                        <div class="product-rating__box mt-20">
                                            <div class="product-rating-box__header">
                                                <img src="public/img/user/avatar.png" alt="" class="user-avatar-sm">
                                            </div>
                                            <div class="product-rating-box__body">
                                                <a href="#" class="user-name-sm">Thien Phu</a>
                                                <div class="rating-product-star">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p class="rating-product-type">Phân loại hàng: size M</p>
                                                <p class="rating-product-text">
                                                    sdfffffffffffffffffffffffffffffffffffffffffffffasjdfndnasjkdhfkjasdfhajskdfhajksdhfjk
                                                </p>
                                                <p class="text-date">16/08/2021</p>
                                            </div>
                                        </div>
                                        <div class="product-rating__box mt-20">
                                            <div class="product-rating-box__header">
                                                <img src="public/img/user/avatar.png" alt="" class="user-avatar-sm">
                                            </div>
                                            <div class="product-rating-box__body">
                                                <a href="#" class="user-name-sm">Thien Phu</a>
                                                <div class="rating-product-star">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p class="rating-product-type">Phân loại hàng: size M</p>
                                                <p class="rating-product-text">
                                                    sdfffffffffffffffffffffffffffffffffffffffffffffasjdfndnasjkdhfkjasdfhajskdfhajksdhfjk
                                                </p>
                                                <p class="text-date">16/08/2021</p>
                                            </div>
                                        </div>
                                        <div class="product-rating__box mt-20">
                                            <div class="product-rating-box__header">
                                                <img src="public/img/user/avatar.png" alt="" class="user-avatar-sm">
                                            </div>
                                            <div class="product-rating-box__body">
                                                <a href="#" class="user-name-sm">Thien Phu</a>
                                                <div class="rating-product-star">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p class="rating-product-type">Phân loại hàng: size M</p>
                                                <p class="rating-product-text">
                                                    sdfffffffffffffffffffffffffffffffffffffffffffffasjdfndnasjkdhfkjasdfhajskdfhajksdhfjk
                                                </p>
                                                <p class="text-date">16/08/2021</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        echo number_format($recommend['productTypePrice']);
                                                    else echo number_format($recommend['productTypeSubPrice']);
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