$(document).ready(function(){
    $("#nav-list__signupBtn").click(function(){
        getFormSignup()
    });

    $("#nav-list__signinBtn").click(function(){
        getFormSignin()
    });
});


function getFormSignup(){
    $('#js-modal').css('display', 'block');
    $('#js-modal-signup').css('display', 'block');
    $('#js-modal-signin').css('display', 'none');
}
function getFormSignin(){
    $('#js-modal').css('display', 'block');
    $('#js-modal-signup').css('display', 'none');
    $('#js-modal-signin').css('display', 'block');
    
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
    let validatorSignup = $("#js-modal-signup").validate({
		rules: {
            "modal-signup__username" : {
                required: true,
                maxlength: 100,
                notContainNumber: true
            },
            "modal-signup__phone" : {
                required: true,
                notContainLetter: true
            },
			"modal-signup__email": {
                email: true,
				required: true
			},
			"modal-signup__password": {
				required: true,
                validatePassword: true
			},
			"modal-signup__repassword": {
				equalTo: "#modal-signup__password", 
                validatePassword: true
			}
		},
		messages: {
            "modal-signup__username" : {
                required: 'Vui lòng nhập tên hiển thị',
                maxlength: 'Tối đa là 100 ký tự',
            },
            "modal-signup__phone" : {
                required: 'Vui lòng nhập số điện thoại'
            },
			"modal-signup__email": {
                email: 'Email chưa đúng định dạng',
				required: 'Vui lòng nhập email'
			},
			"modal-signup__password": {
				required: 'Vui lòng nhập mật khẩu'
			},
			"modal-signup__repassword": {
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
    var signupPassword = $('#modal-signup__password');
    var signupRePassword = $('#modal-signup__repassword');
    $('#show-pass__signup').click(function() {
        if ($(this).is(':checked')) {
            signupPassword.attr('type', 'text');
            signupRePassword.attr('type', 'text');
        }
        else {
            signupPassword.attr('type', 'password');
            signupRePassword.attr('type', 'password');
        }
      });

    let validatorSignin = $("#js-modal-signin").validate({
		rules: {
            "modal-signin__account" : {
                required: true,
            },
            "modal-signin__password" : {
                required: true,
                validatePassword: true
            }
		},
		messages: {
            "modal-signin__account" : {
                required: 'Vui lòng nhập số điện thoại hoặc email',
            },
            "modal-signin__password" : {
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
    var signinPassword = $('#modal-signin__password');
    $('#show-pass__signin').click(function() {
        if ($(this).is(':checked')) {
            signinPassword.attr('type', 'text');
        }
        else {
            signinPassword.attr('type', 'password');
        }
    });

    function cleanForm(){   
        $('#js-modal').css('display', 'none');
        validatorSignup.resetForm();
        signupPassword.attr('type', 'password');
        signupRePassword.attr('type', 'password');
        $('#js-modal-signup').trigger("reset");
        validatorSignin.resetForm();
        signinPassword.attr('type', 'password');
        $('#js-modal-signin').trigger("reset");

    }
    $("#js-modal-overlay").click(function(){
        cleanForm();
    });
   
    $('#modal-signup__back').on('click', function(){
        cleanForm();
    });
    $('#modal-signin__back').on('click', function(){
        cleanForm();
    });
})