<?php

/* PROGRAMA desiinosTuristicos */

$totalTuristas = 0;
$sumaDolares = 0;
$turistasSanMartin = 0;
$mayorCantTuristas = 0;
$cantDestinos = 0;

do {
    echo "Ingrese el nombre del destino turístico por favor: ";
    $destino = trim(fgets(STDIN));
    echo "¿Cuál es la cantidad de turistas?: ";
    $cantTuristas = trim(fgets(STDIN));
    $totalTuristas = $totalTuristas + $cantTuristas;
    echo "¿Cuánto es el ingreso (en millones de dólares)?: ";
    $dolares = trim(fgets(STDIN));
    $sumaDolares = $sumaDolares + $dolares;

    if ($destino == "San Martin de Los Andes") {
        $turistasSanMartin = $turistasSanMartin + $cantTuristas;
    }

    if ($cantTuristas > $mayorCantTuristas) {
        $destMayorTuristas = $destino;
        $mayorCantTuristas = $cantTuristas;
    }
    $cantDestinos++;

    echo "¿Desea ingresar datos de algún destino turístico?s(SI)/n(NO): ";
    $respuesta = trim(fgets(STDIN));
    
} while ($respuesta <> "n");

if ($cantDestinos > 0) {
    $promedio = $sumaDolares / $cantDestinos;
    $porcentaje = ($turistasSanMartin * 100) / $totalTuristas;
    
    echo "El promedio de ingresos en millones de dólares es: " . $promedio . "\n";
    echo "El porcentaje de la cantidad de turistas que recibieron destino a San Martin es de: " . $porcentaje . "%\n";
    echo "El Destino Turístico con mayor cantidad de turistas es: " . $destMayorTuristas;
} else {
    echo "Error, no se ingresaron datos del destino.";
}



?>