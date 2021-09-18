<?php
    namespace App;
    use mvc\Bridge;

    session_start();
    require_once __DIR__.'/vendor/autoload.php';
    $myApp = new Bridge();