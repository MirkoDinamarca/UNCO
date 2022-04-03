<?php


/**
 * (1)
 * Dada una cadena de caracteres terminada en punto retornar la cantidad de letras que contiene la cadena.
 * @param string $cadena
 * @return int
 */
function primerEjercicio($cadena) {
    $caracteres = strlen($cadena) -1;
    return $caracteres;
}
// echo primerEjercicio("Mirko.");


/**
 * (2)
 * Dado un texto terminado en / y un caracter, determinar cuántas veces aparece ese caracter en la cadena.
 * @param string $cadena
 * @return int
 */
function segundoEjercicio($cadena) {
    $ultimoCaracter = substr($cadena, -1);
    $contador = substr_count($cadena, $ultimoCaracter) -1;
    return $contador; 
}
$cantidad = segundoEjercicio("mi mama me mima/m");
echo "La cantidad de veces que aparece ese caracter en la cadena es de " . $cantidad . " veces\n";

/**
 * (3)
 * Dada 2 cadenas cadena1 y cadena2 retornar verdadero si cadena2 se encuentra en cadena1 y falso en caso contrario.
 * @param string $cadena1, $cadena2
 * @return boolean
 */
function tercerEjercicio() {
    // ?
}

/**
 * (4)
 * Dada una cadena retornar su longitud sin utilizar la función count de PHP.
 * @param string $cadena
 * @return int
 */
function cuartoEjercicio($cadena) {
    $cantCaracteres = strlen($cadena);
    return $cantCaracteres;
}

$cantCaracteres = cuartoEjercicio("probando");

echo "La cantidad de caracteres son de " . $cantCaracteres . "\n";

/**
 * (5)
 * Dada 2 cadenas cadena1 y cadena2 retornar la cadena de mayor longitud, invocar al método implementado para el inciso anterior.
 * @param string $cadena1, $cadena2
 * @return int
 */
function quintoEjercicio($cadena1, $cadena2) {
    if (strlen($cadena1) > strlen($cadena2)) {
        $cadenaMayor = $cadena1;
    } else {
        $cadenaMayor = $cadena2;
    }
    return $cadenaMayor;
}

$cadenaMayor = quintoEjercicio("prueba", "probando");

echo "La cadena mayor de ambos string es " . $cadenaMayor;

