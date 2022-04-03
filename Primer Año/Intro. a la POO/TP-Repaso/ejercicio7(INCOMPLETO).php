<?php
/* 
7. Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un algoritmo que retorne un arreglo 
con los elementos de A mas los elementos de B. 
*/

$arregloA = [1, 2, 3, 4, 5];
$arregloB = [6, 7, 8, 9, 10];

function retornarArreglo($arreglo1, $arreglo2) {
    $arregloUnido = $arreglo1 . $arreglo2;
    return $arregloUnido;
}

print_r(retornarArreglo($arregloA, $arregloB));

// https://es.stackoverflow.com/questions/299112/sumar-2-array-y-determinar-el-resultado-en-un-tercer-arreglo