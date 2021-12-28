import * as asset from "../general/index.js";
//--------------Select product type event--------------
let productTypeLists = $('.product-type .list-type');

productTypeLists.each(function (index, productTypeList) {
    $(this).children('.list-type__item').on('click', function () {
        showStyle($(this));
        showPrice($(this));
        showQuantity($(this));
    });
});
function showQuantity(element) {
    if (element.attr('quantity')){
        let quantitys = $('.number-quantity');
        quantitys.text(element.attr('quantity'));
    }
}
function showStyle(element) {
    element.parent().children('.list-type__item.active').removeClass('active');
    element.addClass('active');
}
function showPrice(element) {
    if (element.attr('price'))
        $('.fs-product-price').text(
            Math.round(element.attr('price')).toLocaleString('it-IT', {
                style: 'currency',
                currency: 'VND',
                })
        );
}
//----------------Rating event--------------------
$('.overview-filter-item').on('click', function () {
    $(this).parent().children('.overview-filter-item.active').removeClass('active');
    $(this).addClass('active');
});

(function ratingEvent () {

    let filterBtns = document.querySelectorAll('.overview-filter-item')
    let productPage = document.querySelector('.product-page');

    Array.from(filterBtns).forEach((filterBtn, index) => {
        filterBtn.onclick = () => {

            let data = {
                id: productPage.dataset.id,
                star: Math.abs(index - 6),
            }

            // Post method here
            let addCartUrl = './ProductDetail/getRating'
            let options = {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(data)
                        }
            fetch(addCartUrl, options)
                .then((response) => {
                    return response.json()
                })
                .then((data) => {
                    if (data.status == 'success')
                    {
                        renderUI(data)
                    }
                    else if (data.status == "error")
                        alert(data.msg)
                })
                .catch((error) =>{
                    alert(error)
                })
        }
    })

    function renderUI(data) {
        
        let templateRaing = ``
        if (data)
        {
            data.forEach(element => {
                
            })
        }
    }

})();


//----------------Product Buy Now--------------------

const buyNow = $('#product-buy__btn');

buyNow.on('click', function () {  

    // Get product type
    let productType = $('.list-type__item.active');
    let productTypeId = productType.attr('id');
    let productTypeQty = $('.carousel-quantity__number')[0].value;
    if (!isEmpty(productType)){
        window.location.replace("./Order/load/" +  productTypeId + "?productTypeQty=" + productTypeQty);
    }
    else {
        asset.notification_inline({
            element: '#quantity-notification',
            class: 'alert-danger',
            msg: 'Bạn chưa chọn loại hàng'
        });
    }
})