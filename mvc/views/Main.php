<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hevy Shop</title>
    <base href="http://<?php echo $_SERVER['HTTP_HOST']?>/eCommerce/"/>
    <link rel="stylesheet" href="public/fontawesome/css/all.min.css" type="text/css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="/eCommerce/public/css/main.css" type="text/css">
</head>
<body>
    <div class="webapp">
        <div class="header">
            <?php
                require_once './mvc/views/block/Header.php';
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
    
    <script src="public/js/jquery-3.6.0.min.js"></script>
    <script src="public/js/jquery.validate.min.js"></script>
    <!-- Slider -->
    <script src="public/sliderengine/amazingslider.js"></script>
    <script src="public/sliderengine/initslider-1.js"></script>
    <!-- Slider -->
    <script src="public/js/processRegister.js"></script>
    <script src="public/js/personal.js"></script>
</body>
</html>