<?php
namespace mvc\models;
use mvc\core\DB;

class Purchase extends DB{
  

    function select($query, $params = [])
    {
        $result = $this->readDB($query, $params);
        if ($result !== false)
        {
            return $result;
        }
        return false;
    }

}