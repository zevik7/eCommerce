<?php

function replaceUrlParams($param, $value)
{
    $query = $_GET;
    // replace parameter(s)
    $query[$param] = $value;
    // rebuild url
    $query_result = './?'.http_build_query($query);
    return $query_result;
}
//Return vietnamese money
function viPrice($value, $label = ''){
    return number_format($value, 0, '', '.')
            . ' ' . $label;
}