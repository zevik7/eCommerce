<div class="searchbar">
    <div class="searchbar__logoBox">
        <a href="#"><img src="public/img/system/mainlogo.PNG" alt="Main Logo" class="searchbar-logoBox__img"></a>
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