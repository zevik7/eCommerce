<div class="order-success">
    <div class="grid">
        <div class="order-success__header">
            <h1 class="order-success__title title-reset">
                Đặt hàng thành công 
            </h1>
        </div>
    </div>
    <div class="bg-transparent">
        <div class="grid wide">
            <div class="order-success__body">
                <div class="layout-split">
                    <div class="letter-line">
                    </div>
                    <div class="order-success__info">
                        <h2 class="order-success-body__title title-reset">
                            Đơn hàng đã được đặt thành công
                        </h2>
                        <p class="order-success-body__status">
                            Theo dõi trạng thái đơn hàng tại Tài khoản > Đơn mua
                        </p>
                        <p class="order-success-body__status">
                            Mã số đơn hàng của bạn là: 
                            <?php if (isset($_COOKIE['orderID'])) {
                                echo $_COOKIE['orderID'];
                            }?>
                        </p>
                        <p class="order-success-body__status">
                            Cảm ơn bạn đã lựa chọn chúng tôi
                        </p>
                    </div>
                    <div class="order-success__redirect">
                        <a href="./ProductList/" class="btn btn-outline-primary order-success-redirect__main-page">
                            Tiếp tục mua sắm
                        </a>
                        <a href="./Personal/purchase" class="btn btn-second order-success-redirect__order-detail nav-user-menu__purchase">
                            Theo dõi đơn hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>