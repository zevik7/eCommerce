<div class="bg-transparent">
    <div class="grid wide padding-top20">
        <div class="row"> <!--open tag of Personal Page-->
            <?php
                require_once './mvc/views/block/Personal_Sidebar.php';
            ?>

            <div class="col-10 pb-50">
                <?php 
                    require_once './mvc/views/page/personal/PersonalAccount.php';
                    require_once './mvc/views/page/personal/PersonalPurchase.php';
                    require_once './mvc/views/page/personal/PersonalNotify.php';
                    require_once './mvc/views/page/personal/PersonalVoucher.php';
                    require_once './mvc/views/page/personal/PersonalCent.php';
                ?>
            </div> 

            <?php
                require_once './mvc/views/block/ModalNotification.php';
            ?>

        <!--Close tag of Personal Page  -->
        </div>
    </div>
</div>