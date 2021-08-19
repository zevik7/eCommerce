import notification_modal from "../general/index.js";
$(document).ready(function () {
    $('.personal-sidebar__item:first').find('li').slideDown(300);
});
  
  /*--------Events for sidebar----------*/
$('.personal-sidebar__nav').click(function () {
    // slide down and switch page
    $(this).siblings().find('li').slideDown(300);
    switchPersonal($(this).attr('href'));
    // active
    $(this).addClass('personal-active');
    $(this).siblings().find('li').removeClass('personal-active');
    $(this).siblings().find('li:first').addClass('personal-active');
    switchPersonal($(this).siblings().find('li:first').attr('href'));
    $(this).parent().siblings().find('span').removeClass('personal-active');
    $(this).parent().siblings().find('li').removeClass('personal-active');
    $(this).parent().siblings().find('li').slideUp(300);
  
});
  
$(document).on('click', '.js-trigger-profile', function (e) {
    $("#js-trigger-profile").trigger('click');
});

$('.profile__edit-change').click(function () {
    switchPersonal($(this).attr('href'));
});
$('.personal-sidebar__subnav-item').click(function () {
    $(this).addClass('personal-active');
    $(this).siblings().removeClass('personal-active');
    switchPersonal($(this).attr('href'));
});
  
//Switch
function switchPersonal(select) {
    $(select).show();
    $(select).siblings().hide();
}
  
/**---------Personal Account---------- */
let email = $('#js-get-email').text();
var mask = email.replace(/^(..)(.*)(@.*)$/,
    function(str,a, b, c){
        return a + b.replace(/./g, '*') + c
    });

$('.profile__edit-email').text(mask);

//hide phone number
let phone = $('#js-get-phone').text();
    phone = phone.slice(-2);
    let hidePhone = "********";
    $('.profile__edit-phone').text(hidePhone.concat(phone));

// validate
$.validator.addMethod('notContainNumber',function(value, element){
return this.optional(element) || (/^([^0-9]*)$/).test(value);
}, 'Tên không được phép chứa số');

$.validator.addMethod('validPhoneNumber',function(value, element){
    return this.optional(element) || (/(84|0[3|5|7|8|9])+([0-9]{8})\b/).test(value);
}, 'Số điện thoại không hợp lệ');

// Edit username or avatar
$('.profile__form').validate({
    rules: {

        "profile-username" : {
            required: true,
            maxlength: 100,
            notContainNumber: true
        }
    },
    messages: {

        "profile-username" : {
            required: 'Vui lòng nhập tên hiển thị',
            maxlength: 'Tối đa là 100 ký tự'
        }
    },
    errorClass: 'error-username',
    errorPlacement: function(error, element) {
        var inputBox = $(element).parent();
        error.insertAfter(inputBox); 
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('error-input');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('error-input'); 
    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: './Personal/Edit',
            data:  new FormData(form),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function (feedback) {
                switch (feedback.status) {
                    case 'success':
                        successAlert();
                        setTimeout(function(){ 
                            //window.location = window.location; 
                        }, 1100);
                    break;
                    default:  alert(feedback.message);
                }
            },
            error: function () {
            alert(feedback.message);
            }
        });
    }
});
// success alert
function successAlert(){
    notification_modal('Thành công');
}
// failed alert
function failedAlert(){
    notification_modal('Thất bại');
}

// update email confirm
$('.update-email__form-confirm').validate({
    rules: {
        "email__password-confirm" : {
            required: true,
        }
    },
    messages: {
        "email__password-confirm" : {
            required: 'Vui lòng nhập tên hiển thị',
        }
    },
    errorClass: 'error-label', 
    errorPlacement: function(error, element) {
        $('.wrong-password').empty();
        var inputBox = $('.wrong-password');
        error.appendTo(inputBox);
    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: './Personal/UpdateConfirm',
            data:  new FormData(form),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function (feedback) {
                switch (feedback.status) {
                    case 'success':
                        switchPersonal('.update-email__change');
                    break;
                    default:
                        $('.wrong-password').empty();
                        $(".wrong-password").append("Mật khẩu chưa chính xác vui lòng nhập lại");
                    }
            },
            error: function () {
                alert('Lỗi gửi dữ liệu lên server');
            }
        });
    }
});
// update phone confirm
$('.update-phone__form-confirm').validate({
    rules: {
        "phone__password-confirm" : {
            required: true,
        }
    },
    messages:{
        "phone__password-confirm" : {
            required: 'Vui lòng nhập tên hiển thị',
        }
    },
    errorClass: 'error-label', 
    errorPlacement: function(error, element) {
        $('.wrong-password').empty();
        var inputBox = $('.wrong-password');
        error.appendTo(inputBox);
    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: './Personal/UpdateConfirm',
            data:  new FormData(form),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function (feedback) {
                switch (feedback.status) {
                    case 'success':
                        switchPersonal('.update-phone__change');
                    break;
                    default:
                        $('.wrong-password').empty();
                        $(".wrong-password").append("Mật khẩu chưa chính xác vui lòng nhập lại");
                    }
            },
            error: function () {
                alert('Lỗi gửi dữ liệu lên server');
            }
        });
    }
});
// email change
$('.update-email__form-change').validate({
    rules: {
        "update-email" : {
            required: true,
            email: true
        }
    },
    messages:{

        "update-email" : {
            required: 'Vui lòng nhập địa chỉ email',
            email: 'Email chưa đúng định dạng'
        }
    },
    errorClass: 'wrong-password', 
    errorPlacement: function(error, element) {
        $('.wrong-password').empty();
        var inputBox = $(element).parent();
        error.insertAfter(inputBox);
    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: './Personal/UpdateEmail',
            data:  new FormData(form),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function (feedback) {
                switch (feedback.status) {
                    case 'success':
                        successAlert();
                        setTimeout(function(){ window.location = window.location; }, 1100);
                    break;
                    default: 
                        alert(feedback.message);
                    }
            },
            error: function () {
                alert('Lỗi gửi dữ liệu lên server');
            }
        });
    }
});

$('.profile-back__btn').click(function(){
    window.location = window.location;
});
$('.update-phone__form-change').validate({
    rules: {
        "update-phone" : {
            required: true,
            validPhoneNumber: true
        }
    },
    messages:{
        "update-phone" : {
            required: 'Vui lòng nhập nhập số điện thoại',
            validPhoneNumber: 'Số điện thoại chưa đúng định dạng'
        }
    },
    errorClass: 'wrong-password', 
    errorPlacement: function(error, element) {
        $('.wrong-password').empty();
        var inputBox = $(element).parent();
        error.insertAfter(inputBox);
    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: './Personal/UpdatePhone',
            data:  new FormData(form),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function (feedback) {
                switch (feedback.status) {
                    case 'success':
                        successAlert();
                        setTimeout(function(){ window.location = window.location; }, 1100);
                    break;
                    default: 
                        alert(feedback.message);
                    }
            },
            error: function () {
                alert('Lỗi gửi dữ liệu lên server');
            }
        });
    }
});

//Hiển thị hình ảnh khi upload
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#personal-avatar').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#avatar-upload").change(function(){
    readURL(this);
  });

$('.update-password__form').validate({
    rules: {
        "old-password" : {
            required: true,
        },
        "new-password" : {
            required: true,
            minlength: 8
        },
        "re-new-password" : {
            equalTo: "#new-password"
        }
    },
    messages:{
        "old-password" : {
            required: 'Vui lòng nhập mật khẩu hiện tại',
        },
        "new-password" : {
            required: 'Vui lòng mật khẩu mới',
            minlength: 'Mật khẩu có ít nhất 8 kí tự'
        },
        "re-new-password" : {
            equalTo: "Mật khẩu nhập lại chưa đúng"
        }
    },
    errorClass: 'error-password', 
    errorPlacement: function(error, element) {
        var inputBox = $(element).parent();
        error.insertAfter(inputBox); 
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('error-input');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('error-input'); 
    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: './Personal/UpdatePassword',
            data:  new FormData(form),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function (feedback) {
                switch (feedback.status) {
                    case 'success':
                        successAlert();
                        setTimeout(function(){ window.location = window.location; }, 1100);
                    break;
                    default: 
                        failedAlert();
                    }
            },
            error: function () {
                alert('Lỗi gửi dữ liệu lên server');
            }
        });
    }
});

$('.user-address__input').focus(function(){
    $('.user-address__box').css('display','flex');
    // $(this).prop('disabled', true);
});
$('#js-user-provinces').click(function(){
    let userprovinces = $('.user-provinces').text();
    $(".user-address__input").val(userprovinces);
    console.log($(".user-address__input").val());
});
$('#js-user-districts').click(function(){
    let userdistricts = $('.user-districts').text();
    let useraddress = $(".user-address__input").val()+', ' + userdistricts;
    $(".user-address__input").val(useraddress);
    console.log($(".user-districts__input").val());
});
// them dia chi
$('.user-address').validate({
    rules: {
        "user-address" : {
            required: true
        },
        "user-detail" : {
            required: true
        }
    },
    messages:{
        "user-address" : {
            required: "Vui lòng chọn Tỉnh/thành phố, Quận/huyện"
        },
        "user-detail" : {
            required: "Vui lòng nhập địa chỉ chi tiết"
        }
    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: './Personal/setAddress',
            data:  new FormData(form),
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function (feedback) {
                switch (feedback.status) {
                    case 'success':
                        alert(feedback.message);
                    break;
                    default: 
                        alert(feedback.message);
                }
            },
            error: function () {
                alert('Lỗi gửi dữ liệu lên server');
            }
        });
    }
});

// modal add address
$('#js-user-address__add').click(function(){
    $('.modal-address__add').fadeIn();
});

$('.modal-overlay, #js-user-back-btn').click(function(){
    $('.modal-address__add').fadeOut();
});




/**----------Personal Purchase---------- chưa hoàn thiện */ 
$(document).ready(function () {
    $('.purchase__menu-nav:first').addClass('purchase-active');
});

$('.purchase__menu-nav').click(function () {
    $(this).addClass('purchase-active');
    $(this).siblings().removeClass('purchase-active');
});
  
$(".all-purchases__search-input").on({
    focus: function () {
      $(".all-purchases__search-icon").css("color", "#333");
    },
    blur: function () {
      $(".all-purchases__search-icon").css("color", "#999");
    }
});
  
$('.purchase__menu-nav').click(function () {
    switchPersonal($(this).attr('href'));
});
