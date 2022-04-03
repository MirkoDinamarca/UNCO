<?php

/* PROGRAMA infoEmpleados */
/* Solicita los datos del empleado y luego muestra por pantalla el de menor edad 
calcula también el porcentaje de quiénes son profesionales y el promedio de quienes son técnicos */
/* int $empleados, $profesionales, $suma, $tecnico, $menor, $edad */
/* float $porcentaje, $prom */
/* string $respuesta, $empleado, $nombre, $puesto */

$nombre = "";
$empleados = 0;
$profesionales = 0;
$porcentaje = 0;
$prom = 0;
$suma = 0;
$tecnico = 0;
$menor = 999;

echo "¿Desea ingresar el nombre de un empleado?si/no: ";
$respuesta = trim(fgets(STDIN));

while ($respuesta == "si") {
    echo "Ingrese el nombre del empleado: ";
    $empleado = trim(fgets(STDIN));
    echo "¿Cuál es la edad del empleado?: ";
    $edad = trim(fgets(STDIN));
    echo "¿Cuál es su puesto actual?: ";
    $puesto = trim(fgets(STDIN));
    
    if ($edad <= $menor) {
        $nombre = $empleado;
        $menor = $edad;
    }


    if ($puesto == "p") {
        $profesionales++;
    } elseif ($puesto == "t") {
        $suma = $suma + $edad;
        $tecnico++;
    }
    $empleados++;

    echo "¿Desea ingresar otro empleado?: ";
    $respuesta = trim(fgets(STDIN));
}

if ($empleados > 0) {
    echo "La persona con menor edad es: " . $nombre . "\n";

    $porcentaje = ($profesionales * 100) / $empleados;
    echo "El porcentaje que representan los profesionales de la empresa es el: " . $porcentaje . "%\n";

    if ($tecnico > 0) {
        $prom = $suma / $tecnico;
        echo "El promedio de edad del personal técnico es: ". $prom . "\n";
    }
} else {
    echo "Error, no se ingresaron datos.\n";
}














?>