<?php
    if (isset($data['Pagination'])) {
        $pagination = json_decode($data['Pagination']); ?>
    <ul class="pagination">
        <li class="pagination__item">
            <a href="<?php if ($currentPage == 1) {
            echo "disabled";
        } ?>" 
            class="pagination__link
            <?php if ($currentPage == 1) {
            echo "disabled";
        } ?>">
                <i class="pagination-link__icon fas fa-angle-left"></i>
            </a>
        </li>
            <?php
                $totalPages = $pagination->totalPages;
        $currentPage = $pagination->currentPage;
        $numShows = [];
        if ($totalPages > 6) {
            $min = $currentPage - 3;
            $max = $currentPage + 3;
            if ($min < 1) {
                $max += abs($min);
                $min = 1;
            }
            if ($max > $totalPages) {
                $min -= abs($max - $totalPages);
                $max = $totalPages;
            }
            for ($i = $min; $i <= $max; $i++) {
                $numShows[] = $i;
            }
        } else {
            for ($i = 1; $i <= $totalPages; $i++) {
                $numShows[] = $i;
            }
        }
        for ($i = 0; $i < count($numShows); $i++) {
            ?>
                <li class="pagination__item">
                    <a href="<?php echo replaceUrlParams('pageNumber', $numShows[$i]); ?>"
                    class="pagination__link <?php if ($numShows[$i] == $currentPage) {
                echo 'active';
            } ?>">
                        <?php echo $numShows[$i]; ?>
                    </a>
                </li>
            <?php
        } ?>
        <li class="pagination__item">
            <a href="<?php echo replaceUrlParams('pageNumber', $currentPage + 1); ?>" 
            class="pagination__link 
            <?php if ($currentPage == $totalPages) {
            echo "disabled";
        } ?>">
                <i class="pagination-link__icon fas fa-angle-right"></i>
            </a>
        </li>
    </ul>
<?php
    }
?>