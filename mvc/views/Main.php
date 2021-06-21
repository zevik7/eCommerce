<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hevy Shop</title>
    <base href="http://<?php echo $_SERVER['HTTP_HOST']?>/eCommerce/"/>
    <link rel="stylesheet" href="/eCommerce/public/icon/fontawesome/css/all.css">
    <link rel="stylesheet" href="/eCommerce/public/css/main.css">
</head>
<body>
    <div class="webapp">
        <div class="header">
            <?php
                require_once './mvc/views/block/Navigation.php';
                require_once './mvc/views/block/SearchBar.php';
            ?>
        </div>
        <div class="container">
            <?php
                require_once './mvc/views/page/'.$data['Page'].'.php';
            ?>
        </div>
        <div class="footer">
            <?php
                require_once './mvc/views/block/Footer.php';
            ?>
        </div>
        <!-- modal login and signup -->
        <?php
                require_once './mvc/views/block/Modal.php';
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Slider -->
    <script src="public/sliderengine/amazingslider.js"></script>
    <script src="public/sliderengine/initslider-1.js"></script>
    <script src="public/js/customSlider.js"></script>
    <!-- Slider -->
</body>
</html>