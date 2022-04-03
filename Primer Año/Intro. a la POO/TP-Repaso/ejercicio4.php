<?php

/*
4. Dada un arreglo de números enteros, determinar los valores máximo y mínimo, y las posiciones en que éstos se
encontraban en el arreglo.
*/

$arreglo = [8, 20, 10, 15, 1, 4, 90, 40, 3];

function valorMin($array) {
    $valorMinimo = 999;

    for ($i=0; $i < count($array); $i++) { 
        if($array[$i] < $valorMinimo) {
            $valorMinimo = $array[$i];
            $indice = $i;
        }
    }
    echo "El valor mínimo es " . $valorMinimo . " en el índice " . $indice . "\n";
}

function valorMax($array) {
    $valorMaximo = 0;

    for ($i=0; $i < count($array); $i++) { 
        if($array[$i] > $valorMaximo) {
            $valorMaximo = $array[$i];
            $indice = $i;
        }
    }
    echo "El valor máximo es " . $valorMaximo . " en el índice " . $indice . "\n";
}

echo valorMax($arreglo);
echo valorMin($arreglo);
