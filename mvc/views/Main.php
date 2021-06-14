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
</body>
</html>