<?php

/**
 * Calcula los kilómetros recorridos y les asigna un monto adicional
 * @param int $kilometros
 * @return float
 */

function kilometrosCalculo($kilometros) {
    /* float $aPagar, $resta */
    if ($kilometros <= 300) {
        $aPagar = 850;
    } else if (300 <= $kilometros && $kilometros < 1000) {
        $resta = $kilometros - 300;
        $aPagar = 850 + ($resta * 10.5);
    } else {
        $resta = $kilometros - 1000;
        $aPagar = 850 + (700 * 10.5) + ($resta * 8.5);
    }
    return $aPagar;
}

/**
 * Según el monto a pagar obtenido del módulo anterior, se calcula el IVA
 * @return float $monto
 * @return float
 */

function calculoIva($monto) {
    /* float $iva, $impuesto */
    $iva = 0.21;
    $impuesto = $monto * $iva;
    return $impuesto;
}

/* PROGRAMA alquilerDeAutos */
/* int $kms, float $montoPagar, $impuestoPagar */

echo "¡Bienvenido al alquiler de autos! ¿Cuántos kilómetros va a recorrer?: ";
$kms = trim(fgets(STDIN));
$montoPagar = kilometrosCalculo($kms);
$impuestoPagar = calculoIva($montoPagar);
$montoPagar = $montoPagar - $impuestoPagar;
echo "El monto a pagar es de $" . $montoPagar . ", más el impuesto IVA que son $" . $impuestoPagar;

?>