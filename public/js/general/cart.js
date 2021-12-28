
//----------------Add to cart--------------------
function isEmpty( el ){
    return !$.trim(el.html())
}
const addToCart = $('#product-add-cart__btn');

addToCart.on('click', function () {
    // Get product type
    let productType = $('.list-type__item.active');
    let productTypeId = productType.attr('id');
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
                if (data.status == 'not authorized')
                    alert('Dang nhap di')
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
/* 
    Delete cart 
*/
let delBtns = 
    document.querySelectorAll('.head-cart__item .item-delete')
let qtyNum =
    document.querySelector('.head-cart__quantity')

Array.from(delBtns).forEach((delBtn) => {

    // Get item element to delete
    let itemElement = delBtn.closest('.head-cart__item')

    delBtn.onclick = function ()
    {
        let data = {
            id: this.dataset.id
        }

        // Post method here
        let addCartUrl = './ProductDetail/rmCart'
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
                    itemElement.remove()
                    qtyNum.value -= 1

                    alert('Thêm giỏ hàng thành công');
                }
                else if (data.status == "error")
                    alert(data.msg)
            })
            .catch((error) =>{
                alert(error)
            })
    }
})