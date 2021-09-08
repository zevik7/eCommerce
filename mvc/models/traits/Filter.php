<?php
namespace mvc\models\traits;
/**
 * Filter trait
 */
trait Filter
{
    public function filterSearch($query, $column, $value)
    {
        $query = $query." AND $column LIKE '%$value%'";
        return $query;
    }
}
