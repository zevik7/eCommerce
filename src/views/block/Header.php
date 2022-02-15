<div class="grid wide">
    <div class="nav hide-on-mobile">
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
                    <h3 class="nav-noti__title-main title-reset">Các thông báo vừa nhận</h3>
                    <ul class="nav-noti__list">
                        <li class="nav-noti__item">
                            <a href="" class="nav-noti__link">
                                <img class="nav-noti__img" src="/img/giaybitas.jpg" alt="" >
                                <div class="nav-noti__infor">
                                    <h4 class="nav-noti__title">Khuyến mãi giày 30% cho tất cả giày Bitis Khuyến mãi giày 30% cho tất cả giày Bitis Khuyến mãi giày 30% cho tất cả giày Bitis< Khuyến mãi giày 30% cho tất cả giày Bitis</h4>
                                    <p class="nav-noti__descrip">Chương trình khyến mãi duy nhất hôm nayyyyyyyyyyyyyyyyyyyyyy</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="nav-noti__footer">
                        <a href="#" class="more title-reset">Xem thêm</a>
                    </div>
                </div>
            </li>
            
            <?php
                if (isset($_SESSION['user'])):
            ?>
                <li class="nav-list__item nav-user">
                    <img src="<?= $_SESSION['user']['avatar'];?>" 
                        alt="" class="nav-user__avatar">
                    <span class="nav-user__name"><?= $_SESSION['user']['name'];?></span>
                    <ul class="nav-user__menu">
                        <li class="nav-user-menu__item">
                            <a id="nav-user-menu__account" href="./Personal/Auth" class="nav-user-menu__link">Tài khoản</a>
                        </li>
                        <li class="nav-user-menu__item">
                            <a id="nav-user-menu__address" href="./Personal/Auth" class="nav-user-menu__link">Địa chỉ</a>
                        </li>
                        <li class="nav-user-menu__item">
                            <a href="./Personal/purchase" class="nav-user-menu__link nav-user-menu__purchase">Đơn mua</a>
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
        <div class="head-bar__logo hide-on-mobile-tablet">
            <a href="#">
                <img class="head-bar-logoBox__img" src="/img/system/mainlogo.PNG" alt="Main Logo">
            </a>
        </div>
        <div class="head-bar__search">
            <div class="head-search">
                <form method="GET"  class="js-head-search__form" action="./ProductList/load">
                    <input type="search" name="search" class="head-search__text input js-head-search__text" 
                    oninvalid="this.setCustomValidity(' ')"
                    oninput="setCustomValidity('')"
                    autocomplete="off"
                    required placeholder="Bạn cần tìm gì ?"
                    value="<?php if (isset($_GET['search'])) {
                echo $_GET['search'];
            }?>">
                    <span class="underline"></span>
                    <button type="submit" class="head-search__btn btn btn-primary js-head-search__btn btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button> 
                </form>
                <div class="head-history">
                    <div class="head-history__header js-head-history__header">
                        <h5 class="head-history__title title-reset">Lịch sử tìm kiếm</h5>
                        <div class="head-history__delete-btn">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    
                    <ul class="head-history__list js-head-history__list">
                    </ul>
                </div>
            </div> 
            
        </div>
        <?php
            // Cart block
            require_once '../src/views/block/header/Cart.php';
        ?>
    </div>
</div>
