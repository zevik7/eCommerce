let notification_modal = function (config) {
    let modal = $(config.modal);
    let overlay = modal.find(config.modalOverlay);
    let msgElement = modal.find(config.msgElement);
    let closeBtn = modal.find(config.closeBtn);
    let defaultClasses = 'modal-noti--error modal-noti--success';
    // Set text
    msgElement.text(config.msg);
    // Remove classes
    modal.removeClass(defaultClasses);
    // Add class
    modal.addClass(config.class)
    // Show modal
    modal.fadeIn();
    // Close when click button or overlay
    overlay.on('click', function () {
        modal.fadeOut('fast');
    })
    closeBtn.on('click', function () {
        modal.fadeOut('fast');
    })
    // Auto close
    if (config.autoClose){
        setTimeout(function (){
            modal.fadeOut('fast');
        }, config.autoClose);
    }
}

let notification_inline = function (config) {
    let notiElement = $(config.element);
    let notiClasses = 
        'alert-success alert-danger alert-info alert-warning';
    notiElement.text(config.msg);
    notiElement.removeClass(notiClasses);
    notiElement.addClass(config.class);
    notiElement.fadeIn();
    if (config.duration){
        notiElement.fadeOut(duration);
    }
}

let rm_notification_inline = function(config){
    $(config.notiElement).fadeOut();
}

export {notification_modal, notification_inline, rm_notification_inline}