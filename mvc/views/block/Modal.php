<div id="modal" class="modal" style="display:none">
    <div id="modal-overlay" class="modal-overlay">
    </div>
    <div id="modal-body" class="modal-body">
        <form id="modal-signup" name="modal-signup" class="modal-body__form" role="dialog">
            <div class="modal-form__header">
                <h3 class="title">Đăng ký</h3>
                <a href="javascript: getFormSignin();" class="switch title-sm">Đăng nhập</a>
            </div>

            <div id="js-modal-form__body" class="modal-form__body">
                <div class="modal-form__input">
                    <input id="modal-signup__userName" name="modal-signup__userName" data-error="#modal-signup__errorUserName" type="text" class="input" placeholder="Nhập tên bạn muốn hiển thị">
                    <span class="underline"></span>
                </div>
                <span class="input__error-txt" id="modal-signup__errorUserName"></span>
               
                <div class="modal-form__input">
                    <input id="modal-signup__phoneNumber" name="modal-signup__phoneNumber"  data-error="#modal-signup__errorPhoneNumber"  type="text" class="input" placeholder="Nhập số điện thoại của bạn">
                    <span class="underline"></span>
                </div>
                <span class="input__error-txt" id="modal-signup__errorPhoneNumber"></span>
                
                <div class="modal-form__input">
                    <input id="modal-signup__email" name="modal-signup__email" data-error="#modal-signup__errorEmail" type="text" class="input" placeholder="Nhập email của bạn">
                    <span class="underline"></span>
                </div>
                <span class="input__error-txt" id="modal-signup__errorEmail"></span>
                
                <div class="modal-form__input">
                    <input id="modal-signup__password" name="modal-signup__password" data-error="#modal-signup__errorPassword" type="password" class="input" placeholder="Nhập mật khẩu của bạn">
                    <span class="underline"></span>
                </div>
                <span class="input__error-txt" id="modal-signup__errorPassword"></span>
                
                <div class="modal-form__input">
                    <input id="modal-signup__rePassword" name="modal-signup__rePassword" data-error="#modal-signup__errorRePassword" type="password" class="input"  placeholder="Nhập lại mật khẩu của bạn">
                    <span class="underline"></span>
                </div>
                <span class="input__error-txt" id="modal-signup__errorRePassword"></span>
                
                <div class="modal-form__input modal__show-pass">
                    <input id="show-pass__input" type="checkbox">
                    <label for="show-pass__input">Hiện mật khẩu</label>
                </div>
            </div>
            <p class="login-policy">
                Nếu bạn đăng kí, bạn đã đồng ý với HevyShop về <a href="" class="auth-policy__link">Điều khoản dịch vụ và chính sách bảo mật</a>
            </p>
            <div class="modal-form__controls">
                <input id="modal-signup__back" name="modal-signup__back" type="button" class="btn btn-second" value="TRỞ LẠI">
                <input id="modal-signup__submit" name="modal-signup__submit" type="submit" class="btn btn-primary" value="ĐĂNG KÝ">
            </div>
            <div class="modal-form__socials">
                <a href="" class="facebook-auth">
                    <i class="fab fa-facebook"></i>
                    Kết nối với Facebook
                </a>
                hoặc
                <a href="" class="google-auth">
                    <i class="fab fa-google"></i>
                    Kết nối với Google
                </a>
            </div>
        </form>
        
        <form id="modal-signin" name="modal-signin" class="modal-body__form">
            <div class="modal-form__header">
                <h3 class="title">Đăng nhập</h3>
                <a href="javascript: getFormSignup();" class="switch">Đăng ký</a >
            </div>
            <div class="modal-form__body">
                <div class="modal-form__input">
                    <input id="modal-signin__account" name="modal-signin__account" type="text" data-error="#modal-signin__errorAccount" class="input" placeholder="Nhập số điện thoại hoặc email của bạn">
                    <span class="underline"></span>
                </div>
                <span class="input__error-txt" id="modal-signin__getLink" style="display: none;"></span>
                <span class="input__error-txt" id="modal-signin__errorAccount"></span>
                
                <div class="modal-form__input">
                    <input id="modal-signin__password" name="modal-signin__password" type="password" data-error="#modal-signin__errorPassWord" class="input" placeholder="Nhập mật khẩu của bạn">
                    <span class="underline"></span>
                </div>
                <span class="input__error-txt" id="modal-signin__errorPassWord"></span>
            </div>

            <div class="modal__show-pass">
                <input id="show-pass__input" type="checkbox">
                <label for="show-pass__input" >Hiện mật khẩu</label>
            </div>

            <div class="forget-pass">
                <a href="#"><i class="fas fa-lock-open">&nbsp</i>
                    Quên mật khẩu
                </a>
            </div>
            <div class="modal-form__controls">
                <input id="modal-signin__back" class="btn btn-second" name="modal-signin__back" type="button" value="TRỞ LẠI" onclick="hidemodal();">
                <input id="modal-signin__submit" class="btn btn-primary" name="modal-signin__submit" type="submit" value="ĐĂNG NHẬP">
            </div>
            <div class="modal-form__socials">
                <a href="" class="facebook-auth">
                    <i class="fab fa-facebook"></i>
                    Đăng nhập với Facebook
                </a>
                <a href="" class="google-auth">
                    <i class="fab fa-google"></i>
                    Đăng nhập với Google
                </a>
            </div>
        </form>
    </div>
</div>
