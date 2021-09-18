<?php
namespace mvc\models;
use mvc\core\DB;

trait QueryBuilder{

    private $query = "";

    function __construct()
    {
        parent::__construct();
    }

    function where(){
        
    }
}