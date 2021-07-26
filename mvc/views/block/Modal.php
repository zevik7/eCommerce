<div id="js-modal" class="modal" style="display:none">
    <div class="js-close-modal modal-overlay"></div>
    <div id="modal-body" class="modal-body">
        <div class="modal-body__form">
            <form id="js-modal-signup" class="modal-form" name="modal-signup" role="dialog">
                <div class="modal-form__header">
                    <h3 class="title">Đăng ký</h3>
                    <a class="js-show-signin switch title-sm">Đăng nhập</a>
                </div>
                <div class="socials">
                    <a href="" class="facebook-auth">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="google-auth">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                <div id="modal-form__body" class="modal-form__body">
                    <div class="modal-form__input">
                        <input id="modal-signup__username" name="modal-signup__username" data-error="#signup__error-username" type="text" class="input" placeholder="Nhập tên bạn muốn hiển thị">
                        <span class="underline"></span>
                    </div>
                
                    <div class="modal-form__input">
                        <input id="modal-signup__phone" name="modal-signup__phone"  data-error="#signup__error-phone"  type="text" class="input" placeholder="Nhập số điện thoại của bạn">
                        <span class="underline"></span>
                    </div>
                    
                    <div class="modal-form__input">
                        <input id="modal-signup__email" name="modal-signup__email" data-error="#signup__error-email" type="text" class="input" placeholder="Nhập email của bạn">
                        <span class="underline"></span>
                    </div>
                    
                    <div class="modal-form__input">
                        <input id="modal-signup__password" name="modal-signup__password" data-error="#signup__error-password" type="password" class="input" placeholder="Nhập mật khẩu của bạn">
                        <span class="underline"></span>
                    </div>
                    
                    <div class="modal-form__input">
                        <input id="modal-signup__repassword" name="modal-signup__repassword" data-error="#signup__error-repassword" type="password" class="input"  placeholder="Nhập lại mật khẩu của bạn">
                        <span class="underline"></span>
                    </div>
                    
                    <div class="modal-form__input modal__show-pass">
                        <input id="show-pass__signup" type="checkbox">
                        <label for="show-pass__signup">Hiện mật khẩu</label>
                    </div>
                </div>
                <p class="login-policy">
                    Nếu bạn đăng kí, bạn đã đồng ý với HevyShop về <a href="" class="auth-policy__link">Điều khoản dịch vụ và chính sách bảo mật</a>
                </p>
                <div class="modal-form__controls">
                    <input class="js-clode-modal btn btn-second" type="button" value="TRỞ LẠI">
                    <input id="modal-signup__submit" name="modal-signup__submit" type="submit" class="btn btn-primary" value="ĐĂNG KÝ">
                </div>
            </form>
            <form id="js-modal-signin" class="modal-form" name="modal-signin">
                <div class="modal-form__header">
                    <h3 class="title">Đăng nhập</h3>
                    <a class="js-show-signup switch title-sm">Đăng ký</a>
                </div>
                <div class="socials">
                    <a href="" class="facebook-auth">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="google-auth">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                <div class="modal-form__body">
                    <div class="modal-form__input">
                        <input id="modal-signin__account" name="modal-signin__account" type="text" data-error="#signin__error-account" class="input" placeholder="Nhập số điện thoại hoặc email của bạn">
                        <span class="underline"></span>
                    </div>
                    
                    <div class="modal-form__input">
                        <input id="modal-signin__password" name="modal-signin__password" type="password" data-error="#modal-signin__error-password" class="input" placeholder="Nhập mật khẩu của bạn">
                        <span class="underline"></span>
                    </div>
                </div>

                <div class="modal__show-pass">
                    <input id="show-pass__signin" type="checkbox">
                    <label for="show-pass__signin" >Hiện mật khẩu</label>
                </div>

                <div class="forget-pass">
                    <a href="#"><i class="fas fa-lock-open">&nbsp</i>
                        Quên mật khẩu
                    </a>
                </div>
                <div class="modal-form__controls">
                    <input class="js-close-modal btn btn-second" type="button" value="TRỞ LẠI">
                    <input id="modal-signin__submit" class="btn btn-primary" name="modal-signin__submit" type="submit" value="ĐĂNG NHẬP">
                </div>
            </form>
            <div id="js-modal-error"></div>
        </div>
    </div>
</div>
