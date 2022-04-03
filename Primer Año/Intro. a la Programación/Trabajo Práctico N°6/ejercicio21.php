<?php

/* PROGRAMA datosAlumnos */
/* Solicita los datos de cada alumno y en base a ello muestra en pantalla distinta información */
/* int $contador, $mayor, $menor, $anoNac, $edadInicio, $numMayor, $numMenor */
/* string $respuesta */
/* float $altura, $peso, $pesoMenor, $sumaPesos, $alturaMayor */

$contador = 1;
$sumaPesos = 0;
$pesoMenor = 0;
$mayor = 0;
$menor = 999;

do {
    echo "¿Desea ingresar los datos de un alumno?s(SI)/n(NO): ";
    $respuesta = trim(fgets(STDIN));
    if ($respuesta == "s") {
        echo "Ingrese año de nacimiento: ";
        $anoNac = trim(fgets(STDIN));
        echo "Ingrese su altura en metros: ";
        $altura = trim(fgets(STDIN));
        echo "¿Cuál es su peso en kilogramos?: ";
        $peso = trim(fgets(STDIN));
        $sumaPesos = $sumaPesos + $peso; // Sumatoria
        $edadInicio = 2021 - $anoNac;

        // Se calcula si la edad es mayor o no
        if ($edadInicio >= $mayor) {
            $numMayor = $contador;
            $mayor = $edadInicio;
            $alturaMayor = $altura;
        }
        // Se calcula si la edad es menor o no
        if ($edadInicio <= $menor) {
            $numMenor = $contador;
            $menor = $edadInicio;
            $pesoMenor = $peso;
        }    
        $contador++;
    }
} while ($respuesta != "n");

$promedio = $sumaPesos / ($contador - 1);

echo "El alumno N°" . $numMayor . " es el mayor, tiene " . $mayor . " años y su altura es de " . $alturaMayor . "mts\n";
echo "El alumno N°" . $numMenor . " es el menor, tiene " . $menor . " años y su peso es de " . $pesoMenor . "kg\n";
echo "El peso promedio es de " . $promedio;










?>