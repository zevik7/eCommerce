let notification_modal = function (
    msg = 'Thông báo', 
    success = true, 
    duration = false) {

    let modalNoti = $('.js-modal-noti');
    let modalNotiBody = $('.js-modal-noti').children('.js-modal-body');
    modalNotiBody.children('.js-modal-body__msg').text(msg);
    modalNoti.removeClass('modal-noti--error modal-noti--success');
    if (success == true)
    {
        modalNoti.addClass('modal-noti--success');
    }
    else{
        modalNoti.addClass('modal-noti--error');
    }
    modalNoti.fadeIn();
    if (duration !== false){
        modalNoti.fadeOut(duration);
    }
    //Close when click button or outside
    modalNoti.children('.js-modal-overlay').on('click', function () {
        modalNoti.fadeOut();
    })
    modalNotiBody.children('.js-close-button').on('click', function () {
        modalNoti.fadeOut();
    })
}
let notification_inline = function (
    msg = 'Thông báo', 
    type = 'alert-success', 
    duration = false) {

    let inlineAlert = $('.js-alert');
    inlineAlert.text(msg);
    inlineAlert.removeClass('alert-success alert-danger alert-info alert-warning');
    inlineAlert.addClass(type);
    inlineAlert.fadeIn();
    if (duration !== false){
        inlineAlert.fadeOut(duration);
    }
}
let rm_notification_inline = function(){
    let inlineAlert = $('.js-alert');
    inlineAlert.fadeOut();
}

export {notification_modal, notification_inline, rm_notification_inline}