<div class="grid grid--alignment-top">
    <div class="grid-row">
        <div class="grid-column-2">
            <nav class="category">
                <h3 class="category__header">
                    <i class="far fa-list-alt category-header__icon"></i> Danh mục
                </h3>
                
                <ul class="category__list">
                    <li class="category-list__item category-list__item--active">
                        <a href="#" class="category-list__link">Trang điểm gì đó</a>
                    </li>
                    <li class="category-list__item category-list__item--active">
                        <a href="#" class="category-list__link">Trang điểm gì đó</a>
                    </li>
                </ul>
            </nav> 
        </div>
        <div class="grid-column-10">
            <div class="navFilter">
                <span class="navFilter__title">Sắp xếp theo</span>
                <button class="navFilter__btn btn">Phổ biến</button>
                <button class="navFilter__btn btn">Mới nhất</button>
                <button class="navFilter__btn btn btn--primary">Bán chạy</button>
                <div class="select-input">
                    <span class="navFilter__lblPrice">Giá</span>
                    <i class="navFilter__iconPrice fas fa-angle-down "></i>
                    <!-- List option -->
                    <ul class="select-input__list">
                        <li class="select-input__item">
                            <a href="" class="select-input__link">
                                Thấp đến cao
                            </a>
                        </li>
                        <li class="select-input__item">
                            <a href="" class="select-input__link">
                                Cao đến thấp                                        </a>
                        </li>                               
                    </ul>
                </div>
                <div class="navFilter__switch">
                    <span class="navFilter-switch__page">
                        <span class="navFilter-switch__pageCurrent">1</span>/14
                    </span>
                    <div class="navFilter-switch__control">
                        <a href="" class="navFilter-switch__btn navFilter-switch__btn--disabled">
                            <i class="fas fa-angle-left"></i>
                        </a>
                        <a href="" class="navFilter-switch__btn">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="product">
                <div id= "product_listItem" class="grid-row">
                    <?php
                            if (isset($data['Product']))
                            {
                                $decode = json_decode($data['Product'], true);
                                foreach($decode as $value)
                                {
                    ?>
                    <div class="grid-column-10-2">
                        <a href="./Item" class="product__item">
                            <div class="product-item__img" style="background-image: url(public/img/product/tinhchat.png);"></div>
                            <h4 class="product-item__name"><?php echo $value['productName'] ?></h4>
                            <div class="product-item__priceBox">
                                <span class="product-item-priceBox__old"></span>
                                <span class="product-item-priceBox__new"></span>
                            </div>
                            <div class="product-item__react">
                                <!-- add product-item-react__like--liked when click icon like  -->
                                <span class="product-item-react__like">
                                    <i class="far fa-heart product-item-react-like__iconEmpty"></i>
                                    <i class="fas fa-heart product-item-react-like__iconClicked"></i>
                                </span>
                                <div class="product-item-reat__rating">
                                    <i class="product-item-reat-rating__fill fas fa-star"></i>
                                    <i class="product-item-reat-rating__fill fas fa-star"></i>
                                    <i class="product-item-reat-rating__fill fas fa-star"></i>
                                    <i class="product-item-reat-rating__fill fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="product-item-react__sold"><?php echo $value['productSold']; ?> đã bán</span>
                            </div>
                            <div class="product-item__origin">
                                <span class="product-item-origin__brand"><?php echo $value['productBrand']; ?></span>
                                <span class="product-item-origin__originName"><?php echo $value['productSource']; ?></span>
                            </div>
                            <div class="product-item__favourite">
                                <i class="fas fa-check"></i>Yêu thích
                            </div>
                            <div class="product-item__saleOff">
                                <span class="product-item-saleOff__percent"><?php echo $value['productDiscount']*100; ?>%</span>
                                <span class="product-item-saleOff__label">GIẢM</span>
                            </div>
                        </a>
                    </div>
                    <?php
                                }
                            }
                    ?>
                </div>
            </div>
            <ul class="pagination pagination--home">
                <li class="pagination__item">
                    <a href="" class="pagination__link">
                        <i class="pagination-link__icon fas fa-angle-left"></i>
                    </a>
                </li>
                <li class="pagination__item pagination__item--active">
                    <a href="" class="pagination__link">1</a>
                </li>
                <li class="pagination__item">
                    <a href="" class="pagination__link">2</a>
                </li>
                <li class="pagination__item">
                    <a href="" class="pagination__link">3</a>
                </li>
                <li class="pagination__item">
                    <a href="" class="pagination__link">4</a>
                </li>
                <li class="pagination__item">
                    <a href="" class="pagination__link">5</a>
                </li>
                <li class="pagination__item">
                    <a href="" class="pagination__link">6</a>
                </li>
                <li class="pagination__item">
                    <a href="" class="pagination__link">...</a>
                </li>
                <li class="pagination__item">
                    <a href="" class="pagination__link">20</a>
                </li>
                <li class="pagination__item">
                    <a href="" class="pagination__link">
                        <i class="pagination-link__icon fas fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>