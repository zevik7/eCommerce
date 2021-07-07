<div class="grid pt-20">
    <div class="row">
        <div class="col-2">
            <nav class="category-bar">
                <h3 class="category-bar__title title">
                    <i class="far fa-list-alt category-header__icon"></i> Danh mục hàng
                </h3>
                
                <ul class="category-bar__list">
                    <li>
                        <a class="category-bar__item category-bar__item--active" href="#"> 
                            <i class="fas fa-chevron-right"></i>
                            <span> Thời trang</span>
                        </a>
                    </li>
                    <li>
                        <a class="category-bar__item" href="#"> 
                            <i class="fas fa-chevron-right"></i>
                            <span> Đồ công nghệ</span>
                        </a>
                    </li>
                    <li>
                        <a class="category-bar__item" href="#"> 
                            <i class="fas fa-chevron-right"></i>
                            <span> sách</span>
                        </a>
                    </li>
                </ul>
            </nav> 
        </div>
        <div class="col-10">
            <div class="filter">
                <span class="filter__title title-sm">Sắp xếp theo</span>
                <ul class="filter__list">
                    <li class="filter__item filter__item--active">Phổ biến</li>
                    <li class="filter__item">Mới nhất</li>
                    <li class="filter__item">Bán chạy</li>
                    <li class="filter__item">
                        <div class="select">
                            <span>Giá</span>
                            <ul>
                                <li>Item 1</li>
                                <li>Item 2</li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="filter__switch">
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
                <div id= "product_listItem" class="row">
                    <?php
                            if (isset($data['Product']))
                            {
                                $decode = json_decode($data['Product'], true);
                                foreach($decode as $value)
                                {
                    ?>
                    <div class="col-10-2">
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