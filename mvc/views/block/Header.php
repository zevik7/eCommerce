<div class="grid">
    <div class="nav">
        <ul class="nav__list">
            <li class="nav-list__item item--separate">
                <a href="" class="nav-list__link">Về chúng tôi</a>
            </li>
            <li class="nav-list__item item--separate">
                <a href="" class="nav-list__link">Trợ giúp</a>
            </li>
            <li class="nav-list__item">Kết nối với
                <a href="#" class="nav-list__link"><i class="fab fa-facebook"></i></a>
                <a href="#" class="nav-list__link"><i class="fab fa-instagram"></i></a>
            </li>
        </ul>
        <ul class="nav__list">
            <li class="nav-list__item item--separate nav-list__noti-button">
                <a href="#" class="nav-list__link"> 
                    <i class="fas fa-bell"></i> Thông báo
                </a>
                <div class="nav-noti">
                    <h3 class="nav-noti__title-main title-sm">Các thông báo vừa nhận</h3>
                    <ul class="nav-noti__list">
                        <li class="nav-noti__item">
                            <a href="" class="nav-noti__link">
                                <img class="nav-noti__img" src="public/img/product/giaybitas.jpg" alt="" >
                                <div class="nav-noti__infor">
                                    <h4 class="nav-noti__title">Khuyến mãi giày 30% cho tất cả giày Bitis Khuyến mãi giày 30% cho tất cả giày Bitis Khuyến mãi giày 30% cho tất cả giày Bitis< Khuyến mãi giày 30% cho tất cả giày Bitis</h4>
                                    <p class="nav-noti__descrip">Chương trình khyến mãi duy nhất hôm nayyyyyyyyyyyyyyyyyyyyyy</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="nav-noti__footer">
                        <a href="#" class="more title-sm">Xem thêm</a>
                    </div>
                </div>
            </li>
            
            <?php 
                if (isset($_SESSION['user'])):
            ?>
                <li class="nav-list__item nav-user">
                    <img src="<?php echo $_SESSION['user']['avatar'];?>" 
                        alt="" class="nav-user__avatar">
                    <span class="nav-user__name"><?php echo $_SESSION['user']['name'];?></span>
                    <ul class="nav-user__menu">
                        <li class="nav-user-menu__item">
                                <a href="./Personal/Auth" class="nav-user-menu__link">Tài khoản</a>
                        </li>
                        <li class="nav-user-menu__item">
                            <a href="" class="nav-user-menu__link">Địa chỉ</a>
                        </li>
                        <li class="nav-user-menu__item">
                            <a href="" class="nav-user-menu__link">Đơn mua</a>
                        </li>
                        <li class="nav-user-menu__item">
                            <a id="nav-user-menu__logout" href="./Signin/Logout" class="nav-user-menu__link">Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            <?php
                else:
            ?>
                <li id= "nav-list__signupBtn" class="js-show-signup nav-list__item nav-list__signup-btn">Đăng kí</li>
                <li id= "nav-list__signinBtn" class="js-show-signin nav-list__item nav-list__signin-btn">Đăng nhập</li>
            <?php
                endif;
            ?>
        </ul>
    </div>
    <div class="head-bar">
        <div class="head-bar__logo">
            <a href="#">
                <img class="head-bar-logoBox__img" src="public/img/system/mainlogo.PNG" alt="Main Logo">
            </a>
        </div>
        <div class="head-bar__search">
            <div class="head-search">
                <form method="GET"  class="js-head-search__form">
                    <input type="search" name="search" class="head-search__text input js-head-search__text" 
                    oninvalid="this.setCustomValidity(' ')"
                    oninput="setCustomValidity('')"
                    autocomplete="off"
                    required placeholder="Bạn cần tìm gì ?"
                    value="<?php if(isset($_GET['search'])) echo $_GET['search']?>">
                    <span class="underline"></span>
                    <button type="submit" class="head-search__btn btn btn-primary js-head-search__btn btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button> 
                </form>
                <div class="head-history">
                    <div class="head-history__header js-head-history__header">
                        <h5 class="head-history__title title-sm">Lịch sử tìm kiếm</h5>
                        <div class="head-history__delete-btn">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    
                    <ul class="head-history__list js-head-history__list">
                    </ul>
                </div>
            </div> 
            
        </div>
        <div class="head-bar__cart">
            <div class="head-cart">
                <div class="head-cart__icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="head-cart__quantity">0</span>
                </div>
                <div class="head-cart__box">
                    <h3 class="head-cart__title title">Sản phẩm đã thêm</h3>
                    <!-- Empty Cart -->
                    <div class="head-cart__empty">
                        <img class ="title-sm" src="public/img/system/emptycart.png" alt="Empty Cart" >
                        <p>
                            Giỏ hàng của bạn đang trống
                        </p>
                    </div>
                    <!-- Cart has item -->
                    <!-- 
                    <ul id="cartItemList" class="head-cart__list">
                        <li class="head-cart__item">
                            <div class="item-img">
                                <img src="public/img/product/giaybitas.jpg" alt="">
                            </div>
                            <div class="item-info">
                                <div class="item-info__header">
                                    <h5 class="item-info__title title-sm">Giày Bitas Street Hunter iày Bitas Street Hu iày Bitas Street Hu</h5>
                                    <span class="item-info__price">Giá: 200.000VND</span>
                                    <span class="item-info__quantity">x 2</span>
                                </div>
                                <div class="item-info__body">
                                    <span class="item-info__type">Phân loại hàng: Size 42</span>
                                    <input class="item-delete btn btn-second" type="button" value="Xoá">
                                </div>
                            </div>
                        </li>
                        <li class="head-cart__item">
                            <div class="item-img">
                                <img src="public/img/product/giaybitas.jpg" alt="">
                            </div>
                            <div class="item-info">
                                <div class="item-info__header">
                                    <h5 class="item-info__title title-sm">Giày Bitas Street Hunter iày Bitas Street Hu iày Bitas Street Hu</h5>
                                    <span class="item-info__price">Giá: 200.000VND</span>
                                    <span class="item-info__quantity">x 2</span>
                                </div>
                                <div class="item-info__body">
                                    <span class="item-info__type">Phân loại hàng: Size 42</span>
                                    <input class="item-delete btn btn-second" type="button" value="Xoá">
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="head-cart__footer">
                        <a href="#" class="title-sm">
                            Xem giỏ hàng
                        </a>
                    </div>     -->
                </div>
            </div>
        </div>
    </div>
</div>
