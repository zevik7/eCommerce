<?php

namespace mvc;

use mvc\core\App;

class Bridge
{
    public function __construct()
    {
        include_once(__DIR__.'/../configs.php');
        $app = new App();
    }
    function abc    (){
            $x = 90;  
    }
}
