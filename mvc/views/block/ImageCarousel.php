<div class="amazingslider-wrapper" id="amazingslider-wrapper-1" style="display:block;position:relative;margin:0px auto 116px">
    <div class="amazingslider" id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
        <ul class="amazingslider-slides" style="display:none;">
            <?php
                foreach ($productImage as $value) {
                    ?>
                <li>
                    <img src="<?php echo $value['imageUrl']; ?>" alt=""  title="" data-description="" />
                </li>
            <?php
                }
            ?>
        </ul>
        <ul class="amazingslider-thumbnails" style="display:none;">
            <?php
                foreach ($productImage as $value) {
                    ?>
                <li>
                    <img src="<?php echo $value['imageUrl']; ?>" alt=""  title=""/>
                </li>
            <?php
                }
            ?>
        </ul>
    </div>
</div>