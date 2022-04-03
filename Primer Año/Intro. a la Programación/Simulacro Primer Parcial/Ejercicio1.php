<?php

/**
 * (A)
 * @param int $codigoIn
 * @param int $codigoArea
 * @return string
 */

function telefonia($codigoIn, $codigoArea) {
    /* string $tipoLlamada */
    if ($codigoIn == 54) {
        $tipoLlamada = "Nacional";
        if ($codigoArea == 299) {
            $tipoLlamada = "Corta";
        } else {
            $tipoLlamada = "Larga";
        }
    } else {
        $tipoLlamada = "Internacional";
    }
    return $tipoLlamada;
}

/**
 * (B)
 * Verifica el tipo de llamada y 
 * dependiendo de donde sea, devuelve el costo de dicha llamada
 * @param string $tipoLlamada
 * @param int $segundosLlamada
 * @return float $valor
 */

function valorLlamada($tipoLlamada, $segundosLlamada) {
    /* float $valor */
    if ($tipoLlamada == "Internacional") { 
        $valor = 2 * $segundosLlamada;
    } else if ($tipoLlamada == "Larga") {
        $valor = 0.75 * $segundosLlamada;
    } else {
        $valor = 0.2 * $segundosLlamada;
    }
    return $valor;
}

/* PROGRAMA empresaTelefonica */
/* Se ingresa código internacional, de área y utilizando ambos métodos vistos anteriormente, 
devuelve el costo de la llamada y su tipo */
/* int $codigoInternacional, $codigoDeArea, segundos string $tipo
float costo */

echo "Por favor, ingrese el Código Internacional: ";
$codigoInternacional = trim(fgets(STDIN));
echo "Por favor, ingrese el Código de Área: ";
$codigoDeArea = trim(fgets(STDIN));
echo "¿Cuántos segundos necesita?: ";
$segundos = trim(fgets(STDIN));
$tipo = telefonia($codigoInternacional, $codigoDeArea);
$costo = valorLlamada($tipo, $segundos);
echo "El tipo de llamada que va a realizar es: " . $tipo . " y su
      costo es de: $" . $costo; 

?>