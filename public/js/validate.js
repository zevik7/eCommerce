
alert('a');
let validatorSignup = $("#signupForm").validate({
    // onfocusout: false,
    // onkeyup: false,
    // onclick: false,
    rules: {
        "auth-body__phoneNumber" : {
            required: true,
            maxLength100: true,
            notContainNumber: true
        },
        "auth-body__email": {
            email:true,
            required: true,
            maxLength100: true
        },
        "auth-body__password": {
            required: true,
            minlength: 6,
            maxLength100: true
        },
        "auth-body__rePassword": {
            equalTo: "#modal-body-signup__password", 
            minlength: 6,
            maxLength100: true
        }
    }
    // ,
    // messages: {
    //     "signupName" : {
    //         required: 'Vui lòng nhập tên hiển thị'
    //     },
    //     "signupEmail": {
    //         email: 'Email chưa đúng định dạng',
    //         required: 'Vui lòng nhập email'
    //     },
    //     "signupPass": {
    //         required: 'Vui lòng nhập mật khẩu',
    //         minlength: 'Mật khẩu phải có ít nhất 6 kí tự'
    //     },
    //     "signupRepass": {
    //         equalTo: "Mật khẩu nhập lại chưa đúng"
    //     }
    // }
    //,
    // submitHandler: function(form) {
    //     $.ajax({
    //         type:"POST",
    //         url: './Register/RegisterSubmit',
    //         data:  $(form).serialize(),
    //         dataType: 'JSON',//The type of data returned
    //         success:function(feedback){
    //             if (feedback.status == 'success')
    //             {
    //                 shakeModal(feedback.message, 'success');
    //             }
    //             else{
    //                 shakeModal(feedback.message);
    //             }
    //         },
    //         error: function(feedback){
    //             alert('Lỗi gửi dữ liệu lên server')
    //         }
    //     });
    // }
    // if(name.length != "" && email.length != "" && password.length != ""){
    //     $.ajax({
    //       type: "POST",
    //       url : "signup.php",
    //       data : {"name": name, "email": email, 'password': password},
    //       dataType: 'JSON',
    //       success : function(feedback){
    //           if(feedback.status === "error"){
    //               $(".email").addClass("is-invalid");
    //               $(".emailError").html(feedback.message);
    //           } else if(feedback.status === "success"){
    //                window.location = "login.php";
    //           }
    //       }
    //    })
    //  }
})