<nav class="category-bar">
    <h3 class="category-bar__title title-reset">
        <i class="far fa-list-alt category-header__icon"></i> Danh mục hàng
    </h3>
    <ul id="category-bar__list" class="category-bar__list" 
    activeItem = "<?php if(isset($_GET['category'])) echo $_GET['category'];?>">
        <li>
            <a id="" class="fs-category-bar__item category-bar__item
            <?php if (!isset($_GET['category'])) echo "active"; ?>" href="#"> 
                <span> Tất cả</span>
            </a>
        </li>
        <?php
            if (!empty($data['category']))
            {
                $cateData = json_decode($data['category']);
                
                foreach ($cateData as $key => $value) {
        ?>
        
            <li>
                <a id="1" class="fs-category-bar__item category-bar__item
                <?php if (isset($_GET['category']) && $_GET['category'] == $value->id) echo "active";?>"
                href="<?php echo replaceUrlParams('category', $value->id) ?>"> 

                    <?php echo $value->svg_icon;?>
                    <span> 
                        <?php echo $value->name;?>
                    </span> 
                </a>
            </li>
        
        <?php
                }
            }
        ?>
    </ul>
</nav> 