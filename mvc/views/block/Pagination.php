<?php
    if (isset($data['Pagination']))
    {
        $pagination = json_decode($data['Pagination']);
        // if(isset($data['Keyword']) && $data['Keyword'] != '') {
        //     $url  = './ProductList/loadListByName/?keyword='.$data['Keyword'].'&pageNumber=';
        // }
        // else $url = './ProductList/LoadList/?pageNumber=';
?>
    <ul class="pagination">
        <?php echo $_SERVER['REQUEST_URI']; ?>
        <li class="pagination__item">
            <a href="" class="pagination__link">
                <i class="pagination-link__icon fas fa-angle-left"></i>
            </a>
        </li>
        <?php
            $totalPages = intval($pagination->totalPages);
            $currentPage = intval(($pagination->currentPage));
            for ($i = 1; $i <= $totalPages; $i++) { 
                # code...
        ?>
            <li class="pagination__item">
                <a href="<?php echo $data['URL'].$i; ?>" class="pagination__link <?php if ($i == $currentPage) echo 'active';?>">
                    <?php echo $i;?>
                </a>
            </li>
        <?php
            }
        ?>
        <li class="pagination__item">
            <a href="" class="pagination__link disabled">
                <i class="pagination-link__icon fas fa-angle-right"></i>
            </a>
        </li>
    </ul>
<?php
    }
?>