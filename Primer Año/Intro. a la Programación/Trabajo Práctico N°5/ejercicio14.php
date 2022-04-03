<?php

/**
 * @param int $horaIn
 * @param int $minutosIn
 * @param int $segundosIn
 * @param string $tipoH
 * @return int
 */
function aSegundos($horaIn, $minutosIn, $segundosIn, $tipoH) {
    /* int $cantidadSegundos */
    if ($tipoH == "PM") {
        $horaIn = $horaIn + 12;
        $cantidadSegundos = ($horaIn * 3600) + ($minutosIn * 60) + $segundosIn;
    } 
    $cantidadSegundos = ($horaIn * 3600) + ($minutosIn * 60) + $segundosIn;
    return $cantidadSegundos;
}

/**
 * De los segundos ingresados, los devuelve como hora:minutos:segundos
 * @param $segundosIngresados
 * @return string
 */

function formatoHora($segundosIngresados) {
    /* int $horas, $minutos, $segundos, $resto1, $resultado */
    $horas = (int)($segundosIngresados / 3600);
    $resto1 = $segundosIngresados % 3600;
    $minutos = (int)($resto1 / 60);
    $segundos = $resto1 % 60;
    $resultado = $horas . "h:" . $minutos . "m:" . $segundos . "s";
    return $resultado;
}

/**
 * Determina si la primer hora es menor que la segunda
 * @param int $segundos1
 * @param int $segundos2
 * @return bool
 */

function esMenor($segundos1, $segundos2) {
    /* boolean $resultado */
    $resultado = False;
    if ($segundos1 < $segundos2) {
        $resultado = True;
    }

    return $resultado; 
}

/**
 * Calcula la diferencia de horas que hay entre una hora y la otra
 * @param $segundos1
 * @param $segundos2
 * @return string
 */

function difHoras($segundos1, $segundos2) {
    /* int $diferenciaHoras, $segundosFormateados, $segundosMostrar */
    $diferenciaHoras = abs($segundos1 - $segundos2);
    $segundosFormateados = formatoHora($diferenciaHoras);
    $segundosMostrar = "La diferencia de horas es: " . "\n" . $segundosFormateados;
    return ($segundosMostrar);
}


echo "Ingrese la primer hora: ";
$hora = trim(fgets(STDIN));
echo "Ingrese los minutos: ";
$minutos = trim(fgets(STDIN));
echo "Ingrese los segundos: ";
$segundos = trim(fgets(STDIN));
echo "Ingrese el tipo de horario(AM/PM): ";
$tipo = trim(fgets(STDIN));

$horaSegundos1 = aSegundos($hora, $minutos, $segundos, $tipo);

echo "Ingrese la primer hora: ";
$hora = trim(fgets(STDIN));
echo "Ingrese los minutos: ";
$minutos = trim(fgets(STDIN));
echo "Ingrese los segundos: ";
$segundos = trim(fgets(STDIN));
echo "Ingrese el tipo de horario(AM/PM): ";
$tipo = trim(fgets(STDIN));

$horaSegundos2 = aSegundos($hora, $minutos, $segundos, $tipo);

$horasOrdenadas = esMenor($horaSegundos1, $horaSegundos2);
echo "Las horas ordenadas de mayor a menor son:" . "\n";

if($horasOrdenadas) {
    echo formatoHora($horaSegundos2) . "\n";
    echo formatoHora($horaSegundos1) . "\n";
} else {
    echo formatoHora($horaSegundos1) . "\n";
    echo formatoHora($horaSegundos2) . "\n";
}

echo difHoras($horaSegundos1, $horaSegundos2);

?>