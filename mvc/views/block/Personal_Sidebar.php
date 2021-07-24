<div class="col-2">
    <nav class="personal-sidebar">

        <div class="personal-sidebar__header">
            <img src="<?php echo $value['userAvatar'];?>" alt="" class="personal-sidebar__avatar js-trigger-profile" >
            <?php 
                $value = json_decode($data['User'], true)[0];
            ?>
            <div class="personal-sidebar__profile"  href=""  >
                <h3 class="username"><?php echo $value['userName'];?></h3>
                <div class="edit js-trigger-profile"><i class="fas fa-pen"></i> Sửa Hồ Sơ</div>
            </div>
        </div>

        <ul class="personal-sidebar__list">

            <li class="personal-sidebar__item">
                <span id="js-trigger-profile" class="personal-sidebar__nav personal-active" href="#account" ><i class="fas fa-user-alt"></i>Tài Khoản Của Tôi</span>
                <ul class="personal-sidebar__subnav">
                    <li class="personal-sidebar__subnav-item personal-active" href=".profile">Hồ Sơ</li>
                    <li class="personal-sidebar__subnav-item" href=".bank">Ngân Hàng</li>
                    <li class="personal-sidebar__subnav-item" href=".address">Địa Chỉ</li>   
                    <li class="personal-sidebar__subnav-item" href=".update-password">Đổi Mật Khẩu</li>
                </ul>
            </li>

            <li class="personal-sidebar__item">
                <span class="personal-sidebar__nav" href="#purchase"><i class="fas fa-clipboard-list"></i>Đơn Mua</span>
            </li>

            <li class="personal-sidebar__item">
                <span class="personal-sidebar__nav" href="#notify"><i class="fas fa-bell"></i>Thông Báo</span>
                <ul class="personal-sidebar__subnav">
                    <li class="personal-sidebar__subnav-item" href=".personal-notify__update-bill">Cập Nhật Đơn Hàng</li>
                    <li class="personal-sidebar__subnav-item" href=".personal-notify__sale">Khuyến Mãi</li>
                    <li class="personal-sidebar__subnav-item" href=".personal-notify__wallet">Cập Nhật Ví</li>
                    <li class="personal-sidebar__subnav-item" href=".personal-notify__activity">Hoạt Động</li>
                    <li class="personal-sidebar__subnav-item" href=".personal-notify__rated">Cập Nhật Đánh Giá</li>
                    <li class="personal-sidebar__subnav-item" href=".personal-notify__update-hevy">Cập Nhật Hevy</li>
                </ul>
            </li>

            <li class="personal-sidebar__item">
                <span class="personal-sidebar__nav" href="#voucher"><i class="fas fa-ticket-alt"></i>Kho Voucher</span>
            </li>

            <li class="personal-sidebar__item">
                <span class="personal-sidebar__nav" href="#cent"><i class="fas fa-donate"></i>Hevy Xu</span>
            </li>

        </ul>
    </nav>
</div>

