<?php
namespace mvc\core;

class App{

    protected $controller = "mvc\\controllers\\ProductList";
    protected $action = "test";
    protected $params = [];

    function __construct(){
        $arr = $this->UrlProcess();

        //If call API
        if (isset($arr[0]) && $arr[0] == 'api')
        {
            $rmFirst = array_shift($arr);
            $apiType = '';
            $apiObj = '';
            $apiParams = [];
            if (isset($arr[0])) 
            {
                $apiType = $arr[0];
                unset($arr[0]);
            }
            if (isset($arr[1])) 
            {
                $apiObj = $arr[1];   
                unset($arr[1]);
            }
            $apiParams = $arr ? array_values($arr) : [];
            $apiFile = 
                "./mvc/controllers/api/".$apiType."/".$apiObj.".php";
            if(file_exists($apiFile)){
                require_once $apiFile;
                $reflect  = new ReflectionClass($apiObj);
                $instance = $reflect->newInstanceArgs($apiParams);
            }
            else echo 'The methods does not exist';

            die();
        }

        // Controller
        if(isset($arr[0]))
        {
            if(file_exists("mvc/controllers/".$arr[0].".php")){
                $this->controller = "mvc\\controllers\\".$arr[0];
                unset($arr[0]);
            }
        }
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[1])){
            if(method_exists($this->controller , $arr[1]) ){
                $this->action = $arr[1];
                unset($arr[1]);
            }
        }
        
        // Params
        $this->params = $arr ? array_values($arr) : [];
        call_user_func_array([$this->controller, $this->action], array($this->params));
    }

    // Get request URL
    function UrlProcess(){
        if(isset($_SERVER['REQUEST_URI']) ){
            return explode("/", (trim($_SERVER['REQUEST_URI'], "/")));
        }
    }
}
?>