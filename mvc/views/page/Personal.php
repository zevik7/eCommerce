<div class="bg-transparent">
<div class="grid pt-20">
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

<div class="js-modal-noti modal modal-noti">
    <div class="js-modal-overlay modal-overlay"></div>
    <div class="js-modal-body modal-body">
        <i class="icon-success far fa-check-circle"></i>
        <i class="icon-error far fa-times-circle"></i>
        <p class="js-modal-body__msg modal-body__msg"></p>
        <i class="js-close-button close-button fas fa-times"></i>
    </div>
</div>

<!--Close tag of Personal Page  -->
</div>
</div>
</div>