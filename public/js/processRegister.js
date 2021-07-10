$(document).ready(function(){
    $("#nav-list__signupBtn").click(function(){
        getFormSignup()
    });

    $("#nav-list__signinBtn").click(function(){
        getFormSignin()
    });
});


function getFormSignup(){
    $('.modal').css() //jquyery
    document.getElementById('modal').style.display='flex'; //js
    document.getElementById('modal-body__signup').style.display='block';
    document.getElementById('modal-body__signupSocial').style.display='flex';
    document.getElementById('modal-body__signin').style.display='none';
    document.getElementById('modal-body__signinSocial').style.display='none';
}
function getFormSignin(){
    document.getElementById('modal').style.display='flex';
    document.getElementById('modal-body__signin').style.display='block';
    document.getElementById('modal-body__signinSocial').style.display='flex';
    document.getElementById('modal-body__signup').style.display='none';
    document.getElementById('modal-body__signupSocial').style.display='none';
}


$.validator.addMethod('notContainNumber',function(value, element){
    return this.optional(element) || (/^([^0-9]*)$/).test(value);
}, 'Tên không được phép chứa số')

$.validator.addMethod('notContainLetter',function(value, element){
    return this.optional(element) || (/(84|0[3|5|7|8|9])+([0-9]{8})\b/).test(value);
}, 'Số điện thoại không hợp lệ')

$.validator.addMethod("validatePassword", function (value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[a-z]).{8,16}$/i.test(value);
}, "Hãy nhập password từ 8 đến 16 ký tự, trong đó ít nhất một chữ số");

$(document).ready(function(){
    let validatorSignup = $("#modal-body__signup").validate({
		rules: {
            "auth-body__userName" : {
                required: true,
                maxlength: 100,
                notContainNumber: true
            },
            "auth-body__phoneNumber" : {
                required: true,
                notContainLetter: true
            },
			"auth-body__email": {
                email: true,
				required: true
			},
			"auth-body__password": {
				required: true,
                validatePassword: true
			},
			"auth-body__rePassword": {
				equalTo: "#modal-body-signup__password", 
                validatePassword: true
			}
		},
		messages: {
            "auth-body__userName" : {
                required: 'Vui lòng nhập tên hiển thị',
                maxlength: 'Tối đa là 100 ký tự',
            },
            "auth-body__phoneNumber" : {
                required: 'Vui lòng nhập số điện thoại'
            },
			"auth-body__email": {
                email: 'Email chưa đúng định dạng',
				required: 'Vui lòng nhập email'
			},
			"auth-body__password": {
				required: 'Vui lòng nhập mật khẩu'
			},
			"auth-body__rePassword": {
				equalTo: "Mật khẩu nhập lại chưa đúng"
			}
		},

        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
              $(placement).append(error)
            } else {
              error.insertAfter(element);
            }
        },

        submitHandler: function(form) {
            $.ajax({
                type:"POST",
                url: './Register/Auth',
                data:  $(form).serialize(),
                dataType: 'JSON',
                success:function(feedback){
                    if (feedback.status == 'success')
                    {
                        
                        alert(feedback.message)
                    }
                    else{
                       
                       alert(feedback.message)  
                    }
                    
                },
                error: function(feedback){
                   alert('Lỗi gửi dữ liệu lên server')
                }
            });
        }
    })
    // *******Hiện mật khẩu
    var signupPassword = $('#modal-body-signup__password');
    var signupRePassword = $('#modal-body-signup__rePassword');
    $('#modal-body-signup__showPassword').click(function() {
        if ($(this).is(':checked')) {
            signupPassword.attr('type', 'text');
            signupRePassword.attr('type', 'text');
        }
        else {
            signupPassword.attr('type', 'password');
            signupRePassword.attr('type', 'password');
        }
      });

    let validatorSignin = $("#modal-body__signin").validate({
		rules: {
            "auth-body-signin__account" : {
                required: true,
            },
            "auth-body-signin__password" : {
                required: true,
                validatePassword: true
            }
		},
		messages: {
            "auth-body-signin__account" : {
                required: 'Vui lòng nhập số điện thoại hoặc email',
            },
            "auth-body-signin__password" : {
                required: 'Vui lòng nhập mật khẩu'
            }
		},

        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
              $(placement).append(error)
            } else {
              error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            $.ajax({
                type:"POST",
                url: './Login/LoginUser',
                data:  $(form).serialize(),
                dataType: 'JSON',
                success:function(feedback){
                    if (feedback.status == 'success')
                    {
                        
                        alert(feedback.message)
                    }
                    else{
                       
                       alert(feedback.message)  
                    }
                },
                error: function(feedback){
                   alert('Lỗi gửi dữ liệu lên server')
                }
            });
        }
        
    })
    // Hiện mật khẩu khi đăng nhập
    var signinPassword = $('#modal-body-signin__password');
    $('#modal-body-signin__showPassword').click(function() {
        if ($(this).is(':checked')) {
            signinPassword.attr('type', 'text');
        }
        else {
            signinPassword.attr('type', 'password');
        }
    });

    function cleanForm(){
        validatorSignup.resetForm();
        validatorSignin.resetForm();
        document.getElementById('modal').style.display='none';
        document.getElementsByClassName('modal-body__showPassword').checked= false;
        signinPassword.attr('type', 'password');
        signupPassword.attr('type', 'password');
        signupRePassword.attr('type', 'password');
        $('#modal-body__signup').trigger("reset");
        $('#modal-body__signin').trigger("reset");

    }
    $('#modal__overlay').on('click', function(){
        cleanForm();
    });
    $('.btn--back').on('click', function(){
        cleanForm();
    });
})