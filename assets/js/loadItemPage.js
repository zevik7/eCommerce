$(document).ready(function() {
    //Load item page when clicking item
    $(document).on('click', '.product__item',function(event){
        var idItem=$(this).attr('id');
        event.preventDefault();
        $.ajax({  
            url:"/CommerceWebProject/php/loadItemPage.php",
            method:"POST",
            data: {idItem:idItem},
            success:function()
            {
                window.location.href = "/CommerceWebProject/product/index.php";
            },
            error:function()
            {
                alert("Lỗi load item");
            }
        }); 
    });
});