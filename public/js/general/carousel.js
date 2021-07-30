//Carousel quantity
$('.carousel-quantity__plus').on('click', function () {
    let valueElement = $(this).siblings('input');
    valueElement.val( function(i, oldval) {
        return ++oldval;
    });
})
$('.carousel-quantity__minus').on('click', function () {
    let valueElement = $(this).siblings('input');
    valueElement.val(function(i, oldVal) {
        return oldVal > 1 ? --oldVal: oldVal;
    });
})