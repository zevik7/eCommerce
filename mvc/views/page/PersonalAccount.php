<div id="account" class="personal-body">

    <div class="profile account">
        <div class="account__header-2line">
            <h2>Hồ Sở Của Tôi</h2>
            <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        </div>
        <div class="grid">
            <form class="profile__form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="profile__body">

                            <?php 
                                $value = json_decode($data['User'], true)[0];
                            ?>
                            <div class="profile__edit">
                                <p class="profile__edit-title">Tên Đăng Nhập</p>
                                <input type="text" name="profile-username" class="input" value="<?php echo $value['userName'];?>">
                            </div>

                            <div class="profile__edit">
                                <p class="profile__edit-title">Email</p>
                                <p id="js-get-email"  style="display: none"><?php echo $value['userEmail'];?></p>
                                <p class="profile__edit-email"></p>
                                <p class="profile__edit-change" href=".update-email">Thay Đổi</p>
                            </div>

                            <div class="profile__edit">
                                <p class="profile__edit-title">Số Điện Thoại</p>
                                <p id="js-get-phone" style="display: none"><?php echo $value['userPhone'];?></p>
                                <p class="profile__edit-phone"></p>
                                <p class="profile__edit-change" href=".update-phone">Thay Đổi</p>
                            </div>

                            <div class="profile__edit">
                                <p class="profile__edit-title"></p>
                                <input id="js-edit-profile" name="personal-submit" type="submit" class="save btn btn-primary" value="Lưu">
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="profile__avatar">
                            <img src="<?php echo $value['userAvatar'];?>" alt="" id="personal-avatar" class="profile__avatar-img">
                            <label class="profile__avatar-label btn btn-second" for="avatar-upload">Chọn Ảnh</label>
                            <input id="avatar-upload" name="personal-image" type="file" class="profile__avatar-upload">
                            <div class="profile__avatar-note">
                                <p>Dung lượng file tối đa 1 MB</p>
                                <p>Định dạng:.JPEG, .PNG</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="update-email account">
        <div class="account__header-2line">
            <h2>Đổi Hộp Thư</h2>
            <p>Để cập nhật email mới, vui lòng xác nhận bằng cách nhập mật khẩu</p>
        </div>
        <div class="update-email__body">
            <div class="update-email__confirm">
                <div class="update-field">
                    <p>Địa Chỉ Hộp Thư</p>
                    <div class="profile__edit-email"></div>
                </div>

                <form class="update-email__form-confirm">
                    <div class="update-field">
                        <p>Mật Khẩu</p>
                        <input type="password" name="password-confirm" class="input" placeholder="Vui lòng nhập nhập khẩu">
                    </div>

                    <p class="wrong-password"></p>

                    <div class="update-field">
                        <p></p>
                        <input type="submit" class="btn btn-primary" value="Xác Nhận">
                    </div>
                </form>
                
            </div>
            <div class="update-email__change">

                <div class="update-field">
                    <p>Địa Chỉ Hộp Thư</p>
                    <span><?php echo $value['userEmail'];?></span>
                </div>

                <form class="update-email__form-change">
                    <div class="update-field">
                        <p>Địa Chỉ Hộp Thư Mới</p>
                        <input type="text" name="update-email" class="input" placeholder="Vui lòng nhập địa chỉ email mới">
                    </div>

                    <div class="update-field">
                        <p></p>
                        <input type="submit" class="btn btn-primary" value="Xác Nhận">
                        <input type="button" class="profile-back__btn btn btn-second"  value="Trở Lại">
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="update-phone account">
        <div class="account__header-2line">
            <h2>Đổi Số Điện Thoại</h2>
            <p>Để đảm bảo tính bảo mật, vui lòng làm theo các bước sau để đổi số điện thoại</p>
        </div>
        <div class="update-phone__body">
            <div class="update-phone__confirm">
                <div class="update-field">
                    <p>Số Điện Thoại</p>
                    <div class="profile__edit-phone"></div>
                </div>
                <form class="update-phone__form-confirm">
                    <div class="update-field">
                        <p>Mật Khẩu</p>
                        <input type="password" name="password-confirm" class="input" placeholder="Vui lòng nhập nhập khẩu">
                    </div>

                    <p class="wrong-password"></p>

                    <div class="update-field">
                        <p></p>
                        <input type="submit" class="btn btn-primary" value="Xác Nhận">
                    </div>
                </form>
            </div>
            <div class="update-phone__change">

                <div class="update-field">
                    <p>Số Điện Thoại</p>
                    <span><?php echo $value['userPhone'];?></span>
                </div>

                <form class="update-phone__form-change">

                    <div class="update-field">
                        <p>Số Điện Thoại Mới</p>
                        <input type="text" name="update-phone" class="input" placeholder="Vui lòng nhập số điện thoại mới">
                    </div>
    
                    <div class="update-field">
                        <p></p>
                        <input type="submit" class="btn btn-primary" value="Xác Nhận">
                        <input type="button" class="profile-back__btn btn btn-second"  value="Trở Lại">
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="bank account">
        <div class="account__header-1line">
            <h2>Thẻ Tín Dụng / Thẻ Ghi Nợ</h2>
            <button class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Thêm Thẻ Mới</button>
        </div>
        <div class="bank__body mt-10">
            <p>You don't have cards yet.</p>
        </div>
        <div class="account__header-1line">
            <h2>Tài Khoản Ngân Hàng Của Tôi</h2>
            <button class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Thêm Tài Khoản Ngân Hàng</button>
        </div>
        <div class="bank__body mt-10">
            <p>Bạn chưa có tài khoản ngân hàng.</p>
        </div>
    </div>


    <div class="address account">
        <div class="account__header-1line">
            <h2>Địa Chỉ Của Tôi</h2>
            <button id="js-user-address__add" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Thêm Địa Chỉ Mới</button>
        </div>
        <div class="address__body mt-10">
            <p>Bạn chưa có địa chỉ.</p>
        </div>

    </div>


    <div class="modal modal-address__add">
        <div class="modal-overlay"></div>
        <form class="user-address">
            <p class="user-address__heading" >Địa Chỉ Mới</p>
            <span>Chọn địa chỉ: </span>
            <input type="text" name="user-address" class="input user-address__input">
            <div class="user-address__box">
                <div id="js-user-provinces" class="select user-address__select" name="fs-select-shipping-provinces">
                    <h4 class="select__active user-provinces"></h4>
                    <!-- <input class="user-provinces__input" name="user-provinces" type="text" style="display: none;" > -->
                    <i class="fas fa-sort-down"></i>
                    <ul class="select__list"> 
                    </ul>
                </div>
                <div id="js-user-districts" class="select user-address__select" name="fs-select-shipping-districts">
                    <h4 class="select__active user-districts"></h4>
                    <!-- <input class="user-districts__input" name="user-districts" type="text" style="display: none;"> -->
                    <i class="fas fa-sort-down"></i>
                    <ul class="select__list">
                    </ul>
                </div>
            </div>
            <span>Địa chỉ cụ thể: </span>
            <textarea class="user-address__detail input" name="user-detail" rows="4" cols="50"></textarea>
            <div class="user-address__btn">
                <input id="js-user-back-btn" class="btn btn-second"  type="button" value="TRỞ LẠI">
                <input class="btn btn-primary" type="submit" name="update-address" value="HOÀN THÀNH">
            </div>
        </form>
    </div>


    <div class="update-password account">
        <div class="account__header-2line">
            <h2>Đổi Mật Khẩu</h2>
            <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
        </div>

        <form class="update-password__form">
            <div class="update-password__body pt-20">

                <div class="update-password__field">
                    <p>Mật Khẩu Hiện Tại</p>
                    <input type="password" name="old-password" class="input">
                    <a href="#">Quên mật khẩu?</a>
                </div>

                <div class="update-password__field">
                    <p>Mật Khẩu Mới</p>
                    <input type="password" id="new-password" name="new-password" class="input">
                </div>

                <div class="update-password__field">
                    <p>Xác Nhận Mật Khẩu</p>
                    <input type="password" name="re-new-password" class="input">
                </div>

                <div class="update-password__field">
                    <p></p>
                    <input type="submit" class="save btn btn-primary" value="Xác Nhận">
                </div>

            </div>
        </form>
    </div>
</div>