<?php
namespace mvc\core;

class Controller{

    // public function model($model){
    //     require_once "./mvc/models/".$model.".php";
    //     return new $model;
    // }

    // Only require without namespace ???
    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }

}
?>