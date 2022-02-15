<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hevy Shop</title>
    
    <base href="http://<?= BASE_URL;?>"/>

    <!-- CSS -->
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="fontawesome/css/all.min.css" type="text/css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/main.css" type="text/css">

    <!--- JS -->
    <script defer src="js/libs/jquery-3.6.0.min.js"></script>
    <script defer src="js/libs/jquery.validate.min.js"></script>
    <script defer src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>
    <!-- Slider -->
    <script defer src="sliderengine/amazingslider.js"></script>
    <script defer src="sliderengine/initslider-1.js"></script>
    <!-- Slider -->
    <script defer type="module" src="js/main.js"></script>
</head>
<body>
    <div class="webapp">
        <?php
            // Assets function
            require_once '../src/views/assets/UrlFunction.php';
            require_once '../src/views/assets/RatingFunction.php';
        ?>
        <div class="header">
            <?php
                require_once '../src/views/block/Header.php';
            ?>
        </div>
        <div class="body">
            <?php
                require_once '../src/views/page/'.$data['Page'].'.php';
            ?>
        </div>
        <div class="footer">
            <?php
                require_once '../src/views/block/Footer.php';
            ?>
        </div>
        <!-- Modal login and signup -->
        <?php
            require_once '../src/views/block/Modal.php';
        ?>
    </div>
</body>
</html>