<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hevy Shop</title>
    <script type="text/javascript" src="./eCommerce/assets/js/jquery.js"></script>
    <link rel="stylesheet" href="/eCommerce/assets/css/normalize.css">
    <link rel="stylesheet" href="/eCommerce/assets/css/main.css">
    <link rel="stylesheet" href="/eCommerce/assets/css/base.css">
    <link rel="stylesheet" href="/eCommerce/assets/icon/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="webapp">
        <div class="header">
            <div class="nav">
                <ul class="nav__list">
                    <li class="nav-list__item item--separate">
                        <a href="" class="nav-list__link">Về chúng tôi</a>
                    </li>
                    <li class="nav-list__item item--separate">
                        <a href="" class="nav-list__link">Trợ giúp</a>
                    </li>
                    <li class="nav-list__item">Kết nối với
                        <a href="https://www.facebook.com" class="nav-list__link"><i class="fab fa-facebook nav-list-link__icon nav-list-link__icon--fb"></i></a>
                        <a href="instagram.com" class="nav-list__link"><i class="fab fa-instagram nav-list-link__icon"></i></a>
                    </li>
                </ul>
                <ul class="nav__list">
                    <li class="nav-list__item item--separate nav-list__item--notibar">
                        <a href="" class="nav-list__link"><i class="fas fa-bell nav-list-link__icon"></i>Thông báo</a>
                        <div class="nav-list__notify">
                            <h3 class="nav-list-notify__header">Các thông báo vừa nhận</h3>
                            <ul class="nav-list-notify__listnoti">
                                <li class="nav-list-notify-listnoti__item">
                                    <a href="" class="nav-list-notify-listnoti__link">
                                        <div class="nav-list-notify-listnoti__imgContain">
                                            <img src="/eCommerce/assets/img/giaybitas.jpg" alt="" class="nav-list-notify-listnoti__img">
                                        </div>
                                        <div class="nav-list-notify-listnoti__infor">
                                            <h4 class="nav-list-notify-listnoti__title">Khuyến mãi giày 30% cho tất cả giày Bitissssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</h4>
                                            <p class="nav-list-notify-listnoti__descrip">Chương trình khyến mãi duy nhất hôm nayyyyyyyyyyyyyyyyyyyyyy</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="nav-list-notify__footer">
                                <a href="" class="nav-list-notify-footer__link">Xem thêm</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-list__item nav-list__item--user">
                        <img src="/eCommerce/assets/img/avatar.png" alt="" class="nav-list-user__avatar">
                        <span class="nav-list-user__name">Thiên Phú</span>
                        <ul class="nav-list-user__menu">
                            <li class="nav-list-user-menu__item">
                                 <a href="" class="nav-list-user-menu__link">Tài khoản của tôi</a>
                            </li>
                            <li class="nav-list-user-menu__item">
                                <a href="" class="nav-list-user-menu__link">Địa chỉ của tôi</a>
                           </li>
                           <li class="nav-list-user-menu__item">
                                <a href="" class="nav-list-user-menu__link">Đơn mua</a>
                            </li>
                            <li class="nav-list-user-menu__item">
                                <a id="nav-list-user-menu__logout" href="" class="nav-list-user-menu__link">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li id= "nav-list__signupBtn" class="nav-list__item nav-list__item--signup">Đăng kí</li>
                    <li id= "nav-list__signinBtn" class="nav-list__item nav-list__item--login">Đăng nhập</li> -->
                </ul>
            </div>
            <div class="searchbar">
                <div class="searchbar__logoBox">
                    <a href="#"><img src="/eCommerce/assets/img/mainlogo.PNG" alt="Main Logo" class="searchbar-logoBox__img"></a>
                </div>
                <div class="searchbar__component">
                    <div class="searchbar__searchInput">
                        <input type="text" class="searchbar-searchInput__text" placeholder="Bạn cần tìm gì ?">
                        <div class="searchbar-searchInput__btn">
                          <i class="fas fa-search searchbar-searchInput-btn__icon"></i>
                        </div>
                    </div> 
                    <div class="searchbar__history">
                            <h3 class="searchbar-history__header">
                                Lịch sử tìm kiếm
                            </h3>
                            <ul class="searchbar-history__list">
                                <li class="searchbar-history-list__item">
                                    <a href="" class="">Ố cứng dung lượng 32gb</a> 
                                </li>
                                <li class="searchbar-history-list__item">
                                    <a href="" class="">Durex invisible</a> 
                                </li>
                            </ul>
                    </div>
                </div>
                <div class="searchbar__cart">
                    <i class="fas fa-shopping-cart searchbar-cart__icon"></i>
                    <span class="searchbar-cart__AmountProduct">0</span>
                    <!-- If cart empty add class:searchbar-cart__component--emptyCart -->
                    <div class="searchbar-cart__component searchbar-cart__component--emptyCart">
                        <!-- Empty Cart -->
                        <!-- <img class="searchbar-cart-component__EmptyImg" src="/eCommerce/assets/img/emptycart.png" alt="Empty Cart" >
                        <p class="searchbar-cart-component__EmptyNote">
                            Giỏ hàng của bạn đang trống
                            <i class="far fa-frown fa-frown--position"></i>
                        </p> -->
                        <!-- Cart has item -->
                        <h3 class="searchbar-cart__header">Sản phẩm đã thêm</h3>
                        <ul id="cartItemList" class="searchbar-cart__list">
                            <li class="searchbar-cart-list__item">
                                <div class="searchbar-cart-list-item_imgContain">
                                    <img class="searchbar-cart-list-item__img" src="/eCommerce/assets/img/giaybitas.jpg" alt="">
                                </div>
                                <div class="searchbar-cart-list-item__infor">
                                    <div class="searchbar-cart-list-item-infor__header">
                                        <span class="searchbar-cart-list-item__title">Giày Bitas Street Hunter</span>
                                        <span class="searchbar-cart-list-item__price">Giá: 200.000VND</span>
                                        <span class="searchbar-cart-list-item__count">x 2</span>
                                    </div>
                                    <div class="searchbar-cart-list-item-infor__body">
                                        <span class="searchbar-cart-list-item__typeOfProduct">Phân loại hàng: Size 42</span>
                                        <input class="searchbar-cart-list-item__deleteProduct" type="button" value="Xoá">
                                    </div>
                                </div>
                            </li>
                            <li class="searchbar-cart-list__item">
                                <div class="searchbar-cart-list-item_imgContain">
                                    <img class="searchbar-cart-list-item__img" src="/eCommerce/assets/img/giaybitas.jpg" alt="">
                                </div>
                                <div class="searchbar-cart-list-item__infor">
                                    <div class="searchbar-cart-list-item-infor__header">
                                        <span class="searchbar-cart-list-item__title">Giày Bitas Street Hunter</span>
                                        <span class="searchbar-cart-list-item__price">Giá: 200.000VND</span>
                                        <span class="searchbar-cart-list-item__count">x 2</span>
                                    </div>
                                    <div class="searchbar-cart-list-item-infor__body">
                                        <span class="searchbar-cart-list-item__typeOfProduct">Phân loại hàng: Size 42</span>
                                        <input class="searchbar-cart-list-item__deleteProduct" type="button" value="Xoá">
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="searchbar-cart__footer">
                            <button class="btn btn--primary searchbar-cart-footer-btn">
                                Xem giỏ hàng
                            </button>
                        </div>    
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="grid">
                <div class="grid__row grid__row--alignment">
                    <div class="grid__column-2">
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
                    <div class="grid__column-10">
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
                            <div id= "product_listItem" class="grid__row">
                                <div class="grid__column-10-2">
                                    <a href="" class="product__item">
                                        <div class="product-item__img" style="background-image: url(/eCommerce/assets/img/tinhchat.png);"></div>
                                        <h4 class="product-item__name">Tinh chất dưỡng da sffweweiofjwiefjwoefwoeifjwoisdfsdfsdfdsfsdefjwoifjwoiefjweoifj</h4>
                                        <div class="product-item__priceBox">
                                            <span class="product-item-priceBox__old">200.000000đ</span>
                                            <span class="product-item-priceBox__new">2500.0000đ</span>
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
                                            <span class="product-item-react__sold">10 đã bán</span>
                                        </div>
                                        <div class="product-item__origin">
                                            <span class="product-item-origin__brand">Whoo</span>
                                            <span class="product-item-origin__originName">Nhật Bản</span>
                                        </div>
                                        <div class="product-item__favourite">
                                            <i class="fas fa-check"></i>Yêu thích
                                        </div>
                                        <div class="product-item__saleOff">
                                            <span class="product-item-saleOff__percent">10%</span>
                                            <span class="product-item-saleOff__label">GIẢM</span>
                                        </div>
                                    </a>
                                </div>
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
        </div>
        <div class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-10-2">
                        <h3 class="footer__heading">Giới thiệu</h3>
                        <ul class="footer__list">
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Chúng tôi là ai</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Sứ mệnh của chúng tôi</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Phạm vi hoạt động</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Tuyển dụng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-10-2">
                        <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                        <ul class="footer__list">
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Trung tâm trợ giúp</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Hướng dẫn mua hàng</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Góp ý</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-10-2">
                        <h3 class="footer__heading">Điều khoản sử dụng</h3>
                        <ul class="footer__list">
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Chính sách bảo mật</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Chính sách vận chuyển</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Chính sách mua và trả hàng</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">Quy chế hoạt động</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-10-2">
                        <h3 class="footer__heading">Liên hệ chúng tôi</h3>
                        <ul class="footer__list">
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">
                                    Trên Facebook <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">
                                    Trên instagram <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">
                                    Twitter <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-10-2">
                        <h3 class="footer__heading">Vào của hàng trên ứng dụng</h3>
                        <ul class="footer__list">
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">
                                    App Store <i class="fab fa-app-store"></i>
                                </a>
                            </li>
                            <li class="footer-list__item">
                                <a href="" class="footer-list_link">
                                    Google Play <i class="fab fa-google-play"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="grid-row">
                    <h4 class="footer__text">
                        Bản quyền  thuộc về Nguyễn Hữu Thiên Phú B1805805
                    </h4>
                </div>
            </div>
        </div>
        <!-- modal login and signup -->
        <div id="modal" name="modal" class="modal">
            <div name="modal__overlay" class="modal__overlay" onclick="">
            </div>
            <div id="modal__body" name="modal__body" class="modal__body">
                <div id="modal-body__signup" name="modal-body__signup" class="modal-body__auth" role="dialog">
                    <div class="auth-header">
                        <h3 class="auth-header__title">Đăng ký</h3>
                        <h4 href="" class="auth-header__switch">Đăng nhập</h4>
                    </div>
                    <div class="auth-body">
                        <div class="auth-body__element">
                            <input id="modal-body-signup__phoneNumber" name="auth-body__phoneNumber" type="text" class="auth-body-element__input" placeholder="Nhập số điện thoại của bạn">
                        </div>
                        <div class="auth-body__element">
                            <input id="modal-body-signup__email" name="auth-body__email" type="text" class="auth-body-element__input" placeholder="Nhập email của bạn">
                        </div>
                        <div class="auth-body__element">
                            <input id="modal-body-signup__password" name="auth-body__password" type="password" class="auth-body-element__input" placeholder="Nhập mật khẩu của bạn">
                        </div>
                        <div class="auth-body__element">
                            <input id="modal-body-signup__rePassword" name="auth-body__rePassword" type="password" class="auth-body-element__input"  placeholder="Nhập lại mật khẩu của bạn">
                        </div>
                        <div class="auth-body__element">
                            <input id="modal-body-signup__adress" name="auth-body__adress" type="text" class="auth-body-element__input"  placeholder="Nhập địa chỉ của bạn">
                        </div>
                        <div class="auth-body__element">
                            <input id="modal-body-signup__nameAccount" name="auth-body__nameAccount" type="text" class="auth-body-element__input"  placeholder="Nhập tên cho tài khoản của bạn">
                        </div>
                    
                    </div>
                    <div class="auth-policy">
                        Nếu bạn đăng kí, bạn đã đồng ý với HevyShop về <a href="" class="auth-policy__link">Điều khoản dịch vụ và chính sách bảo mật</a>
                    </div>
                    <div class="auth-controls">
                        <input type="button" name="auth-controls__back" class="auth-controls__btn btn--back" value="TRỞ LẠI" onclick="hidemodal();">
                        <input id="modal-body-signup__signupBtn" type="submit" name="auth-controls__signupBtn" class="auth-controls__btn btn--auth" value="ĐĂNG KÝ">
                    </div>
                </div>
                <div id="modal-body__signupSocial" name="modal-body__signupSocial" class="modal-body__socials">
                    <a href="" class="modal-body-socials__facebook">
                        <i class="fab fa-facebook">&nbsp</i>
                        Kết nối với Facebook
                    </a>
                    <a href="" class="modal-body-socials__google">
                        <i class="fab fa-google">&nbsp</i>
                        Kết nối với Google
                    </a>
                </div>
                <div id="modal-body__signin" name="modal-body__signin" class="modal-body__auth">
                    <div class="auth-header">
                        <h3 class="auth-header__title">Đăng nhập</h3>
                        <h4 href="" class="auth-header__switch">Đăng ký</h4>
                    </div>
                    <div class="auth-body">
                        <div class="auth-body__element">
                            <input id="modal-body-signin__account" type="text" class="auth-body-element__input" placeholder="Nhập số điện thoại hoặc email của bạn">
                        </div>
                        <div class="auth-body__element">
                            <input id="modal-body-signin__password" type="password" class="auth-body-element__input" placeholder="Nhập mật khẩu của bạn">
                        </div>
                    </div>
                    <div class="modal-body-auth__forgetPass">
                        <a href="" class="modal-body-auth-forgetPass__link"><i class="fas fa-lock-open">&nbsp</i>
                            Quên mật khẩu
                        </a>
                    </div>
                    <div class="auth-controls">
                        <input class="auth-controls__btn btn--back" type="button" value="TRỞ LẠI" onclick="hidemodal();">
                        <input id="modal-body-signin__signinBtn" class="auth-controls__btn btn--auth" type="submit" value="ĐĂNG NHẬP">
                    </div>
                </div>
                <div id="modal-body__signinSocial" name="modal-body__signinSocial" class="modal-body__socials">
                    <a href="" class="modal-body-socials__facebook">
                        <i class="fab fa-facebook">&nbsp</i>
                         Đăng nhập với Facebook
                    </a>
                    <a href="" class="modal-body-socials__google">
                        <i class="fab fa-google">&nbsp</i>
                        Đăng nhập với Google
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>