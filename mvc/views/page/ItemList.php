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
                            <!-- <i class="fas fa-chevron-right"></i> -->
                            <span> Thời trang</span>
                        </a>
                    </li>
                    <li>
                        <a class="category-bar__item" href="#"> 
                            <!-- <i class="fas fa-chevron-right"></i> -->
                            <span> Đồ công nghệ</span>
                        </a>
                    </li>
                    <li>
                        <a class="category-bar__item" href="#"> 
                            <!-- <i class="fas fa-chevron-right"></i> -->
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
                    <li class="filter__item active">Phổ biến</li>
                    <li class="filter__item">Mới nhất</li>
                    <li class="filter__item">Bán chạy</li>
                    <li class="filter__item filter__item-select">
                        <div class="select">
                            <h4 class="select__title">
                                Giá 
                            </h4>
                            <i class="fas fa-sort-down"></i>
                            <ul class="select__list">
                                <li>Từ thấp đến cao</li>
                                <li>Từ cao đến thấp</li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="filter__switch">
                    <span id="filter-switch__current" class="">
                       1
                    </span>
                    <span>/</span>
                    <span id="filter-switch__total">
                        14
                    </span>
                    <div class="filter-switch__control">
                        <a href="#" class="disabled">
                            <i class="fas fa-angle-left"></i>
                        </a>
                        <a href="#" class="">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="product">
                <div id= "product_list" class="row">
                    <?php
                            // if (isset($data['Product']))
                            // {
                            //     $decode = json_decode($data['Product'], true);
                            //     foreach($decode as $value)
                            //     {
                    ?>
                    <div class="col-10-2">
                        <a href="./Item" class="product__item mt-10">
                            <div class="product-item__img" style="background-image: url(public/img/product/tinhchat.png);"></div>
                            <div class="product-item__content">
                                <h4 class="product-item__name">Tinh chất thiên nhiên ngon từ thịt ngọt từ xương</h4>
                                <div class="product-item__price">
                                    <span class="price-original">134200000</span>
                                    <span class="price-sale">98200000</span>
                                </div>
                                <div class="product-item__react">
                                    <!-- add product-item-react__like--liked when click icon like  -->
                                    <!-- <span class="product-item-react__like">
                                        <i class="far fa-heart product-item-react-like__iconEmpty"></i>
                                        <i class="fas fa-heart product-item-react-like__iconClicked"></i>
                                    </span> -->
                                    <div class="product-item__rating">
                                        <i class="product-item-reat-rating__fill fas fa-star"></i>
                                        <i class="product-item-reat-rating__fill fas fa-star"></i>
                                        <i class="product-item-reat-rating__fill fas fa-star"></i>
                                        <i class="product-item-reat-rating__fill fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="product-item__sold">
                                        <span class="sold-number">123</span>
                                         đã bán
                                    </span>
                                </div>
                                <div class="product-item__origin">
                                    <span class="item-brand">Ohhui</span>
                                    <span class="item-source">Nhật bản</span>
                                </div>
                                <!-- Item label -->
                                <div class="product-item__favourite">
                                    <i class="fas fa-check"></i>Yêu thích
                                </div>
                                <div class="product-item__discount">
                                    <span class="percent">12%</span>
                                    <span class="label">GIẢM</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                            //     }
                            // }
                    ?>
                </div>
            </div>
            <ul class="pagination">
                <li class="pagination__item">
                    <a href="" class="pagination__link disabled">
                        <i class="pagination-link__icon fas fa-angle-left"></i>
                    </a>
                </li>
                <li class="pagination__item">
                    <a href="" class="pagination__link active">1</a>
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
                    <a href="" class="pagination__link disabled">
                        <i class="pagination-link__icon fas fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>