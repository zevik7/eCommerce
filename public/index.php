<?php
    namespace App;
    use mvc\Bridge;

    session_start();
    require_once '../vendor/autoload.php';
    $myApp = new Bridge();