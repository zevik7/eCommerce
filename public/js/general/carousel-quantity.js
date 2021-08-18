let carouselQuantitys = $(".fs-carousel-quantity");
carouselQuantitys.each(function (index) {
    let carouselQuantitysPlus = $(this).children(".fs-carousel-quantity__plus");
    let carouselQuantitysMinus = $(this).children(".fs-carousel-quantity__minus");
    let carouselQuantitysInput = $(this).children(".fs-carousel-quantity__number");
    let carouselQuantitysText =
        $(this).next('.fs-quantity-count__text').children('.fs-number-quantity');
    const maxValue = parseInt(carouselQuantitysText.text().replace(/\s\s+/g, ' '));

    carouselQuantitysPlus.on('click', function () {
        carouselQuantitysInput.val(function(i, oldVal) {
            if (oldVal < maxValue)
            {
                ++oldVal;
                let currentNumTxt = parseInt(carouselQuantitysText.text().replace(/\s\s+/g, ' '));
                carouselQuantitysText.text(--currentNumTxt);
            }
            return oldVal;
        });
    })
    carouselQuantitysMinus.on('click', function () {
        carouselQuantitysInput.val(function(i, oldVal) {
            if (oldVal > 1)
            {
                --oldVal;
                let currentNumTxt = parseInt(carouselQuantitysText.text().replace(/\s\s+/g, ' '));
                carouselQuantitysText.text(++currentNumTxt);
            }
            return oldVal;
        });
    })
})