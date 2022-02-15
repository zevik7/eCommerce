<?php

namespace src;

use src\core\App;

class Bridge
{
    public function __construct()
    {
        include_once(__DIR__.'/../configs.php');
        $app = new App();
    }
}
