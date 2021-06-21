<div class="grid">   
    <div class="productDetail grid-row grid--alignment-top">
        <div class="grid-column-4">
             <!--the slider -->
            <div class="amazingslider-wrapper" id="amazingslider-wrapper-1" style="display:block;position:relative;margin:0px auto 116px">
                <div class="amazingslider" id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                    <ul class="amazingslider-slides" style="display:none;">
                        <li><img src="public/img/product/aokhoac.jpg" alt="aokhoac"  title="aokhoac" data-description="ao anh" />
                        </li>
                        <li><img src="public/img/product/aosomi.jpg" alt="aosomi"  title="aosomi" data-description="day la mo ta so mi anh" />
                        </li>
                        <li><img src="public/img/product/chongnang.png" alt="chongnang"  title="chongnang" data-description="ao chong nang anh" />
                        </li>
                        <li><img src="public/img/product/1200px-Logo_Dai_hoc_Can_Tho.png" alt="cloud will beat"  title="cloud will beat" data-description="video" />
                        <video preload="none" src="public/img/product/cloud%20will%20beat.mp4" ></video>
                        </li>
                        <li><img src="public/img/product/cocsac.jpg" alt="cocsac"  title="cocsac" />
                        </li>
                    </ul>
                    <ul class="amazingslider-thumbnails" style="display:none;">
                        <li><img src="public/img/product/aokhoac-tn.jpg" alt="aokhoac" title="aokhoac" /></li>
                        <li><img src="public/img/product/aosomi-tn.jpg" alt="aosomi" title="aosomi" /></li>
                        <li><img src="public/img/product/chongnang-tn.png" alt="chongnang" title="chongnang" /></li>
                        <li><img src="public/img/product/1200px-Logo_Dai_hoc_Can_Tho-tn.png" alt="cloud will beat" title="cloud will beat" /></li>
                        <li><img src="public/img/product/cocsac-tn.jpg" alt="cocsac" title="cocsac" /></li>
                    </ul>
                </div>
            </div>
            <!-- end of the slider -->
        </div>
        <div class=" grid-column-8">
            <div class="productDetail__inforBox">
                <div class="productDetail__heading">
                    <span class="productDetail-heading__favorite">Yêu thích</span>
                    <span id="productId" name="<?php echo $_SESSION['itemCodeSelected']?>" class="productDetail-heading__title"><?php echo $_SESSION['itemNameSelected'] ?></span> 
                </div>
                <div class="productDetail__rating">
                        <h3 class="productDetail-rating__number">5.0</h3>
                        <i class="productDetail-rating__star fas fa-star"></i>
                        <i class="productDetail-rating__star fas fa-star"></i>
                        <i class="productDetail-rating__star fas fa-star"></i>
                        <i class="productDetail-rating__star fas fa-star"></i>
                        <i class="productDetail-rating__star fas fa-star"></i>
                </div>
                <div class="productDetail__type">
                    <div class="productDetail-type__heading">Chọn loại hàng</div>
                    <div class="productDetail-type__list">
                        <?php
                            $index=$_SESSION['kindNum']-1;
                            while($index>0){
                                echo '<input type="radio" name="productKind" class="productDetail-type-list__item" value="'.$_SESSION['itemKindCodeSelected'.$index."'"].'">'.$_SESSION['itemKindSelected'.$index."'"].'<br>';
                                --$index;
                            }
                        ?>
                        <!-- <li class="productDetail-type-list__item">Size 12</li>
                        <li class="productDetail-type-list__item">Size 11</li>
                        <li class="productDetail-type-list__item">Size 10</li> -->
                    </div>
                </div>
                <div class="productDetail__count">
                    <h4 class="productDetail-count__title">Số lượng</h4>
                    <div class="productDetail-count__body">
                        <button class="productDetail-count-body__decrease">-</button>
                        <input id="productCount" type="text" class="productDetail-count-body__Num" value="1">
                        <button class="productDetail-count-body__increase">+</button>
                        <h4 class="productDetail-count-body__numValid"><?php echo $_SESSION['itemCountSelected']?> sản phẩm có sẵn</h4>
                    </div>
                </div>
                <div class="productDetail__buyBtn">
                    <button id="addToCartBtn" class="btn productDetail-buyBtn__addCart"><i class="fas fa-shopping-cat"></i> Thêm vào giỏ hàng</button>
                    <!-- <button id="buyNowBtn" class="btn btn--primary productDetail-buyBtn__buyNow">Mua ngay</button> -->
                </div>
            </div>
        </div>
    </div>  
</div>