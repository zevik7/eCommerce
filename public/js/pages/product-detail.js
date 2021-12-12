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

//----------------Add to cart--------------------
function isEmpty( el ){
    return !$.trim(el.html())
}
const addToCart = $('#product-add-cart__btn');

addToCart.on('click', function () {  
    // Get product type
    let productType = $('.list-type__item.active');
    let productTypeId = productType.attr('id');
    console.log(productTypeId);
    let productTypeQty = $('.carousel-quantity__number')[0].value;
    if (!isEmpty(productType)){
        let data = {
            productTypeId,
            productTypeQty
        }
        // Post method here
        let addCartUrl = './ProductDetail/addCart';
        let options = {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    }
        fetch(addCartUrl, options)
            .then((response) => {
                 return response.json();
            })
            .then((data) => {
                if (data.status == 'success')
                    addCartUI();
                else 
                    // Modal notification
                    asset.notification_modal({
                        // Element
                        modal: '.modal-noti',
                        modalOverlay: '.modal-overlay',
                        msgElement: '.modal-body__msg',
                        closeBtn: '.modal-body__close-button',
                        // Custom attribute
                        autoClose: 1000,
                        class: 'modal-noti--error',
                        msg: data.message
                    });
            })
            .catch((error) => {
                alert(error);
            })
    }
    else {
        asset.notification_inline({
            element: '#quantity-notification',
            class: 'alert-danger',
            msg: 'Bạn chưa chọn loại hàng'
        });
    }
})
function addCartUI() {
    let itemName = $('.product-title__txt').text().trim();
    let itemPrice = $('.product-price').text().trim();
    let itemQty = $('.carousel-quantity__number').val();
    let itemType = $('.list-type__item.active').text().trim();
    let itemImg = $('#product-image-thumb').attr('src').trim();

    let itemElement = `<li class="head-cart__item">
                            <div class="item-img">
                                <img src="${itemImg}" alt="">
                            </div>
                            <div class="item-info">
                                <div class="item-info__header">
                                    <h5 class="item-info__title title-reset">
                                    ${itemName}
                                    </h5>
                                    <span class="item-info__price">
                                        Giá: 
                                        ${itemPrice}
                                    </span>
                                    <span class="item-info__quantity">
                                        x ${itemQty}
                                    </span>
                                </div>
                                <div class="item-info__body">
                                    <span class="item-info__type">
                                        Phân loại hàng: ${itemType}
                                    </span>
                                    <input class="item-delete btn btn-third" type="button" value="Xoá">
                                </div>
                            </div>
                        </li>`;
    // Append to cart element
    $('#cart-list').append(itemElement);
    // Modal notification
    asset.notification_modal({
        // Element
        modal: '.modal-noti',
        modalOverlay: '.modal-overlay',
        msgElement: '.modal-body__msg',
        closeBtn: '.modal-body__close-button',
        // Custom attribute
        autoClose: 1000,
        class: 'modal-noti--success',
        msg: 'Thành công'
    });
    // Increase cart quantity number
    let currentVal = 
        asset.getValue($('.head-cart__quantity').text());
    $('.head-cart__quantity').text(++currentVal);
}
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