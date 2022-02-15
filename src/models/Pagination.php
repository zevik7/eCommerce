<?php

namespace src\models;

use src\core\DB;

class Pagination extends DB
{
    public $perPage;
    public $offset;
    public $totalItems;
    public $totalPages;
    public $currentPage;

    public function __construct()
    {
        parent::__construct();
        //Default setting
        $this->currentPage = 1;
        $this->perPage = 15;
        $this->offset = 0;
    }

    public function calPagination($totalItems)
    {
        $this->cleanData($this->currentPage);
        $this->totalItems = $totalItems;
        $this->totalPages = ceil($this->totalItems / $this->perPage);
        $this->offset = ($this->currentPage - 1) * ($this->perPage);
    }

    public function getPagination()
    {
        return json_encode(["currentPage" => $this->currentPage, "totalPages" => $this->totalPages]);
    }
}
