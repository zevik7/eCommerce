import * as asset from "../general/index.js";
$(function () {
    //--------------Select product type event--------------
    let productTypeLists = $('.fs-product-type .fs-list-type');

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
    //-----------------Add to cart-------------
    $('#product-add-cart__btn').on('click', function (params) {
        asset.notification_inline('Bạn chưa chọn ', 'alert-warning');
    })
    //----------------Rating event--------------------
    $('.overview-filter-item').on('click', function () {
        $(this).parent().children('.overview-filter-item.active').removeClass('active');
        $(this).addClass('active');
    });
});
    