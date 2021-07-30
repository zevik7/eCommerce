// $(document).ready(function () {
//     $('.personal-sidebar__item:first').find('li').slideDown(300);
// });
  
//   /*--------Events for sidebar----------*/
// $('.personal-sidebar__nav').click(function () {
//     // slide down and switch page
//     $(this).siblings().find('li').slideDown(300);
//     switchPersonal($(this).attr('href'));
//     // active
//     $(this).addClass('personal-active');
//     $(this).siblings().find('li').removeClass('personal-active');
//     $(this).siblings().find('li:first').addClass('personal-active');
//     switchPersonal($(this).siblings().find('li:first').attr('href'));
//     $(this).parent().siblings().find('span').removeClass('personal-active');
//     $(this).parent().siblings().find('li').removeClass('personal-active');
//     $(this).parent().siblings().find('li').slideUp(300);
  
// });
  
// $(document).on('click', '.js-trigger-profile', function (e) {
//     $("#js-trigger-profile").trigger('click');
// });
  
  
// $('.personal-sidebar__subnav-item').click(function () {
//     $(this).addClass('personal-active');
//     $(this).siblings().removeClass('personal-active');
//     switchPersonal($(this).attr('href'));
// });
  
// //Switch
// function switchPersonal(select) {
//     $(select).show();
//     $(select).siblings().hide();
// }
  
// /**---------Personal Account---------- */
// //hide email
// function hideEmail(email) {
//     return email.replace(/(.{2})(.*)(?=@)/,
//       function (gp1, gp2, gp3) {
//         for (let i = 0; i < gp3.length; i++) {
//           gp2 += "*";
//         }
//         return gp2;
//       });
// };
// let email = hideEmail($('.customize-email').html());
//     $('.customize-email').html(email);
  
// //hide phone number
// let phone = $('.customize-phone').html();
//     phone = phone.slice(-2);
//     let hidePhone = "********";
//     $('.customize-phone').html(hidePhone.concat(phone));

// // validate
// $.validator.addMethod('notContainNumber',function(value, element){
// return this.optional(element) || (/^([^0-9]*)$/).test(value);
// }, 'Tên không được phép chứa số');

// $.validator.addMethod('validPhoneNumber',function(value, element){
//     return this.optional(element) || (/(84|0[3|5|7|8|9])+([0-9]{8})\b/).test(value);
// }, 'Số điện thoại không hợp lệ');

// // Edit username or avatar
// $('.profile__form').validate({
//     rules: {

//         "profile-username" : {
//             required: true,
//             maxlength: 100,
//             notContainNumber: true
//         }
//     },
//     messages: {

//         "profile-username" : {
//             required: 'Vui lòng nhập tên hiển thị',
//             maxlength: 'Tối đa là 100 ký tự'
//         }
//     },
//     errorClass: 'error-username',
//     errorPlacement: function(error, element) {
//         var inputBox = $(element).parent();
//         error.insertAfter(inputBox); 
//     },
//     highlight: function(element, errorClass, validClass) {
//         $(element).addClass('error-input');
//     },
//     unhighlight: function(element, errorClass, validClass) {
//         $(element).removeClass('error-input'); 
//     },
//     submitHandler: function(form) {
//         $.ajax({
//             type: "POST",
//             url: './Personal/Edit',
//             data:  new FormData(form),
//             dataType: "JSON",
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: function (feedback) {
//                 switch (feedback.status) {
//                     case 'success':
//                         successAlert();
//                         setTimeout(function(){ window.location = window.location; }, 1100);
//                     break;
//                     default:  alert(feedback.message);
//                 }
//             },
//             error: function () {
//             alert(feedback.message);
//             }
//         });
//     }
// });
// // success alert
// function successAlert(){
//     $(".modal__update-success").fadeIn();
//     $(".modal__update-success").fadeOut(1000);
// }
// // failed alert
// function failedAlert(){
//     $(".modal__update-failed").fadeIn();
//     $(".modal__update-failed").fadeOut(2000);
// }

// // update email confirm
// $('.update-email__form-confirm').validate({
//     rules: {

//         "email__password-confirm" : {
//             required: true,
//         }
//     },
//     messages: {

//         "email__password-confirm" : {
//             required: 'Vui lòng nhập tên hiển thị',
//         }
//     },
//     errorClass: 'error-label', 
//     errorPlacement: function(error, element) {
//         $('.wrong-password').empty();
//         var inputBox = $('.wrong-password');
//         error.appendTo(inputBox);
//     },
//     submitHandler: function(form) {
//         $.ajax({
//             type: "POST",
//             url: './Personal/UpdateConfirm',
//             data:  new FormData(form),
//             dataType: "JSON",
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: function (feedback) {
//                 switch (feedback.status) {
//                     case 'success':
//                         switchPersonal('.update-email__change');
//                     break;
//                     default:
//                         $('.wrong-password').empty();
//                         $(".wrong-password").append("Mật khẩu chưa chính xác vui lòng nhập lại");
//                     }
//             },
//             error: function () {
//                 alert('Lỗi gửi dữ liệu lên server');
//             }
//         });
//     }
// });
// // update phone confirm
// $('.update-phone__form-confirm').validate({
//     rules: {
//         "phone__password-confirm" : {
//             required: true,
//         }
//     },
//     messages:{
//         "phone__password-confirm" : {
//             required: 'Vui lòng nhập tên hiển thị',
//         }
//     },
//     errorClass: 'error-label', 
//     errorPlacement: function(error, element) {
//         $('.wrong-password').empty();
//         var inputBox = $('.wrong-password');
//         error.appendTo(inputBox);
//     },
//     submitHandler: function(form) {
//         $.ajax({
//             type: "POST",
//             url: './Personal/UpdateConfirm',
//             data:  new FormData(form),
//             dataType: "JSON",
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: function (feedback) {
//                 switch (feedback.status) {
//                     case 'success':
//                         switchPersonal('.update-phone__change');
//                     break;
//                     default:
//                         $('.wrong-password').empty();
//                         $(".wrong-password").append("Mật khẩu chưa chính xác vui lòng nhập lại");
//                     }
//             },
//             error: function () {
//                 alert('Lỗi gửi dữ liệu lên server');
//             }
//         });
//     }
// });
// // email change
// $('.update-email__form-change').validate({
//     rules: {

//         "update-email" : {
//             required: true,
//             email: true
//         }
//     },
//     messages:{

//         "update-email" : {
//             required: 'Vui lòng nhập địa chỉ email',
//             email: 'Email chưa đúng định dạng'
//         }
//     },
//     errorClass: 'wrong-password', 
//     errorPlacement: function(error, element) {
//         $('.wrong-password').empty();
//         var inputBox = $(element).parent();
//         error.insertAfter(inputBox);
//     },
//     submitHandler: function(form) {
//         $.ajax({
//             type: "POST",
//             url: './Personal/UpdateEmail',
//             data:  new FormData(form),
//             dataType: "JSON",
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: function (feedback) {
//                 switch (feedback.status) {
//                     case 'success':
//                         successAlert();
//                         setTimeout(function(){ window.location = window.location; }, 1100);
//                     break;
//                     default: 
//                         alert(feedback.message);
//                     }
//             },
//             error: function () {
//                 alert('Lỗi gửi dữ liệu lên server');
//             }
//         });
//     }
// });

// $('.profile-back__btn').click(function(){
//     window.location = window.location;
// });
// $('.update-phone__form-change').validate({
//     rules: {
//         "update-phone" : {
//             required: true,
//             validPhoneNumber: true
//         }
//     },
//     messages:{
//         "update-phone" : {
//             required: 'Vui lòng nhập nhập số điện thoại',
//             validPhoneNumber: 'Số điện thoại chưa đúng định dạng'
//         }
//     },
//     errorClass: 'wrong-password', 
//     errorPlacement: function(error, element) {
//         $('.wrong-password').empty();
//         var inputBox = $(element).parent();
//         error.insertAfter(inputBox);
//     },
//     submitHandler: function(form) {
//         $.ajax({
//             type: "POST",
//             url: './Personal/UpdatePhone',
//             data:  new FormData(form),
//             dataType: "JSON",
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: function (feedback) {
//                 switch (feedback.status) {
//                     case 'success':
//                         successAlert();
//                         setTimeout(function(){ window.location = window.location; }, 1100);
//                     break;
//                     default: 
//                         alert(feedback.message);
//                     }
//             },
//             error: function () {
//                 alert('Lỗi gửi dữ liệu lên server');
//             }
//         });
//     }
// });

// //Hiển thị hình ảnh khi upload
// function readURL(input) {
//     if (input.files && input.files[0]) {
//       var reader = new FileReader();
//       reader.onload = function (e) {
//         $('#personal-avatar').attr('src', e.target.result);
//       };
//       reader.readAsDataURL(input.files[0]);
//     }
// }


// $('.update-password__form').validate({
//     rules: {
//         "old-password" : {
//             required: true,
//         },
//         "new-password" : {
//             required: true,
//             minlength: 8
//         },
//         "re-new-password" : {
//             equalTo: "#new-password"
//         }
//     },
//     messages:{
//         "old-password" : {
//             required: 'Vui lòng nhập mật khẩu hiện tại',
//         },
//         "new-password" : {
//             required: 'Vui lòng mật khẩu mới',
//             minlength: 'Mật khẩu có ít nhất 8 kí tự'
//         },
//         "re-new-password" : {
//             equalTo: "Mật khẩu nhập lại chưa đúng"
//         }
//     },
//     errorClass: 'error-password', 
//     errorPlacement: function(error, element) {
//         var inputBox = $(element).parent();
//         error.insertAfter(inputBox); 
//     },
//     highlight: function(element, errorClass, validClass) {
//         $(element).addClass('error-input');
//     },
//     unhighlight: function(element, errorClass, validClass) {
//         $(element).removeClass('error-input'); 
//     },
//     submitHandler: function(form) {
//         $.ajax({
//             type: "POST",
//             url: './Personal/UpdatePassword',
//             data:  new FormData(form),
//             dataType: "JSON",
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: function (feedback) {
//                 switch (feedback.status) {
//                     case 'success':
//                         successAlert();
//                         setTimeout(function(){ window.location = window.location; }, 1100);
//                     break;
//                     default: 
//                         failedAlert();
//                     }
//             },
//             error: function () {
//                 alert('Lỗi gửi dữ liệu lên server');
//             }
//         });
//     }
// });



// /**----------Personal Purchase---------- chưa hoàn thiện */ 
//   $('.personal-purchase__header-nav').click(function () {
//     $(this).css({ "color": "#045762", "border-bottom": "2px solid #045762" });
//     $(this).siblings().css({ "color": "#333", "border-bottom": "2px solid #dee2e6" });
//   });
  
//   $(".personal-purchase__all-search input").on({
//     focus: function () {
//       $(".search-icon i").css("color", "#333");
//     },
//     blur: function () {
//       $(".search-icon i").css("color", "#999");
//     }
//   });
  
//   $('.personal-purchase__header-nav').click(function () {
//     switchPersonal($(this).attr('href'));
//   });