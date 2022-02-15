<?php

namespace src\controllers;

use src\core\Controller;
use src\models\Product;
use src\models\Shop;

class OrderSuccess extends Controller
{
    protected $cartModel;

    public function load($params)
    {
        $this->view('Main', [
            'Page' => 'OrderSuccess',
        ]);
    }
}
