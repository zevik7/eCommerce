let carouselQuantitys = $(".fs-carousel-quantity");
carouselQuantitys.each(function (index) {
    let carouselQuantitysPlus = $(this).children(".fs-carousel-quantity__plus");
    let carouselQuantitysMinus = $(this).children(".fs-carousel-quantity__minus");
    let carouselQuantitysInput = $(this).children(".fs-carousel-quantity__number");
    let $this = $(this);
    
    carouselQuantitysPlus.on('click', function () {
            let carouselQuantitysText =
                $this.next('.fs-quantity-count__text').children('.fs-number-quantity');
            let currentVal = parseInt(carouselQuantitysText.text().replace(/\s\s+/g, ' '));
            carouselQuantitysInput.val(function(i, oldVal) {
                if (currentVal > 0)
                {
                    ++oldVal;
                    let newVal = currentVal - 1;
                    carouselQuantitysText.text(newVal);
                }
                return oldVal;
            });
        })
        carouselQuantitysMinus.on('click', function () {
            let carouselQuantitysText =
                $this.next('.fs-quantity-count__text').children('.fs-number-quantity');
            let currentVal = parseInt(carouselQuantitysText.text().replace(/\s\s+/g, ' '));
            carouselQuantitysInput.val(function(i, oldVal) {
                if (oldVal > 1)
                {
                    --oldVal;
                    let newVal = currentVal + 1;
                    carouselQuantitysText.text(newVal);
                }
                return oldVal;
            });
        })
})