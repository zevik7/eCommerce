export default function notification_modal(
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