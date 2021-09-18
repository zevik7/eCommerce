<?php
namespace mvc;
use mvc\core\App;
Class Bridge {
    public function __construct(){
        include_once(__DIR__.'/../configs.php');
        $app = new App();
    }
}