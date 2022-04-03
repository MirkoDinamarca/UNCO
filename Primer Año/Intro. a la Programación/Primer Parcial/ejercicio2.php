<?php

/**
 * Inspecciona si la maleta cumple con ciertas condiciones
 * retorna true de aceptarse la tarjeta o retorna false si se rechaza
 * @param float $alto
 * @param float $ancho
 * @param float $largo
 * @param float $peso
 * @return bool
 */

function inspeccionMaleta($alto, $ancho, $largo, $peso) {
    /* boolean $validacion */
    $validacion = false;
    if ($alto < 40.5 && $ancho <= 30 && $largo <= 15 && $peso <= 3.1) {
        $validacion = true;
    } 
    return $validacion;
}

?>