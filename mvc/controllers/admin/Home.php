<?php
namespace mvc\controllers\admin;
use mvc\core\Controller;
class Home extends Controller{

    public function __construct(){

    }

    function load() {
        $this->view('Admin',[
            'Page' => 'Order',
            
        ]);
    }
}
?>