<?php

// 3. Dado dos números N y M retornar verdadero si el número N es divisible por M y falso en caso contrario. 

function esDivisible($n, $m) {
    $resultado = true;
    if ($n % $m === 0) {
        $resultado = true;
    } else {
        $resultado = false;
    }
    return $resultado;

}

echo esDivisible(4, 3);