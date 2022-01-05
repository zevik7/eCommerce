<?php

namespace mvc\controllers\admin;

use mvc\core\Controller;

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
