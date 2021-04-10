//get form when click signup or login button
function getForm(value)
{
   document.getElementById('form').style.display='flex';
    if(value==='signup'){
        //Hien form dang ki
        document.getElementById('form-body__signup').style.display='block';
        document.getElementById('form-body__signupSocial').style.display='flex';
        //Hide form signin
        document.getElementById('form-body__signin').style.display='none';
        document.getElementById('form-body__signinSocial').style.display='none';
    }
    else{
        document.getElementById('form-body__signin').style.display='block';
        document.getElementById('form-body__signinSocial').style.display='flex';
        //Hide form signup
        document.getElementById('form-body__signup').style.display='none';
        document.getElementById('form-body__signupSocial').style.display='none';
    }
}
function hideForm()
{
    document.getElementById('form').style.display='none';
}
// Xu li Signup modal bang jquery ajax
$(document).ready(function(){
    $('#form-body-signup__signupBtn').click(function(){
        var phoneNumber = $('#form-body-signup__phoneNumber').val(); 
        var email = $('#form-body-signup__email').val();
        var password = $('#form-body-signup__password').val();
        var rePassword=$('#form-body-signup__rePassword').val();
        var address=$('#form-body-signup__address').val();
        var nameAccount=$('#form-body-signup__nameAccount').val();
        var error=0;
        var MsgAlert="Thông tin không hợp lệ:\n";
        ///Kiem tra du lieu dau vao
            if (phoneNumber == '' || email == '' || password=='' || rePassword=='' || address==''||nameAccount==''){
                MsgAlert+="- Không trường nào được để trống\n";
                ++error;
            }
            //Kiem tra dinh dang phoneNumber
            if (phoneNumber.length!=10||!$.isNumeric(phoneNumber))
            {
                MsgAlert+="- Số điện thoại gồm 10 ký số\n";
                ++error;
            }
            //Kiem tra dinh dang password
            if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,24}$/.test(password))
            {
                MsgAlert+="- Mật khẩu phải có 6 đến 24 kí tự, phải chứa ít nhất 1 kí số và 1 kí tự\n";
                ++error; 
            }
            //Kiem tra repassword==password
            if (password!=rePassword)
            {  
                MsgAlert+="- Mật khẩu nhập lại chưa đúng !\n";
                ++error;
            }
            //Kiem tra dinh dang email
            if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email))
            {
                MsgAlert+="- Email phải có dạng user@gmail.com!";
                ++error;
            }
        if(error==0)  
        {
            $.ajax({  
                url:"/CommerceWebProject/php/registration.php",
                method:"POST",
                data: {phoneNumber:phoneNumber,email:email,password:password,address:address,nameAccount:nameAccount},
                dataType:'text',
                success:function(data) 
                {   
                    if(data == 'No')  
                    {  
                        alert("Tài khoản đã tồn tại !"); 
                        return false;
                    }  
                    else
                    {  
                        alert("Đăng kí thành công !");
                        $('#form').hide();  
                        location.reload();
                    }  
                },
                error:function(data)
                {
                    alert("Không thể kết nối tới Server");
                    return false;
                }
            });  
        }  
        else  
        {  
            alert(MsgAlert);
            return false;
        }  
    });
    //Xu li form dang nhap
    $('#form-body-signin__signinBtn').click(function(){
        var account = $('#form-body-signin__account').val();
        var password = $('#form-body-signin__password').val();
        var error=0;
        var MsgAlert="Thông tin không hợp lệ:\n";
        ///Kiem tra du lieu dau vao
        if (account == '' || password==''){
            MsgAlert+="- Không trường nào được để trống\n";
            ++error;
        }
        if(error==0)  
        {
            $.ajax({  
                url:"/CommerceWebProject/php/signin.php",
                method:"POST",
                data: {account:account,password:password},
                success:function(data) 
                {   
                    if(data == 'Yes')  
                    {  
                        $('#form').hide();  
                        location.reload();
                    }  
                    else
                    {  
                        alert(data);
                        alert("Tài khoản hoặc mật khẩu sai !"); 
                        return false;
                    }  
                },
                error:function(data)
                {
                    alert("Không thể kết nối tới Server");
                    return false;
                }
            });  
        }  
        else  
        {  
            alert(MsgAlert);
            return false;
        }  
    });
    $('#nav-list-user-menu__logout').click(function(){
        var action = "logout";  
           $.ajax({  
                url:"/CommerceWebProject/php/signin.php",  
                method:"POST",  
                data:{action:action},  
                success:function()  
                { 
                    window.location.reload();  
                }  
           });  
    });
});
