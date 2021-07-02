<div id="modal" name="modal" class="modal">
    <div id="modal__overlay" name="modal__overlay" class="modal__overlay">
    </div>
    <div id="modal__body" name="modal__body" class="modal__body">
        <form id="modal-body__signup" name="modal-body__signup" class="modal-body__auth" role="dialog">
            <div class="auth-header">
                <h3 class="auth-header__title">Đăng ký</h3>
                <a href="javascript: getFormSignin();" class="auth-header__switch">Đăng nhập</a>
            </div>
            <div class="auth-body">
                <div class="auth-body__element">
                    <input id="modal-body-signup__userName" name="auth-body__userName" data-error="#modal-body-signup__errorUserName" type="text" class="auth-body-element__input input" placeholder="Nhập tên bạn muốn hiển thị">
                    <span class="underline"></span>
                </div>
                <span class="auth-body__errorTxt" id="modal-body-signup__errorUserName"></span>
                <div class="auth-body__element">
                    <input id="modal-body-signup__phoneNumber" name="auth-body__phoneNumber"  data-error="#modal-body-signup__errorPhoneNumber"  type="text" class="auth-body-element__input input" placeholder="Nhập số điện thoại của bạn">
                    <span class="underline"></span>
                </div>
                <span class="auth-body__errorTxt" id="modal-body-signup__validUserPhone"></span>
                <span class="auth-body__errorTxt" id="modal-body-signup__errorPhoneNumber"></span>
                <div class="auth-body__element">
                    <input id="modal-body-signup__email" name="auth-body__email" data-error="#modal-body-signup__errorEmail" type="text" class="auth-body-element__input input" placeholder="Nhập email của bạn">
                    <span class="underline"></span>
                </div>
                <span class="auth-body__errorTxt" id="modal-body-signup__validEmail"></span>
                <span class="auth-body__errorTxt" id="modal-body-signup__errorEmail"></span>
                <div class="auth-body__element">
                    <input id="modal-body-signup__password" name="auth-body__password" data-error="#modal-body-signup__errorPassword" type="password" class="auth-body-element__input input" placeholder="Nhập mật khẩu của bạn">
                    <span class="underline"></span>
                </div>
                <span class="auth-body__errorTxt" id="modal-body-signup__errorPassword"></span>
                <div class="auth-body__element">
                    <input id="modal-body-signup__rePassword" name="auth-body__rePassword" data-error="#modal-body-signup__errorRePassword" type="password" class="auth-body-element__input input"  placeholder="Nhập lại mật khẩu của bạn">
                    <span class="underline"></span>
                </div>
                <span class="auth-body__errorTxt" id="modal-body-signup__errorRePassword"></span>
                <div class="auth-body__showPassword">
                    <input id="modal-body-signup__showPassword" class="modal-body__showPassword" type="checkbox">
                    <label for="modal-body-signup__showPassword" class="auth-body-lable__showPassword">Hiện mật khẩu</label>
                </div>

            </div>
            <div class="auth-policy">
                Nếu bạn đăng kí, bạn đã đồng ý với HevyShop về <a href="" class="auth-policy__link">Điều khoản dịch vụ và chính sách bảo mật</a>
            </div>
            <div class="auth-controls">
                <input id="modal-body-signup__back" type="button" name="auth-controls__back" class="auth-controls__btn btn btn--back" value="TRỞ LẠI">
                <input id="modal-body-signup__signupBtn" type="submit" name="auth-controls__signupBtn" class="auth-controls__btn btn--auth btn btn--primary" value="ĐĂNG KÝ">
            </div>
        </form>
        <div id="modal-body__signupSocial" name="modal-body__signupSocial" class="modal-body__socials">
            <a href="" class="modal-body-socials__facebook btn">
                <i class="fab fa-facebook">&nbsp</i>
                Kết nối với Facebook
            </a>
            <a href="" class="modal-body-socials__google btn">
                <i class="fab fa-google">&nbsp</i>
                Kết nối với Google
            </a>
        </div>
        <form id="modal-body__signin" name="modal-body__signin" class="modal-body__auth">
            <div class="auth-header">
                <h3 class="auth-header__title">Đăng nhập</h3>
                <a href="javascript: getFormSignup();" class="auth-header__switch">Đăng ký</a >
            </div>
            <div class="auth-body">
                <div class="auth-body__element">
                    <input id="modal-body-signin__account" name="auth-body-signin__account" type="text" data-error="#modal-body-signin__errorAccount" class="auth-body-element__input input" placeholder="Nhập số điện thoại hoặc email của bạn">
                    <span class="underline"></span>
                </div>
                <span class="auth-body__errorTxt" id="modal-body-signin__getLink" style="display: none;"></span>
                <span class="auth-body__errorTxt" id="modal-body-signin__errorAccount"></span>
                <div class="auth-body__element">
                    <input id="modal-body-signin__password" name="auth-body-signin__password" type="password" data-error="#modal-body-signin__errorPassWord" class="auth-body-element__input input" placeholder="Nhập mật khẩu của bạn">
                    <span class="underline"></span>
                </div>
                <span class="auth-body__errorTxt" id="modal-body-signin__errorPassWord"></span>
            </div>
            <div class="auth-body__showPassword">
                <input id="modal-body-signin__showPassword" class="modal-body__showPassword" type="checkbox">
                <label for="modal-body-signin__showPassword" class="auth-body-lable__showPassword">Hiện mật khẩu</label>
            </div>

            <div class="modal-body-auth__forgetPass">
                <a href="" class="modal-body-auth-forgetPass__link"><i class="fas fa-lock-open">&nbsp</i>
                    Quên mật khẩu
                </a>
            </div>
            <div class="auth-controls">
                <input id="modal-body-signin__back" class="auth-controls__btn btn btn--back" type="button" value="TRỞ LẠI" onclick="hidemodal();">
                <input id="modal-body-signin__signinBtn" class="auth-controls__btn btn btn--auth" name="auth-controls__signinBtn" type="submit" value="ĐĂNG NHẬP">
            </div>
        </form>
        <div id="modal-body__signinSocial" name="modal-body__signinSocial" class="modal-body__socials">
            <a href="" class="modal-body-socials__facebook btn">
                <i class="fab fa-facebook">&nbsp</i>
                Đăng nhập với Facebook
            </a>
            <a href="" class="modal-body-socials__google btn">
                <i class="fab fa-google">&nbsp</i>
                Đăng nhập với Google
            </a>
        </div>
        
    </div>
</div>
