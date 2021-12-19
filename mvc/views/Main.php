<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hevy Shop</title>
    <base href="http://<?php echo BASE_URL;?>"/>

    <!-- CSS -->
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/fontawesome/css/all.min.css" type="text/css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="public/css/main.css" type="text/css">

    <!--- JS -->
    <script defer src="public/js/libs/jquery-3.6.0.min.js"></script>
    <script defer src="public/js/libs/jquery.validate.min.js"></script>
    <script defer src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
    <!-- Slider -->
    <script defer src="public/sliderengine/amazingslider.js"></script>
    <script defer src="public/sliderengine/initslider-1.js"></script>
    <!-- Slider -->
    <script defer type="module" src="public/js/main.js"></script>
</head>
<body>
    <div class="webapp">
        <?php
            // Assets function
            require_once './mvc/views/assets/UrlFunction.php';
            require_once './mvc/views/assets/RatingFunction.php';
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
        <!-- Modal login and signup -->
        <?php
            require_once './mvc/views/block/Modal.php';
        ?>
    </div>
</body>
</html>