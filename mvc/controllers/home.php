<?php
    class home extends controller{
        function hello(){
            //get model
            $Item=$this->model("itemModel");
            //get data for view
            $itemData=$Item->getItem();
            //get view and
            $this->view("homeView2", [
                "Page"=>"news",
                "item"=>$itemData
            ]);
        }
    }
?>