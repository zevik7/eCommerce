<?php
    if (isset($data['Pagination']))
    {
        $pagination = json_decode($data['Pagination']);
?>
    <ul class="pagination">
        <li class="pagination__item">
            <a href="" class="pagination__link disabled">
                <i class="pagination-link__icon fas fa-angle-left"></i>
            </a>
        </li>
            <?php
                $totalPages = intval($pagination->totalPages);
                $currentPage = intval(($pagination->currentPage));
                for ($i = 1; $i <= $totalPages; $i++) { 
            ?>
                <li class="pagination__item">
                    <a href="<?php echo replaceUrlParams('pageNumber', $i); ?>" class="pagination__link <?php if ($i == $currentPage) echo 'active';?>">
                        <?php echo $i;?>
                    </a>
                </li>
            <?php
                }
            ?>
        <li class="pagination__item">
            <a href="" class="pagination__link">
                <i class="pagination-link__icon fas fa-angle-right"></i>
            </a>
        </li>
    </ul>
<?php
    }
?>