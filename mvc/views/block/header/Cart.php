<?php
    // Load cart data
    if (isset($data['cart']))
    {
        // var_dump($_SESSION['user']);
        // $cartData = json_decode($data['cart']);
    }
?>
<div class="head-bar__cart">
    <div class="head-cart">
        <div class="head-cart__icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="head-cart__quantity">0</span>
        </div>
        <div class="head-cart__box">
            <h3 class="head-cart__title title">Sản phẩm đã thêm</h3>
            <!-- Empty Cart -->
            <!-- <div class="head-cart__empty">
                <img class ="title-sm" src="public/img/system/emptycart.png" alt="Empty Cart" >
                <p>
                    Giỏ hàng của bạn đang trống
                </p>
            </div> -->
            <!-- Cart has item -->
            
            <ul id="cart-list" class="head-cart__list">
                <!-- Load cart item -->
            </ul>
            <div class="head-cart__pay-btn">
                <a href="#" class="title-sm">
                    Thanh toán
                </a>
            </div>    
        </div>
    </div>
</div>