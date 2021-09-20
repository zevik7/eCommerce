<div class="bg-transparent">
    <div class="grid pt-20">
        <div class="product-list-page">
            <div class="row">
                <div class="col-2">
                    <?php require_once './mvc/views/block/product-list/Category.php'?>
                </div>
                <div class="col-10">
                    <?php require_once './mvc/views/block/product-list/Filter.php'?>
                    <div class="result">
                        <?php
                            if (isset($data['Keyword']) && $data['Keyword']!='')
                            {
                                if($data['ProductQuantity']>0){
                        ?>
                            <div class="result__message">
                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32"><rect width="3" height="5.842" x="17.392" y="15.97" fill="#dad9db" transform="rotate(-45 18.892 18.892)"/><circle cx="10.765" cy="10.765" r="10" fill="#8b8891" transform="rotate(-45 10.765 10.765)"/><circle cx="10.765" cy="10.765" r="7.647" fill="#82c8ec" transform="rotate(-45 10.765 10.765)"/><path fill="#b18968" d="M23.7,17.7h3a1,1,0,0,1,1,1V30.2a2.5,2.5,0,0,1-2.5,2.5h0a2.5,2.5,0,0,1-2.5-2.5V18.7a1,1,0,0,1,1-1Z" transform="rotate(-45 25.2 25.2)"/><path fill="#3eb57b" d="M12.532,8.232,9.7,11.061,9,10.354a1,1,0,0,0-1.414,0h0a1,1,0,0,0,0,1.414l.707.707L9,13.182a1,1,0,0,0,1.414,0l.707-.707,2.828-2.828a1,1,0,0,0,0-1.414h0A1,1,0,0,0,12.532,8.232Z"/><path d="M13.24,7.439h0a1.491,1.491,0,0,0-1.061.439L9.7,10.354,9.351,10a1.5,1.5,0,0,0-2.121,2.121l1.414,1.414a1.5,1.5,0,0,0,2.121,0L14.3,10a1.5,1.5,0,0,0,0-2.121A1.485,1.485,0,0,0,13.24,7.439Zm.353,1.854-3.535,3.535a.5.5,0,0,1-.707,0L7.937,11.414a.5.5,0,1,1,.707-.707l.707.707a.5.5,0,0,0,.707,0l2.828-2.828a.5.5,0,0,1,.354-.146h0a.5.5,0,0,1,.353.854ZM30.856,26.614l-8.132-8.132a1.53,1.53,0,0,0-1.692-.278l-1.568-1.568a10.492,10.492,0,1,0-2.828,2.828l1.557,1.557a1.482,1.482,0,0,0,.289,1.7l8.132,8.132a3,3,0,1,0,4.242-4.242ZM4.047,17.482a9.5,9.5,0,1,1,13.436,0A9.511,9.511,0,0,1,4.047,17.482Zm13.4,1.378c.255-.211.5-.433.743-.671s.46-.488.671-.743l1.389,1.389L18.836,20.25Zm12.7,11.289a2.047,2.047,0,0,1-2.828,0l-8.132-8.132a.5.5,0,0,1,0-.707l2.121-2.121a.5.5,0,0,1,.707,0l8.132,8.132a2,2,0,0,1,0,2.828ZM16.525,5a8.144,8.144,0,1,0,0,11.521A8.157,8.157,0,0,0,16.525,5Zm-.707,10.814a7.144,7.144,0,1,1,0-10.107A7.154,7.154,0,0,1,15.818,15.818Z"/></svg>
                                <p>Kết quả tìm kiếm cho từ khoá  <span>"<?php echo $data['Keyword'] ?>"</span></p>
                                
                            </div>
                        <?php
                                }
                                else{
                        ?>
                            <div class="result__message">
                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32"><rect width="3" height="3.939" x="17.299" y="16.829" fill="#dad9db" transform="rotate(-45 18.799 18.8)"/><circle cx="10.765" cy="10.765" r="10" fill="#8b8891" transform="rotate(-45 10.765 10.765)"/><circle cx="10.765" cy="10.765" r="7.647" fill="#82c8ec" transform="rotate(-45 10.765 10.765)"/><path fill="#b18968" d="M23.7,17.7h3a1,1,0,0,1,1,1V30.2a2.5,2.5,0,0,1-2.5,2.5h0a2.5,2.5,0,0,1-2.5-2.5V18.7a1,1,0,0,1,1-1Z" transform="rotate(-45 25.2 25.2)"/><path fill="#e23342" d="M14.3,7.229h0a1,1,0,0,0-1.414,0L11.472,8.643a1,1,0,0,1-1.414,0L8.643,7.229a1,1,0,0,0-1.414,0h0a1,1,0,0,0,0,1.414l1.414,1.414a1,1,0,0,1,0,1.414L7.229,12.886a1,1,0,0,0,0,1.414h0a1,1,0,0,0,1.414,0l1.414-1.414a1,1,0,0,1,1.414,0L12.886,14.3a1,1,0,0,0,1.414,0h0a1,1,0,0,0,0-1.414l-1.414-1.414a1,1,0,0,1,0-1.414L14.3,8.643A1,1,0,0,0,14.3,7.229Z"/><path d="M30.856,26.614l-8.131-8.132a1.53,1.53,0,0,0-1.693-.278l-1.568-1.568a10.493,10.493,0,1,0-2.828,2.828l1.557,1.557a1.482,1.482,0,0,0,.289,1.7l8.131,8.132a3,3,0,1,0,4.243-4.242ZM4.047,17.482a9.5,9.5,0,1,1,13.435,0A9.511,9.511,0,0,1,4.047,17.482Zm13.4,1.378c.255-.211.5-.433.743-.671s.46-.488.671-.743l1.389,1.389L18.836,20.25Zm12.7,11.289a2.048,2.048,0,0,1-2.829,0l-8.131-8.132a.5.5,0,0,1,0-.707l2.121-2.121a.5.5,0,0,1,.707,0l8.132,8.132a2,2,0,0,1,0,2.828ZM16.525,5a8.144,8.144,0,1,0,0,11.521A8.157,8.157,0,0,0,16.525,5Zm-.707,10.814a7.144,7.144,0,1,1,0-10.107A7.154,7.154,0,0,1,15.818,15.818Zm-2.933-5.054L14.654,9a1.5,1.5,0,0,0,0-2.121,1.536,1.536,0,0,0-2.121,0L10.765,8.644,9,6.876A1.5,1.5,0,1,0,6.875,9l1.768,1.768L6.875,12.532A1.5,1.5,0,0,0,9,14.653l1.768-1.768,1.768,1.768a1.5,1.5,0,1,0,2.122-2.121Zm1.061,3.182a.511.511,0,0,1-.707,0l-2.122-2.121a.5.5,0,0,0-.707,0L8.29,13.946a.5.5,0,0,1-.708-.707L9.7,11.118a.5.5,0,0,0,0-.707L7.583,8.29a.5.5,0,1,1,.707-.707L10.411,9.7a.5.5,0,0,0,.707,0L13.24,7.583a.51.51,0,0,1,.707,0,.5.5,0,0,1,0,.707l-2.122,2.121a.5.5,0,0,0,0,.707l2.122,2.121a.5.5,0,0,1,0,.707Z"/></svg>
                                <p>Chúng tôi không tìm thấy sản phẩm  <span>"<?php echo $data['Keyword'] ?>"</span> nào. Bên dưới là kết quả gợi ý thay thế.</p>               
                            </div>
                        <?php }}?>
                    </div>

                    <div class="product">
                        <div class="row">
                            <?php
                                if (isset($data['Product']))
                                {   
                                    $decode = json_decode($data['Product'], true);
                               
                                    foreach($decode as $value)
                                    {
                            ?>
                            <div class="col-10-2">
                                <a href="./ProductDetail/loadProduct/<?php echo $value['productId'];?>" class="product__item mt-10">
                                    <div class="product-item__img" style="background-image: url(<?php echo $value['imageProductUrl'];?>);"></div>
                                    <div class="product-item__content">
                                        <h4 class="product-item__name"><?php echo $value['productName'];?></h4>
                                        <div class="product-item__price">
                                            <span class="price-original"><?php echo $value['productTypePrice'];?></span>
                                            <span class="price-sale"><?php echo $value['productTypePrice']-$value['productTypePrice']*$value['productDiscount'];?></span>
                                        </div>
                                        <div class="product-item__react">
                                            <div class="product-item__rating">
                                                <?php
                                                    $starValue = $value['productRating'];
                                                    $maxStar = 0;
                                                    while ($maxStar < 5)
                                                    {
                                                        if ($starValue > 0)
                                                        {
                                                            if ($starValue >= 1) echo '<i class="fas fa-star"></i>';
                                                            else echo '<i class="fas fa-star-half-alt"></i>';
                                                            $starValue--;
                                                        }
                                                        else{
                                                            echo '<i class="far fa-star"></i>';
                                                        }
                                                        $maxStar++;
                                                    }
                                                ?>
                                            </div>
                                            <span class="product-item__sold">
                                                <span class="sold-number"><?php echo $value['productSold'];?></span>
                                                đã bán
                                            </span>
                                        </div>
                                        <div class="product-item__origin">
                                            <span class="item-brand"><?php echo $value['productBrand'];?></span>
                                            <span class="item-source"><?php echo $value['productSource'];?></span>
                                        </div>
                                        <!-- Item label -->
                                        <div class="product-item__favourite">
                                            <i class="fas fa-check"></i>Yêu thích
                                        </div>
                                        <div class="product-item__discount">
                                            <span class="percent"><?php echo $value['productDiscount']*100;?>%</span>
                                            <span class="label">GIẢM</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <?php 
                        require_once './mvc/views/block/Pagination.php'
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
