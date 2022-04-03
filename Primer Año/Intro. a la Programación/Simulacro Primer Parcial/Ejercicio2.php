<?php

/**
 * (A)
 * Calcula la distancia entre dos puntos de coordenadas. 
 * Cada punto está formado por un X e Y
 * @param int $xPto1
 * @param int $yPto1
 * @param int $xPto2
 * @param int $yPto2
 * @return FLOAT
 */

function distanciaPuntos($xPto1, $yPto1, $xPto2, $yPto2) {}

/**
 * (B)
 * Calcula la circunferencia a partir del módulo anterior, y 
 * especifica si los puntos están dentro o fuera de su radio
 * @param int $xCentro
 * @param int $yCentro
 * @param float $radio
 * @param int $xPunto
 * @param int $yPunto
 */

function circunferencia($xCentro, $yCentro, $radio, $xPunto, $yPunto) {
    /* FLOAT $distancia string $respuesta */
    $distancia = distanciaPuntos($xCentro, $yCentro, $xPunto, $yPunto);
    if ($distancia < $radio) {
        $respuesta = "dentro";
    } else {
        $respuesta = "fuera";
    }
    return $respuesta;
}

// Consigna C - inciso (a)
echo circunferencia(0,0,7,3,4) . "\n"; // dentro

// Consigna C - inciso (b)
echo circunferencia(1,2,5,1,8) . "\n"; // fuera

?>