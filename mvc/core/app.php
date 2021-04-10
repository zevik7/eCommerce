<?php 
    class app{
        protected $controller="home";
        protected $action="hello";
        protected $params=[];
        function __construct(){
            $arr=$this->urlProcess();
            //controller process
            if(isset($arr[0]))
                if(file_exists("./mvc/controllers/".$arr[0].".php"))
                    {
                        $this->controller=$arr[0];
                        unset($arr[0]);
                    }
            require_once "./mvc/controllers/".$this->controller.".php";
            $this->controller= new $this->controller;
            //action process
            if (isset($arr[1]))
                {
                    if(method_exists($this->controller,$arr[1]))
                        $this->action=$arr[1];
                    unset($arr[1]);
                }
            //paragrams process
            $this->params=$arr?array_values($arr):[];
            //call
            call_user_func_array([$this->controller,$this->action],$this->params);
        }
        function urlProcess(){
            if (isset($_GET["url"])){
                return explode("/",filter_var(trim($_GET["url"],"/")));
            }
        }
    }
?>