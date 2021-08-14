<div class="bg-transparent">
<div class="grid pt-20">
<div class="row"> <!--open tag of Personal Page-->
<?php
    require_once './mvc/views/block/Personal_Sidebar.php';
?>

<div class="col-10 pb-50">
    <?php 
        //require_once './mvc/views/page/'.$data['PP'].'.php';
        require_once './mvc/views/page/PersonalAccount.php';
        require_once './mvc/views/page/PersonalPurchase.php';
        require_once './mvc/views/page/PersonalNotify.php';
        require_once './mvc/views/page/PersonalVoucher.php';
        require_once './mvc/views/page/PersonalCent.php';
        //echo $data['PP'];
    ?>
</div> 

<div class="modal modal__update-success">
    <div class="modal-overlay"></div>
    <div class="update-success">
        <div>
            <i class="far fa-check-circle"></i>
            <p>Cập nhật thành công</p>
        </div>
    </div>
</div>

<div class="modal modal__update-failed">
    <div class="modal-overlay"></div>
    <div class="update-failed">
        <div>
            <i class="far fa-times-circle"></i>
            <p>Mật khẩu không đúng</p>
        </div>
    </div>
</div>

<!--Close tag of Personal Page  -->
</div>
</div>
</div>