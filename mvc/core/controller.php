<?php
    //Hàm này hỗ trợ thừa kế cho khác controller khác
    class controller{
        public function model($modelName){
            require_once "./mvc/models/".$modelName.".php";
            return new $modelName;
        }
        public function view($viewName, $data=[]){
            require_once "./mvc/views/".$viewName.".php";
        }
    }
?>