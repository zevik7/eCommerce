import * as noti from "./notification.js";
const config = {
    root: '.carousel-quantity',
    plus: '.carousel-quantity__plus',
    minus: '.carousel-quantity__minus',
    input: '.carousel-quantity__number',
    quantity: {
        box: '.quantity-count__text',
        num: '.number-quantity'
    },
    msgError: {
        numInvalid: 'Số lượng không hợp lệ',
        numLtZero: 'Số lượng sản phẩm không hợp lệ',
        numGtTotal: 'Số lượng sản phẩm vượt quá giới hạn'
    }
};

function getValue(val) {
    let parseNum = parseInt(val.replace(/\s\s+/g, ' '), 10);
    if (!parseNum) {
        noti.notification_inline({
            notiElement: '#quantity-notification',
            class: 'alert-danger',
            msg: config.msgError.numInvalid
        });
    }
    else {
    }
    return parseNum;
}
let inputQuantity = $(config.root);
inputQuantity.each(function () {
    let $this = $(this);
    let plus = 
        $this.children(config.plus);
    let minus = 
        $this.children(config.minus);
    let input = 
        $this.children(config.input);
    let quantityElement =  
        $this.next(config.quantity.box)
        .children(config.quantity.num);
        
    plus.on('click', function () {
        let currentQuanity = getValue(quantityElement.text());
        input.val(function(i, currentVal) {
            if (currentVal > 0)
            {
                ++ currentVal;
                let newNumber = currentQuanity - 1;
                quantityElement.text(newNumber);
            }
            return currentVal;
        });
    });
    minus.on('click', function () {
        let currentQuanity = getValue(quantityElement.text());
        input.val(function(i, currentVal) { 
            if (currentVal > 1)
            {
                --currentVal;
                let newNumber = currentQuanity + 1;
                quantityElement.text(newNumber);
            }
            return currentVal;
        });
    });

    input.on('keyup', function() {
        if (this.value <= 0)
            noti.notification_inline({
                element: '#quantity-notification',
                class: 'alert-danger',
                msg: config.msgError.numLtZero
            });
        else if (this.value > getValue(quantityElement.text()))
            noti.notification_inline({
                element: '#quantity-notification',
                class: 'alert-danger',
                msg: config.msgError.numGtTotal
            });
        else 
            noti.rm_notification_inline({
                notiElement: '#quantity-notification'
            });
    })
});