$(function () {
    //--------------Select product type event--------------
    let productTypeLists = $('.fs-product-type .fs-list-type');
    let productTypeSubList = $('.fs-product-type-sub .fs-list-type-sub');
    let productTypeSubDisplay = $('.fs-product-type-sub .fs-list-type-display-first');

    productTypeLists.each(function (index, productTypeList) {
        $(this).children('.list-type__item').on('click', function () {
            productTypeSubDisplay.css('display', 'none');
            showStyle($(this));
            showPrice($(this));
            showQuantity($(this));
            showSubType($(this).attr('id'));
        });
    });
    function showQuantity(element) {
        if (element.attr('quantity')){
            let quantitys = $('.fs-number-product-quantity');
            quantitys.text(element.attr('quantity'));
        }
    }
    function showStyle(element) {
        //Set css
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
    function showSubType(parentId) {
        let seen = {};
        //unset active
        productTypeSubList.children('.list-type__item.active').removeClass('active')
        productTypeSubList
            .children('.list-type__item')
            .each(function () {
                let txt = $(this).attr('name');
                if (!seen[txt] && $(this).attr('parentId') == parentId)
                {
                    seen[txt] = true;
                    $(this).css('display', 'inline-flex');
                    $(this).on('click', function () {
                        showStyle($(this));
                        showPrice($(this));
                        showQuantity($(this));
                    });
                }
                else{
                    $(this).css('display', 'none');
                }
            })
    }
    //----------------Rating event--------------------
    $('.overview-filter-item').on('click', function () {
        $(this).parent().children('.overview-filter-item.active').removeClass('active');
        $(this).addClass('active');
    });
});
    