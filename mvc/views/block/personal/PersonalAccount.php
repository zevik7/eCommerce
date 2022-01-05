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
                            <div class="row profile__edit">
                                <div class="col-4">
                                    <p class="profile__edit-title">Tên Đăng Nhập</p>
                                </div>
                                <div class="col-8">
                                    <input type="text" name="profile-username" class="input" value="<?php echo $_SESSION['user']['name'];?>">
                                </div>

                                <div class="col-4">
                                    <p class="profile__edit-title">Email</p>
                                </div>
                                <div class="col-8"> 
                                    <div style="display: flex;">
                                        <p class="js-get-email profile__edit-email"><?php echo $_SESSION['user']['email'];?></p>
                                        <p id="profile__edit-change" class="profile__edit-change" href=".update-email">Thay Đổi</p>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <p class="profile__edit-title">Số Điện Thoại</p>
                                </div>
                                <div class="col-8"> 
                                    <div style="display: flex;">
                                        <p class="js-get-phone profile__edit-phone"><?php echo $_SESSION['user']['phone'];?></p>
                                        <p id="profile__edit-change-2" class="profile__edit-change" href=".update-phone">Thay Đổi</p>
                                    </div>
                                </div>

                                <div class="col-4"></div>
                                <div class="col-8"> 
                                    <input id="js-edit-profile" name="personal-submit" type="submit" class="save btn btn-primary" value="Lưu">
                                </div>

                            </div>

                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="profile__avatar">
                            <img src="<?php echo $_SESSION['user']['avatar'];?>" alt="" id="personal-avatar" class="profile__avatar-img">
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
                <div class="row update-field">
                    <div class="col-4">
                        <p>Địa Chỉ Hộp Thư</p>
                    </div>
                    <div class="col-8"> 
                        <div class="js-get-email profile__edit-email"></div>
                    </div>
                </div>
                <form class="update-email__form-confirm">
                    <div class="row update-field">
                        <div class="col-4">
                            <p>Mật Khẩu</p>
                        </div>
                        <div class="col-8"> 
                            <input type="password" name="password-confirm" class="input" placeholder="Vui lòng nhập nhập khẩu">
                        </div>
                        <div class="col-4"></div>
                        <div class="col-8"> 
                            <input type="submit" class="btn btn-primary" value="Xác Nhận">
                        </div>
                        
                    </div>
                </form> 
            </div>

            <div class="update-email__change">
                <div class="row update-field">
                    <div class="col-4">
                        <p>Địa Chỉ Hộp Thư</p>
                    </div>
                    <div class="col-8"> 
                        <span><?php echo $_SESSION['user']['email'];?></span>
                    </div>
                </div>

                <form class="update-email__form-change">
                    <div class="row update-field">
                        <div class="col-4">
                            <p>Địa Chỉ Hộp Thư Mới</p>
                        </div>
                        <div class="col-8">
                            <div><input type="text" name="update-email" class="input" placeholder="Vui lòng nhập địa chỉ email mới"></div>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-8"> 
                            <input type="submit" class="btn btn-primary" value="Xác Nhận">
                            <input type="button" class="profile-back__btn btn btn-second"  value="Trở Lại">
                        </div>
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
                <div class="row update-field">
                    <div class="col-4">
                        <p>Số Điện Thoại</p>
                    </div>
                    <div class="col-8"> 
                        <div class="js-get-phone profile__edit-phone"></div>
                    </div>
                </div>
                <form  class="update-phone__form-confirm">
                    <div class="row update-field">
                        <div class="col-4">
                            <p>Mật Khẩu</p>
                        </div>
                        <div class="col-8"> 
                            <input type="password" name="password-confirm" class="input" placeholder="Vui lòng nhập nhập khẩu">
                        </div>
                        <div class="col-4"></div>
                        <div class="col-8"> 
                            <input type="submit" class="btn btn-primary" value="Xác Nhận">
                        </div>
                    </div>
                </form>
            </div>

            <div class="update-phone__change">

                <div class="row update-field">
                    <div class="col-4">
                        <p>Số Điện Thoại</p>
                    </div>
                    <div class="col-8"> 
                        <span><?php echo $_SESSION['user']['phone'];?></span>
                    </div>
                </div>
                <form  class="update-phone__form-change">
                    <div class="row update-field">
                        <div class="col-4">
                            <p>Số Điện Thoại Mới</p>
                        </div>
                        <div class="col-8"> 
                            <div><input type="text" name="update-phone" class="input" placeholder="Vui lòng nhập số điện thoại mới"></div>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-8"> 
                            <input type="submit" class="btn btn-primary" value="Xác Nhận">
                            <input type="button" class="profile-back__btn btn btn-second"  value="Trở Lại">
                        </div>
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
            <?php if ($_SESSION['user']['address'] == ""): ?>
              <p>Bạn chưa có địa chỉ</p>

            <?php
                else:
                    $str = $_SESSION['user']['address'];
                    $index = strpos($str, ".");
            ?>
            <div class="grid">
                <div class="row mt-24">
                    <div class="col-4">
                        <p style="text-align: right;">Địa chỉ của bạn: </p>
                    </div>
                    <div class="col-4"> 
                        <span><?php  echo substr($str, 0, $index);?></span> <br>
                        <span><?php  echo substr($str, $index + 1);?></span>
                    </div>
                    <div class="col-4">
                        <button id="js-update-address" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </div>
            <?php endif; ?>
                
        </div>
        <div class="modal modal-address__add">
            <div class="modal-overlay"></div>
            <form class="user-address">
                <p class="user-address__heading" >Địa Chỉ Mới</p>
                <span>Chọn Tỉnh, thành phố và Quận, huyện:</span>
                <input type="text" name="user-address" 
                class="input user-address__input"
                oninvalid="this.setCustomValidity(' ')" 
                oninput="setCustomValidity('')"
                autocomplete="off"
                readonly="readonly"
                >
                <div class="user-address__box">
                    <div id="js-user-provinces" class="select user-address__select" name="fs-select-shipping-provinces">
                        <h4 class="select__active user-provinces"></h4>
                        <i class="fas fa-sort-down"></i>
                        <ul class="select__list"> 
                        </ul>
                    </div>
                    <div id="js-user-districts" class="select user-address__select" name="fs-select-shipping-districts">
                        <h4 class="select__active user-districts"></h4>
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
    </div>

    <div class="update-password account">
        <div class="account__header-2line">
            <h2>Đổi Mật Khẩu</h2>
            <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
        </div>

        <form class="update-password__form">
            <div class="row update-password__field">
                <div class="col-3">
                    <p>Mật Khẩu Hiện Tại</p>
                </div>
                <div class="col-5">
                    <div><input type="password" name="old-password" class="input"></div>
                </div>
                <div class="col-4"><a href="#">Quên mật khẩu?</a></div>

                <div class="col-3">
                    <p>Mật Khẩu Mới</p>
                </div>
                <div class="col-5"> 
                    <div><input type="password" id="new-password" name="new-password" class="input"></div>     
                </div>
                <div class="col-4"></div>

                <div class="col-3">
                    <p>Xác Nhận Mật Khẩu</p>
                </div>
                <div class="col-5"> 
                    <div> <input type="password" name="re-new-password" class="input"></div>
                </div>
                <div class="col-4"></div>

                <div class="col-4"></div>
                <input type="submit" class="save btn btn-primary" value="Xác Nhận">
                
            </div>
        </form>
    </div>
</div>