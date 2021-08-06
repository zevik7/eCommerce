<?php
    class Pagination extends DB{
        public $itemPerPage;
        public $offset;
        public $totalItems;
        public $totalPages;
        public $currentPage;

        function __construct()
        {
            parent::__construct();
            //Default Pagination
            $this->currentPage = 1;
            $this->itemPerPage = 10;
            $this->offset = 0;
        }
        function calPagination($totalItems){
            $this->cleanData($this->currentPage);
            $this->totalItems = $totalItems;
            $this->totalPages = ceil($this->totalItems / $this->itemPerPage);
            $this->offset = ($this->currentPage - 1) * ($this->itemPerPage);
        }
        function getPagination(){
            return json_encode(["currentPage" => $this->currentPage, "totalPages" => $this->totalPages]);
        }
    }
?>