<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hevy Shop</title>
    <base href="http://<?php echo BASE_URL;?>"/>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/fontawesome/css/all.min.css" type="text/css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="public/css/main.css" type="text/css">
</head>
<body>
    <div class="webapp">
        <?php
            require_once './mvc/views/assets/Function.php';
        ?>
        <div class="header">
            <?php
                require_once './mvc/views/block/Header.php';
            ?>
        </div>
        <div class="body">
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
    <script src="public/js/libs/jquery-3.6.0.min.js"></script>
    <script src="public/js/libs/jquery.validate.min.js"></script>
    <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
    <!-- Slider -->
    <script src="public/sliderengine/amazingslider.js"></script>
    <script src="public/sliderengine/initslider-1.js"></script>
    <!-- Slider -->
    <script type="module" src="public/js/main.js"></script>
</body>
</html>