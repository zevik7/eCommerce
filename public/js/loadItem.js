$(document).ready(function() {
    //Load item when load page
    $.ajax({  
        url:"/CommerceWebProject/php/loadItem.php",
        method:"POST",
        dataType:'html',
        success:function(data)
        {   
            $("#product_listItem").html(data);
        },
        error:function()
        {
            alert("Lỗi load item");
        }
    }); 
    //Load catetogy when clicking category
    $(".category-list__link").click(function(event) {
        var nameCategory=event.target.id;
        //Bo to mau nhung id con lai
        //document.getElementById(nameCategory).style.background="red";
        $.ajax({  
            url:"/CommerceWebProject/php/loadItem.php",
            method:"POST",
            data: {nameCategory:nameCategory},
            dataType:'html',
            success:function(data)
            {   
                $("#product_listItem").html(data); 
            },
            error:function(data)
            {
                alert("Lỗi load item");
            }
        }); 
    });
    //load item cart
    $.ajax({  
        url:"/CommerceWebProject/php/loadCart.php",
        method:"POST",
        dataType:'html',
        success:function(data)
        {   
            $("#cartItemList").html(data);
        },
        error:function()
        {
            alert("Lỗi load item");
        }
    }); 

    $('#payBtn').click(function(){  
        window.location.href = "/CommerceWebProject/pay/index.php";
    });
});