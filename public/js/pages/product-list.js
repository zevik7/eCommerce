// Active category item
let categoryBar = $('#category-bar__list');
let activeId = categoryBar.attr('activeItem');
if (activeId) {
    let activeItems = $('.fs-category-bar__item');
    activeItems.each(function () {
        if ($(this).attr('id') == activeId) {
            // activeItems.removeClass('active');
            $(this).addClass('active');
        }
    });
}