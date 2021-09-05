<?php
    class Pagination extends DB{
        public $perPage;
        public $offset;
        public $totalItems;
        public $totalPages;
        public $currentPage;

        function __construct()
        {
            parent::__construct();
            //Default setting
            $this->currentPage = 1;
            $this->perPage = 10;
            $this->offset = 0;
        }
        function calPagination($totalItems){
            $this->cleanData($this->currentPage);
            $this->totalItems = $totalItems;
            $this->totalPages = ceil($this->totalItems / $this->perPage);
            $this->offset = ($this->currentPage - 1) * ($this->perPage);
        }
        function getPagination(){
            return json_encode(["currentPage" => $this->currentPage, "totalPages" => $this->totalPages]);
        }
    }
?>