<div class="bg-transparent">
    <div class="grid wide padding-top20">
        <div class="row"> <!--open tag of Personal Page-->
            <?php
                require_once '../src/views/block/Personal_Sidebar.php';
            ?>

            <div class="col-10 pb-50">
                <?php
                    require_once '../src/views/block/personal/PersonalAccount.php';
                    require_once '../src/views/block/personal/PersonalPurchase.php';
                    require_once '../src/views/block/personal/PersonalNotify.php';
                    require_once '../src/views/block/personal/PersonalVoucher.php';
                    require_once '../src/views/block/personal/PersonalCent.php';
                ?>
            </div> 

            <?php
                require_once '../src/views/block/ModalNotification.php';
            ?>

        <!--Close tag of Personal Page  -->
        </div>
    </div>
</div>