<?php

namespace src\controllers\admin;

use src\core\Controller;

class Home extends Controller
{
    public function __construct()
    {
    }

    public function load()
    {
        $this->view('Admin', [
            'Page' => 'Order',

        ]);
    }
}
