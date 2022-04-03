<?php

function myfunc(){
    $arr = array();
    $arr[] = 'value0';
    $arr['key1'] = 'value1';
    $arr['key2'] = 'value2';
    $arr[] = 'value3';
    return $arr;
}
$datos = myfunc();

print_r($datos["key1"]);






?>