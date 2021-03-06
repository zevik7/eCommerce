
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
}, 'T??n kh??ng ???????c ph??p ch???a s???');

$.validator.addMethod('validPhoneNumber',function(value, element){
    return this.optional(element) || (/(84|0[3|5|7|8|9])+([0-9]{8})\b/).test(value);
}, 'S??? ??i???n tho???i kh??ng h???p l???');

// $.validator.addMethod("validatePassword", function (value, element) {
//     return this.optional(element) || /^(?=.*\d)(?=.*[a-z]).{8,16}$/i.test(value);
// }, "H??y nh???p password t??? 8 ?????n 16 k?? t???, trong ???? ??t nh???t m???t ch??? s???");

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
            required: 'Vui l??ng nh???p t??n hi???n th???',
            maxlength: 'T???i ??a l?? 100 k?? t???'
        },
        "modal-signup__phone" : {
            required: 'Vui l??ng nh???p s??? ??i???n tho???i'
        },
        "modal-signup__email": {
            email: 'Email ch??a ????ng ?????nh d???ng',
            required: 'Vui l??ng nh???p email'
        },
        "modal-signup__password": {
            required: 'Vui l??ng nh???p m???t kh???u',
            minlength: 'M???t kh???u c?? ??t nh???t 8 k?? t???'//
        },
        "modal-signup__repassword": {
            equalTo: "M???t kh???u nh???p l???i ch??a ????ng"
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
                        // alert(feedback.message);
                    break;
                    default:
                        shakeModal(feedback.message);
                        // alert(feedback.message);
                }
            },
            error: function(feedback){
                alert('L???i g???i d??? li???u l??n server');
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
            required: 'Vui l??ng nh???p s??? ??i???n tho???i ho???c email'
        },
        "modal-signin__password" : {
            required: 'Vui l??ng nh???p m???t kh???u'
        }
    },
    errorClass: 'error-label', // Set default error css class
    errorPlacement: function(error, element) {
        var inputBox = $(element).parent();
        error.insertAfter(inputBox); // Put error after input's parent
    },
    highlight: function(element, errorClass, validClass) {
        $(element).addClass('error-input'); // Class for input when it invalid
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
                if (feedback.status == 'invalid account'){
                    shakeModal('T??i kho???n ho???c m???t kh???u kh??ng ????ng');
                }
            },
            error: function(feedback){
                alert('L???i g???i d??? li???u l??n server')
            }

        });
    }
})