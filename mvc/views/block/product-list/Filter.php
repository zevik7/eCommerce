<div class="filter">
    <span class="filter__title title-sm">Sắp xếp theo</span>
    <ul class="filter__list">
        <li class="filter__item 
        <?php if(!isset($_GET['filter'])) echo "active";?>">
            <a href="<?php replaceUrlParams('filter', ''); ?>">
                Phổ biến
            </a>
        </li>
        <li class="filter__item 
        <?php if(isset($_GET['filter']) && $_GET['filter'] == 'newest') echo "active";?>">
            <a class="" 
            href="<?php echo replaceUrlParams('filter', 'newest'); ?>">
                Mới nhất
            </a>
        </li>
        <li class="filter__item
        <?php if(isset($_GET['filter']) && $_GET['filter'] == 'selling') echo "active";?>">
            <a class="" 
            href="<?php echo replaceUrlParams('filter', 'selling'); ?>">
                Bán chạy
            </a>
        </li>
        <li class="filter__item filter__item-select">
            <div class="fs-select-price select">
                <h4 class="fs-select-price-active select__active">
                    
                </h4>
                <i class="fas fa-sort-down"></i>
                <ul class="select__list">
                    <li class="fs-select-price-item">
                        <a class="" 
                        href="<?php echo replaceUrlParams('filter', 'price-asc'); ?>">
                            Giá
                        </a>
                    </li>
                    <li class="fs-select-price-item">
                        <a class="" 
                        href="<?php echo replaceUrlParams('filter', 'price-asc'); ?>">
                            Từ thấp đến cao
                        </a>
                    </li>
                    <li class="fs-select-price-item">
                        <a class="" 
                        href="<?php echo replaceUrlParams('filter', 'price-desc'); ?>">
                            Từ cao đến thấp
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <div class="filter__switch">
        <span id="filter-switch__current" class="">
            1
        </span>
        <span>/</span>
        <span id="filter-switch__total">
            14
        </span>
        <div class="filter-switch__control">
            <a href="#" class="disabled">
                <i class="fas fa-angle-left"></i>
            </a>
            <a href="#" class="">
                <i class="fas fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>