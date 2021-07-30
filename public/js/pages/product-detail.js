//----------------Item event--------------------
$('.list-type__item').on('click', function () {
    $(this).parent().children('.list-type__item.active').removeClass('active');
    $(this).addClass('active');
});

//----------------Rating event--------------------
$('.overview-filter-item').on('click', function () {
    console.log('click');
    $(this).parent().children('.overview-filter-item.active').removeClass('active');
    $(this).addClass('active');
});