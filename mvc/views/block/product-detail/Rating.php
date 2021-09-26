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
        <?php
            $starCount = [0, 0, 0, 0, 0];
            $ratingMediaCount = 0;
            if (isset($productRating)){
                $starCount[0] = 
                count(array_filter($productRating, function($element) {
                    return $element['productRatingStar'] == 1;
                }));
                $starCount[1] = 
                count(array_filter($productRating, function($element) {
                    return $element['productRatingStar'] == 2;
                }));
                $starCount[2] = 
                count(array_filter($productRating, function($element) {
                    return $element['productRatingStar'] == 3;
                }));
                $starCount[3] = 
                count(array_filter($productRating, function($element) {
                    return $element['productRatingStar'] == 4;
                }));
                $starCount[4] = 
                count(array_filter($productRating, function($element) {
                    return $element['productRatingStar'] == 5;
                }));

                $ratingMediaCount = 
                count(array_filter($productRating, function($element) {
                    return $element['productRatingType'] == 'Media';
                }));
            }
        ?>
        <div class="product-rating-overview__body">
            <ul class="product-rating-overview__filter">
                <li class="overview-filter-item btn active">
                    Tất cả
                </li>
                <li class="overview-filter-item btn">
                    5 sao
                    <span class="overview-filter-item__star-count">
                        (<?php echo $starCount[4];?>)
                    </span>
                </li>
                <li class="overview-filter-item btn">
                    4 sao
                    <span class="overview-filter-item__star-count">
                        (<?php echo $starCount[3];?>)
                    </span>
                </li>
                <li class="overview-filter-item btn">
                    3 sao
                    <span class="overview-filter-item__star-count">
                        (<?php echo $starCount[2];?>)
                    </span>
                </li>
                <li class="overview-filter-item btn">
                    2 sao
                    <span class="overview-filter-item__star-count">
                        (<?php echo $starCount[1];?>)
                    </span>
                </li>
                <li class="overview-filter-item btn">
                    1 sao
                    <span class="overview-filter-item__star-count">
                        (<?php echo $starCount[0];?>)
                    </span>
                </li>
                <li class="overview-filter-item btn">
                    Có hình ảnh/video
                    <span class="overview-filter-item__star-count">
                        (<?php echo $ratingMediaCount;?>)
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="product-rating__body">
        <?php
            if (isset($productRating))
                foreach ($productRating as $rating)
                {
        ?>
        <div class="product-rating__box mt-20">
            <div class="product-rating-box__header">
                <img src="<?php echo $rating['userAvatar'];?>" alt="" class="user-avatar-sm">
            </div>
            <div class="product-rating-box__body">
                <a href="#" class="user-name-sm">
                    <?php echo $rating['userName'];?>
                </a>
                <div class="rating-product-star">
                    <?php
                        displayStar($rating['productRatingStar']);
                    ?>
                </div>
                <p class="rating-product-type">
                    Phân loại hàng: 
                    <?php echo $rating['productTypeName'];?>
                </p>
                <p class="rating-product-text">
                    <?php echo $rating['productRatingComment'];?>
                </p>
                <p class="text-date">
                    <?php echo $rating['productRatingDate'];?>
                </p>
            </div>
        </div>
        <?php
                }
        ?>
    </div>
</div>