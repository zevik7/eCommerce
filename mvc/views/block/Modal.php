<div id="modal" name="modal" class="modal">
    <div name="modal__overlay" class="modal__overlay" onclick="">
    </div>
    <div id="modal__body" name="modal__body" class="modal__body">
        <div id="modal-body__signup" name="modal-body__signup" class="modal-body__auth" role="dialog">
            <div class="auth-header">
                <h3 class="auth-header__title">Đăng ký</h3>
                <h4 href="" class="auth-header__switch">Đăng nhập</h4>
            </div>
            <div class="auth-body">
                <div class="auth-body__element">
                    <input id="modal-body-signup__phoneNumber" name="auth-body__phoneNumber" type="text" class="auth-body-element__input input" placeholder="Nhập số điện thoại của bạn">
                    <span class="underline"></span>
                </div>
                <div class="auth-body__element">
                    <input id="modal-body-signup__email" name="auth-body__email" type="text" class="auth-body-element__input input" placeholder="Nhập email của bạn">
                    <span class="underline"></span>
                </div>
                <div class="auth-body__element">
                    <input id="modal-body-signup__password" name="auth-body__password" type="password" class="auth-body-element__input input" placeholder="Nhập mật khẩu của bạn">
                    <span class="underline"></span>
                </div>
                <div class="auth-body__element">
                    <input id="modal-body-signup__rePassword" name="auth-body__rePassword" type="password" class="auth-body-element__input input"  placeholder="Nhập lại mật khẩu của bạn">
                    <span class="underline"></span>
                </div>
            </div>
            <div class="auth-policy">
                Nếu bạn đăng kí, bạn đã đồng ý với HevyShop về <a href="" class="auth-policy__link">Điều khoản dịch vụ và chính sách bảo mật</a>
            </div>
            <div class="auth-controls">
                <input type="button" name="auth-controls__back" class="auth-controls__btn btn btn--back" value="TRỞ LẠI" onclick="hidemodal();">
                <input id="modal-body-signup__signupBtn" type="submit" name="auth-controls__signupBtn" class="auth-controls__btn btn--auth btn btn--primary" value="ĐĂNG KÝ">
            </div>
        </div>
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
        <div id="modal-body__signin" name="modal-body__signin" class="modal-body__auth">
            <div class="auth-header">
                <h3 class="auth-header__title">Đăng nhập</h3>
                <h4 class="auth-header__switch">Đăng ký</h4>
            </div>
            <div class="auth-body">
                <div class="auth-body__element">
                    <input id="modal-body-signin__account" type="text" class="auth-body-element__input input" placeholder="Nhập số điện thoại hoặc email của bạn">
                    <span class="underline"></span>
                </div>
                <div class="auth-body__element">
                    <input id="modal-body-signin__password" type="password" class="auth-body-element__input input" placeholder="Nhập mật khẩu của bạn">
                    <span class="underline"></span>
                </div>
            </div>
            <div class="modal-body-auth__forgetPass">
                <a href="" class="modal-body-auth-forgetPass__link"><i class="fas fa-lock-open">&nbsp</i>
                    Quên mật khẩu
                </a>
            </div>
            <div class="auth-controls">
                <input class="auth-controls__btn btn btn--back" type="button" value="TRỞ LẠI" onclick="hidemodal();">
                <input id="modal-body-signin__signinBtn" class="auth-controls__btn btn btn--auth" type="submit" value="ĐĂNG NHẬP">
            </div>
        </div>
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