/*-------------Show form-----------*/
function showFormSignup(){
    $('#js-modal').css('display', 'block');
    $('#js-modal-signup').fadeIn();
    $('#js-modal-signin').css('display','none');
}
function showFormSignin(){
    $('#js-modal').css('display', 'block');
    $('#js-modal-signup').css('display','none');
    $('#js-modal-signin').fadeIn();
}
/*------------- Clear form and reset form -----------*/
function clearFormModal(){
    //Reset error label form
    validatorSignup.resetForm();
    validatorSignin.resetForm();
    //Remove input error class
    $('.modal-form__input input').removeClass('error-input');
    //Clear input text
    $('#modal-body').find('input:text, input:password, select')
    .each(function () {
        $(this).val('');
    });
    //Remove modal error message
    $('#js-modal-error').removeClass().empty();
}
/*-----------Hide form----------*/
function hideForm(){
    clearFormModal();
    $('#js-modal').fadeOut();;
}
/*-------------Modal error message----------*/ 
function shakeModal(text, type = 'error'){
    $('#js-modal-error').removeClass().empty();
    $('#js-modal-error').width();
    $('#js-modal-error').addClass('animated shake');
    if (type == 'error') {
        $('#js-modal-error').addClass('alert alert-danger').html(text);
    }
    else {
        $('#js-modal-error').addClass('alert alert-success').html(text);
    }
}
/*--------------Event for buttons---------------*/
$(".js-show-signup").click(function(){
    clearFormModal();
    showFormSignup();
});
$(".js-show-signin").click(function(){
    clearFormModal();
    showFormSignin();
});

$(".js-close-modal").on('click',function(){
    hideForm();
});

//Logout

/*----- Show password ------*/
$('#show-pass__signin').click(function(){
    if($(this).is(":checked"))
    {   
        $('#modal-signin__password').attr('type', 'text');
    }
    else{
        $('#modal-signin__password').attr('type', 'password');
    }
})
$('#show-pass__signup').click(function(){
    if($(this).is(":checked"))
    {   
        $('#modal-signup__password').attr('type', 'text');
        $('#modal-signup__repassword').attr('type', 'text');
    }
    else{
        $('#modal-signup__password').attr('type', 'password');
        $('#modal-signup__repassword').attr('type', 'password');
    }
})
/*--------------Validation-----------------*/
$.validator.addMethod('notContainNumber',function(value, element){
    return this.optional(element) || (/^([^0-9]*)$/).test(value);
}, 'Tên không được phép chứa số');

$.validator.addMethod('validPhoneNumber',function(value, element){
    return this.optional(element) || (/(84|0[3|5|7|8|9])+([0-9]{8})\b/).test(value);
}, 'Số điện thoại không hợp lệ');

// $.validator.addMethod("validatePassword", function (value, element) {
//     return this.optional(element) || /^(?=.*\d)(?=.*[a-z]).{8,16}$/i.test(value);
// }, "Hãy nhập password từ 8 đến 16 ký tự, trong đó ít nhất một chữ số");

//Sign up
let validatorSignup = $("#js-modal-signup").validate({
    rules: {
        "modal-signup__username" : {
            required: true,
            maxlength: 100,
            notContainNumber: true
        },
        "modal-signup__phone" : {
            required: true,
            validPhoneNumber: true
        },
        "modal-signup__email": {
            email: true,
            required: true
        },
        "modal-signup__password": {
            required: true,
            minlength: 8
        },
        "modal-signup__repassword": {
            equalTo: "#modal-signup__password"
        }
    },
    messages:{
        "modal-signup__username" : {
            required: 'Vui lòng nhập tên hiển thị',
            maxlength: 'Tối đa là 100 ký tự'
        },
        "modal-signup__phone" : {
            required: 'Vui lòng nhập số điện thoại'
        },
        "modal-signup__email": {
            email: 'Email chưa đúng định dạng',
            required: 'Vui lòng nhập email'
        },
        "modal-signup__password": {
            required: 'Vui lòng nhập mật khẩu',
            minlength: 'Mật khẩu có ít nhất 8 kí tự'
        },
        "modal-signup__repassword": {
            equalTo: "Mật khẩu nhập lại chưa đúng"
        }
    },
    errorClass: 'error-label', //Set default error css class
    errorPlacement: function(error, element) {
        var inputBox = $(element).parent();
        error.insertAfter(inputBox); //Put error after input's parent
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('error-input'); //Class for input when it invalid
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('error-input'); 
    },
    submitHandler: function(form) {
        $.ajax({
            type:"POST",
            url: './Signup/Auth',
            data:  $(form).serialize(),
            dataType: 'JSON',
            success:function(feedback){
                switch (feedback.status)
                {
                    case 'success':
                        shakeModal(feedback.message, 'success');
                    break;
                    default:
                        shakeModal(feedback.message);
                }
            },
            error: function(feedback){
                alert('Lỗi gửi dữ liệu lên server');
            }
        });
    }
})
//Sign in
let validatorSignin = $("#js-modal-signin").validate({
    rules: {
        "modal-signin__account" : {
            required: true
        },
        "modal-signin__password" : {
            required: true
        }
    },
    messages: {
        "modal-signin__account" : {
            required: 'Vui lòng nhập số điện thoại hoặc email'
        },
        "modal-signin__password" : {
            required: 'Vui lòng nhập mật khẩu'
        }
    },
    errorClass: 'error-label', //Set default error css class
    errorPlacement: function(error, element) {
        var inputBox = $(element).parent();
        error.insertAfter(inputBox); //Put error after input's parent
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('error-input'); //Class for input when it invalid
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('error-input'); 
    },
    submitHandler: function(form) {
        $.ajax({
            type:"POST",
            url: './Signin/Auth',
            data:  $(form).serialize(),
            dataType: 'JSON',
            success:function(feedback){
                if (feedback.status == 'success')
                {
                    location.reload();
                }
                if (feedback.status == 'invalidAccount'){
                    shakeModal('Tài khoản hoặc mật khẩu không đúng');
                }
            },
            error: function(feedback){
                alert('Lỗi gửi dữ liệu lên server')
            }
        });
    }
})