<div class="head-bar__cart">
    <div class="head-cart">
        <div class="head-cart__icon">
            <i class="fas fa-shopping-cart"></i>
            <input class="head-cart__quantity" type="number" disabled
            value="<?php
                if (isset($data['cart'])){
                    $cartData = json_decode($data['cart'], true);
                    echo count($cartData);
                }
                else echo 0;
            ?>">
        </div>
        <div class="head-cart__box">
            <h3 class="head-cart__title title-reset">Sản phẩm đã thêm</h3>
            <?php
                // Load cart data
                if (isset($cartData)) 
                {
            ?>
                <!-- Cart has item -->
                <ul id="cart-list" class="head-cart__list">
                    <?php
                        foreach ($cartData as $key => $value) {
                    ?>
                        <li class="head-cart__item">
                            <div class="item-img">
                                <img src="<?php echo $value['imageUrl'];?>" alt="">
                            </div>
                            <div class="item-info">
                                <div class="item-info__header">
                                    <h5 class="item-info__title title-reset">
                                        <?php echo $value['productName'];?>
                                    </h5>
                                    <span class="item-info__price">
                                        Giá: 
                                        <?php 
                                            echo viPrice($value['productTypePrice'] * (1 - $value['productDiscount']), 'VND');
                                        ?>
                                    </span>
                                    <span class="item-info__quantity">
                                        x <?php echo $value['cartQuantity'];?>
                                    </span>
                                </div>
                                <div class="item-info__body">
                                    <span class="item-info__type">
                                        Phân loại hàng: <?php echo $value['productTypeName'];?>
                                    </span>
                                    <input data-id=<?php echo $value['cartId'];?> class="item-delete btn btn-third" type="button" value="Xoá">
                                </div>
                            </div>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="head-cart__pay-btn">
                    <a href="./order" class="title-reset">
                        Thanh toán
                    </a>
                </div>    
            <?php
                }
                else {
            ?>
                <!-- Empty Cart -->
                <div class="head-cart__empty">
                    <img class ="title-reset" src="public/img/system/emptycart.png" alt="Empty Cart" >
                    <p>
                        Giỏ hàng của bạn đang trống
                    </p>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>