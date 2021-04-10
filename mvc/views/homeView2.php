<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeView2</title>
    <link rel="stylesheet" href="./eCommerce/assets/css/demo.css">
</head>
<body>
    <div id="header">Header</div>
    <div id="content">
        <?php
            require_once "./mvc/views/page/".$data["Page"].".php";
        ?>
    </div>
    <div id="footer">Footer</div>
</body>
</html>