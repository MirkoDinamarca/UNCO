<?php

/**
 * Calcula la superficie del cuadro y lo retorna
 * @param float $ancho
 * @param float $alto
 * @return float
 */

function calcularSuperficie($ancho, $alto) {
    /* float $area */
    $area = $ancho * $alto;
    return $area;
}

/**
 * Calcula el precio del cuadro y 
 * retorna su precio final más su incremento correspondiente
 * @param string $clasificacion
 * @param float $superficie
 * @param float $precio
 * @return float
 */

function calcularPrecio($clasificacion, $superficie, $precio) {
    /* float $precioFinal */
    if ($clasificacion == "P" || $clasificacion ==  "M") {
        $precioFinal = $precio * 1.15;
    } elseif ($clasificacion == "E") {
        $precioFinal = $precio * 1.05;
    } else {
        $precioFinal = $precio * 1.02;
    }

    if ($superficie > 2) {
        $precioFinal = $precioFinal * 1.10;
    } elseif (1 < $superficie && $superficie < 2) {
        $precioFinal = $precioFinal * 1.08;
    }
    return $precioFinal;
}

/* PROGRAMA salaArte */
/* Solicita los valores del cuadro al usuario 
y luego retorna su precio final incluido con los incrementos */
/* float $anchoCuadro, $altoCuadro, $precioCuadro, 
$superficieCuadro, $valorFinal STRING $clasificacionCuadro */

echo "Ingrese el ancho del cuadro: ";
$anchoCuadro = trim(fgets(STDIN));
echo "Ingrese la altura del cuadro: ";
$altoCuadro = trim(fgets(STDIN));
echo "¿Qué tipo de clasificación es el cuadro?: ";
$clasificacionCuadro = trim(fgets(STDIN));
echo "Ingrese el valor económico del mismo: ";
$precioCuadro = trim(fgets(STDIN));
$superficieCuadro = calcularSuperficie($anchoCuadro, $altoCuadro);
$valorFinal = calcularPrecio($clasificacionCuadro, $superficieCuadro, $precioCuadro);
echo "La superficie del cuadro es de " . $superficieCuadro . "m² y su valor final es de $" . $valorFinal;









?>