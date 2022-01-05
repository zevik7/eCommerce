<?php

namespace mvc\core;

class App
{
    protected $controller = "mvc\\controllers\\ProductList"; // Default controller
    protected $action = "load"; // Default method
    protected $params = [];

    public function __construct()
    {
        $arr = $this->UrlProcess();

        // Controller
        if (isset($arr[0])) {
            // For user page
            if (file_exists("mvc/controllers/".$arr[0].".php")) {
                $this->controller = "mvc\\controllers\\".$arr[0];
                unset($arr[0]);
            }

            // For admin page
            if ($arr[0] == "admin") {
                if (file_exists("mvc/controllers/admin/".ucfirst($arr[1]).".php")) {
                    $this->controller =
                        "mvc\\controllers\\admin\\".ucfirst($arr[1]);
                    unset($arr[0]);
                    unset($arr[1]);
                }
            }
        }

        $this->controller = new $this->controller();

        // Action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
                unset($arr[1]);
            }
        }

        // Params
        $this->params = $arr ? array_values($arr) : [];

        call_user_func_array([$this->controller, $this->action], [$this->params]);
    }

    // Get request URL
    public function UrlProcess()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = strtok($_SERVER['REQUEST_URI'], '?'); // remove params
            return explode("/", (trim($url, "/")));
        }
    }
}
