<?php
    namespace App;
    use mvc\core\App;

    session_start();
    require_once __DIR__.'/vendor/autoload.php';
    // require_once __DIR__.'/mvc/Bridge.php';
    $myApp = new App();
?>