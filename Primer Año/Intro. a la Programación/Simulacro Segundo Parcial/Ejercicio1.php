<?php

/**
 * @param int $num
 * @return bool
 */

function esNroElegido1($num) {
    /* int $umbral, $i, bool $bandera */
    $umbral = ( (int)($num / 2) ) + 1;
    $bandera = true;
    for ($i = 2; $i < $umbral; $i++) {
        if ($num % $i == 0) {
            $bandera = false;
            echo $i;
        }
        
    }
    return $bandera;
}

echo esNroElegido1(12);

/**
 * @param int $num
 * @return bool
 */

function esNroElegido2($num) {
    /* int $umbral, $i, bool $bandera */
    $umbral = ( (int)($num / 2) ) + 1;
    echo $umbral . "\n";
    $bandera = true;
    $i = 2;
    while ($bandera && $i < $umbral) {
        $bandera = !($num % $i == 0);
        $i = $i + 1;
    }
    return $bandera;

}
// echo esNroElegido2(6);









?>