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

/**
 * @param int $num
 * @return bool
 */

function esNroElegido2($num) {
    /* int $umbral, $i, bool $bandera */
    $umbral = ( (int)($num / 2) ) + 1;
    $bandera = true;
    $i = 2;
    while ($bandera && $i < $umbral) {
        $bandera = !($num % $i == 0);
        $i = $i + 1;
    }
    return $bandera;

}

/**
 * Suma los números primos y retorna el resultado
 * @param int $n
 * @return int
 */

function sumaElegidosMenores($n) {
    /* int $i, $suma */
    $suma = 0;
    for($i = 2; $i <= $n; $i++) {
        if (esNroElegido2($i)) {
            $suma = $suma + $i;
            echo $i . ", ";
        }
    }
    return $suma;
}

echo sumaElegidosMenores(6);
?>