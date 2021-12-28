<?php
namespace mvc\core;

class Controller{
    // Only require without namespace ???
    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }

    // Send json response
    public function sendResponse($status = 'success', 
                    $msg = 'Thành công', $data = []) 
    {
        return json_encode(['status' => $status, 
                        'message' => $msg,
                        'data' => $data]);
    }

    public function checkAuth()
    {
        if (!isset($_SESSION['user']))
            echo $this->sendResponse('not authorized', 'Bạn chưa đăng nhập.');
    }
}
?>