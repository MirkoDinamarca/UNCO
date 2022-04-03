<?php

/* PROGRAMA porcentajeMultiplo */
/* Del número ingresado, se evaluarán sus múltiplos y en base a ello se calcula el porcentaje de todos los múltiplos */
/* int $numMultiplos, $numTotales, $numUsuario, $numIngreso string $respuesta float $porcentaje */
echo "Ingrese un número para evaluar sus múltiplos: ";
$numUsuario = trim(fgets(STDIN));
$numMultiplos = 0;
$numTotales = 0;
do {
    echo "¿Desea ingresar un número de la secuencia?(s/n): ";
    $respuesta = trim(fgets(STDIN));
    if ($respuesta == "s") {
        echo "Ingrese el número: ";
        $numIngresado = trim(fgets(STDIN));
        $numTotales++;

        if ($numIngresado % $numUsuario == 0) {
            $numMultiplos++;
        }
    } elseif ($respuesta == "n") {
        echo "No se ingresaron más números en la secuencia" . "\n";
    }
} while ($respuesta != "n");

$porcentaje = ($numMultiplos * 100) / $numTotales;
echo "El porcentaje de múltiplos es: %" . $porcentaje;









?>