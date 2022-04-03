<?php

/* PROGRAMA sueldoPromedio */
/* Lee el sueldo que ingresa el usuario y luego calcula su promedio */
/* float $sueldoTotal $empleado, $sueldoIngresado, $sueldoPromedio, string $respuesta */

$sueldoTotal = 0;
$empleado = 0;
$sueldoPromedio = 0;
do {
    echo "¿Desea ingresar un sueldo? s(SI) n(NO): ";
    $respuesta = trim(fgets(STDIN));
    if ($respuesta == "s") {
        echo "Ingrese el sueldo: ";
        $sueldoIngresado = trim(fgets(STDIN));
        $sueldoTotal = $sueldoTotal + $sueldoIngresado;
        $empleado++;
        $sueldoPromedio = $sueldoTotal / $empleado;
    }
} while ($respuesta != "n");

echo "El promedio de los " . $empleado . " empleados es: " . $sueldoPromedio;

?>