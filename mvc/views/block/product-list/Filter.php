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
            <div class="select
            <?php if(isset($_GET['filter']) && preg_match('/price-desc|price-asc/', $_GET['filter'])) echo "active";?>
            ">
                <h4 class="select__active">
                    <?php
                        $selectItems = ['price-asc', 'price-desc'];
                        $selectTxts = ['Từ thấp đến cao', 'Từ cao đến thấp'];
                        if (isset($_GET['filter']))
                        {
                            switch ($_GET['filter']) {
                                case 'price-asc':
                                    echo $selectTxts[0];
                                    break;
                                case 'price-desc':
                                    echo $selectTxts[1];
                                    break;
                                    
                                default:
                                    echo "Giá";
                                break;
                                }
                        }
                        else  echo "Giá";
                    ?>
                </h4>
                <i class="fas fa-sort-down"></i>
                <ul class="select__list">
                    <?php
                        foreach ($selectItems as $key => $value) {
                            if (isset($_GET['filter']) && $_GET['filter'] == $value){
                                echo "
                                <li class=''>
                                    <a class=''
                                    href='".removeUrlParam('filter')."'>
                                        Giá
                                    </a>
                                </li>
                                ";
                                continue;
                            }
                    ?>
                    <li class="">
                        <a class="" 
                        href="<?php echo replaceUrlParams('filter', $value); ?>">
                            <?php echo $selectTxts[$key]; ?>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </li>
    </ul>
    <?php 
        if (isset($data['Pagination']))
        {
            $pagination = json_decode($data['Pagination']);
            $totalPages = intval($pagination->totalPages);
            $currentPage = intval($pagination->currentPage);
    ?>
        <div class="filter__switch">
            <span id="filter-switch__current" class="">
                <?php echo $currentPage;?>
            </span>
            <span>/</span>
            <span id="filter-switch__total">
                <?php echo $totalPages;?>
            </span>
            <div class="filter-switch__control">
                <a href="<?php echo replaceUrlParams('pageNumber', $currentPage - 1);?>" 
                class="<?php if ($currentPage == 1) echo "disabled"?>">
                    <i class="fas fa-angle-left"></i>
                </a>
                <a href="<?php echo replaceUrlParams('pageNumber', $currentPage + 1);?>" class="
                <?php if ($currentPage == $totalPages) echo "disabled";?>">
                    <i class="fas fa-angle-right"></i>
                </a>
            </div>
        </div>
    <?php
        }
    ?>
</div>