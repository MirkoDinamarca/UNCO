<?php

/**
 * Teniendo el número de prueba y su tipo, retorna el puntaje obtenido del resto por 6
 * @param int $prueba
 * @param string $tipoPrueba
 * @return int
 */

function concursoPuntaje($prueba, $tipoPrueba) {
    /* int $puntaje */
    $puntaje = $prueba % 6;
    if ($tipoPrueba == "Tecnica") {
        $puntaje = $puntaje + 20;
    } elseif ($tipoPrueba == "Decorativa") {
        $puntaje = $puntaje + 30;
    }
    return $puntaje;
}


/**
 * Tiene como entrada el puntaje y retorna la cantidad de minutos que corresponde
 * @param int $puntaje
 * @return int
 */

function concursoMinutos($puntaje) {
    /* int $minutos */
    if ($puntaje < 21) {
        $minutos = 3;
    } elseif (21 <= $puntaje && $puntaje < 25) {
        $minutos = 4;
    } elseif (25 <= $puntaje && $puntaje < 31) {
        $minutos = 5;
    } elseif ($puntaje >= 31) {
        $minutos = 6;
    }
    return $minutos;
}

/* PROGRAMA concursoBakeOff */
/* Solicita el número de prueba y también su tipo. 
Luego retorna los minutos extras correspondientes */
/* int $numPrueba, $puntajePrueba, $minutosExtras string $tipoDePrueba */

echo "Por favor, ingrese el número de prueba: ";
$numPrueba = trim(fgets(STDIN));
echo "Ingrese el tipo de prueba para clasificar: ";
$tipoDePrueba = trim(fgets(STDIN));
$puntajePrueba = concursoPuntaje($numPrueba, $tipoDePrueba);
$minutosExtras = concursoMinutos($puntajePrueba);
echo "¡Los minutos extras para el día domingo son: " . $minutosExtras . "!";

?>