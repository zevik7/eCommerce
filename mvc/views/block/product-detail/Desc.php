<div class="desc">
    <div class="desc__header">
        <h2 class="desc__title title-reset">Chi tiết sản phẩm</h2>
        <div class="desc__box">
            <div class="desc__row">
                <h3 class="row-title">Danh mục</h3>
                <p class="row-text">
                    <?php echo $product['productCategoryName'];?>
                </p>
            </div>
            <div class="desc__row">
                <h3 class="row-title">
                    Kho hàng
                </h3>
                <p class="row-text">
                    <?php
                        echo $product['productQuantity'];
                    ?>
                </p>
            </div>
            <div class="desc__row">
                <h3 class="row-title">
                    <?php echo $product['productSendFrom'];?>
                </h3>
                <p class="row-text">Hồ Chí Minh</p>
            </div>
            <div class="desc__row">
                <h3 class="row-title">Thương hiệu</h3>
                <p class="row-text">
                    <?php echo $product['productBrand'];?>
                </p>
            </div>
        </div> 
    </div>
    <div class="desc__body">
        <div class="desc__title">Mô tả sản phầm</div>
        <div class="desc__box">
            <p class="desc__content">
                <?php echo $product['productDescription'];?>
            </p>
        </div>
    </div>
</div>