import * as asset from "../general/index.js";
$(document).ready(function () {
    if(localStorage.getItem('current_person')) {
        var current_person = localStorage.getItem('current_person');
        var current_person_sub = localStorage.getItem('current_person_sub');
        $('#' + current_person).trigger('click');
        $('#' + current_person_sub).trigger('click');
    }
    else   $('#personal-sidebar__nav-1').trigger('click');
});

// Event for nav-user
$('#nav-user-menu__account').click(function(){
    localStorage.removeItem('current_person');
    localStorage.removeItem('current_person_sub');
});

$('#nav-user-menu__address').click(function(){
    localStorage.setItem('current_person', 'personal-sidebar__nav-1');
    localStorage.setItem('current_person_sub', 'personal-sidebar__subnav-item-3');
});

$('.nav-user-menu__purchase').click(function(){
    localStorage.setItem('current_person', 'personal-sidebar__nav-2')
    localStorage.removeItem('current_person_sub');
});
  
  /*--------Events for sidebar----------*/
$('.personal-sidebar__nav').click(function () {
    localStorage.setItem('current_person', $(this).attr('id'))
    // slide down and switch page
    $(this).siblings().find('li').slideDown(300);
    switchPersonal($(this).attr('focus'));
    // active
    $(this).addClass('personal-active');
    $(this).siblings().find('li').removeClass('personal-active');
    $(this).siblings().find('li:first').addClass('personal-active');
    switchPersonal($(this).siblings().find('li:first').attr('focus'));
    localStorage.setItem('current_person_sub', $(this).siblings().find('li:first').attr('id'));
    $(this).parent().siblings().find('span').removeClass('personal-active');
    $(this).parent().siblings().find('li').removeClass('personal-active');
    $(this).parent().siblings().find('li').slideUp(300);
  
});
  
$(document).on('click', '.js-trigger-profile', function (e) {
    $("#personal-sidebar__nav-1").trigger('click');
});

$('.profile__edit-change').click(function () {
    switchPersonal($(this).attr('focus'));
    localStorage.setItem('current_person_sub', $(this).attr('id'));
});
$('.personal-sidebar__subnav-item').click(function () {
    localStorage.setItem('current_person_sub', $(this).attr('id'));
    $(this).addClass('personal-active');
    $(this).siblings().removeClass('personal-active');
    switchPersonal($(this).attr('focus'));
});
  
//Switch
function switchPersonal(select) {
    $(select).show();
    $(select).siblings().hide();
}
  
/**---------Personal Account---------- */
let email = $('.js-get-email').text();
var mask = email.replace(/^(..)(.*)(@.*)$/,
    function(str,a, b, c){
        return a + b.replace(/./g, '*') + c
    });
$('.js-get-email').text(mask);
$('.js-get-email').css("display", "block");

//hide phone number
let phone = $('.js-get-phone').text();
    phone = phone.slice(-2);
    let hidePhone = "********";
    $('.js-get-phone').text(hidePhone.concat(phone));
    $('.js-get-phone').css("display", "block");

// validate
$.validator.addMethod('notContainNumber',function(value, element){
return this.optional(element) || (/^([^0-9]*)$/).test(value);
}, 'T??n kh??ng ???????c ph??p ch???a s???');

$.validator.addMethod('validPhoneNumber',function(value, element){
    return this.optional(element) || (/(84|0[3|5|7|8|9])+([0-9]{8})\b/).test(value);
}, 'S??? ??i???n tho???i kh??ng h???p l???');

// Edit username or avatar

$('.profile__form').validate({
    rules: {
        "profile-username" : {
            required: true,
        }
    },
    messages: {
        "profile-username" : {
            required: 'Vui l??ng nh???p t??n hi???n th???',
        }
    },
    errorClass: 'error-label',
    errorPlacement: function(error, element) {
        var inputBox = $(element);
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
                    break;
                    default:  alert(feedback.message);
                }
            },
            error: function (feedback) {
                alert(feedback.message);
            }
        });
    }
});




// success alert
function successAlert(){
    asset.notification_modal({
        // Element
        modal: '.modal-noti',
        modalOverlay: '.modal-overlay',
        msgElement: '.modal-body__msg',
        closeBtn: '.modal-body__close-button',
        // Custom attribute
        autoClose: 2000,
        class: 'modal-noti--success',
        msg: 'Th??nh c??ng'
    });
}
// failed alert
function failedAlert(){
    asset.notification_modal({
        modal: '.modal-noti',
        modalOverlay: '.modal-overlay',
        msgElement: '.modal-body__msg',
        closeBtn: '.modal-body__close-button',
        // Custom attribute
        autoClose: 2000,
        class: 'modal-noti--error',
        msg: 'Th???t b???i'
    });
}

// update email confirm
$('.update-email__form-confirm').validate({
    rules: {
        "password-confirm" : {
            required: true,
        }
    },
    messages: {
        "password-confirm" : {
            required: 'Vui l??ng nh???p t??n hi???n th???',
        }
    },
    errorClass: 'error-label',
    errorPlacement: function(error, element) {
        var inputBox = $(element);
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
                        localStorage.setItem('current_person_sub', '.update-email__change');
                    break;
                    default:
                        failedAlert(feedback.message)
                    }
            },
            error: function () {
                alert('L???i g???i d??? li???u l??n server');
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
            required: 'Vui l??ng nh???p ?????a ch??? email',
            email: 'Email ch??a ????ng ?????nh d???ng'
        }
    },
    errorClass: 'error-label',
    errorPlacement: function(error, element) {
        var inputBox = $(element);
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
                    break;
                    default: 
                        alert(feedback.message);
                    }
            },
            error: function () {
                alert('L???i g???i d??? li???u l??n server');
            }
        });
    }
});
// update phone confirm
$('.update-phone__form-confirm').validate({
    rules: {
        "password-confirm" : {
            required: true,
        }
    },
    messages:{
        "password-confirm" : {
            required: 'Vui l??ng nh???p t??n hi???n th???',
        }
    },
    errorClass: 'error-label',
    errorPlacement: function(error, element) {
        var inputBox = $(element);
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
                        localStorage.setItem('current_person_sub','.update-phone__change');
                    break;
                    default:
                        failedAlert(feedback.message)
                    }
            },
            error: function () {
                alert('L???i g???i d??? li???u l??n server');
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
            required: 'Vui l??ng nh???p nh???p s??? ??i???n tho???i',
            validPhoneNumber: 'S??? ??i???n tho???i ch??a ????ng ?????nh d???ng'
        }
    },
    errorClass: 'error-label',
    errorPlacement: function(error, element) {
        var inputBox = $(element);
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
                    break;
                    default: 
                        alert(feedback.message);
                    }
            },
            error: function () {
                alert('L???i g???i d??? li???u l??n server');
            }
        });
    }
});

//Hi???n th??? h??nh ???nh khi upload
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
            required: 'Vui l??ng nh???p m???t kh???u hi???n t???i',
        },
        "new-password" : {
            required: 'Vui l??ng m???t kh???u m???i',
            minlength: 'M???t kh???u c?? ??t nh???t 8 k?? t???'
        },
        "re-new-password" : {
            equalTo: "M???t kh???u nh???p l???i ch??a ????ng"
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
                        successAlert(feedback.message);
                    break;
                    default: 
                        failedAlert(feedback.message);
                    }
            },
            error: function () {
                failedAlert('L???i g???i d??? li???u l??n server');
            }
        });
    }
});

$('.user-address__input').click(function(){
    $('.user-address__box').css('display','flex');
});
$('#js-user-provinces li').click(function(){
    var userprovinces = $(this).text();
    $(".user-address__input").val(userprovinces);
});
$('#js-user-districts ul').click(function(){
    var str =  $(".user-address__input").val();
    let index = str.search(",");
    console.log(index);
    if(index == -1) var useraddress = str;
    else useraddress = str.slice(0, index); 
    var userdistricts = $('.user-districts').text();
    $(".user-address__input").val(useraddress + ', ' + userdistricts);
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
            required: "Vui l??ng ch???n T???nh/th??nh ph???, Qu???n/huy???n"
        },
        "user-detail" : {
            required: "Vui l??ng nh???p ?????a ch??? chi ti???t"
        }
    },
    errorClass: 'error-label',
    errorPlacement: function(error, element) {
        var inputBox = $(element);
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
            url: './Personal/setAddress',
            data:  $(form).serialize(),
            dataType: 'JSON',
            success: function (feedback) {
                switch (feedback.status) {
                    case 'success':
                        successAlert();
                    break;
                    default: 
                        failedAlert();
                }
            },
            error: function () {
                // alert('L???i g???i d??? li???u l??n server');
                console.log($(form).serialize());
            }
        });
        console.log($(form).serialize());
    }
});

// modal add address
$('#js-user-address__add').click(function(){
    $('.modal-address__add').fadeIn();
});

$('.modal-overlay, #js-user-back-btn').click(function(){
    $('.modal-address__add').fadeOut();
});
// update address
$('#js-update-address').click(function(){
    $("#js-user-address__add").trigger('click');
})




/**----------Personal Purchase---------- ch??a ho??n thi???n */ 
// $(document).ready(function () {
//     $('.purchase__menu-nav:first').addClass('purchase-active');
// });

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
    switchPersonal($(this).attr('focus'));
    localStorage.setItem('current_person_sub',$(this).attr('id'));
});
