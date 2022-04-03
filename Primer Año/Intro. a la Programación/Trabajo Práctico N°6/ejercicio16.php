<?php

/* PROGRAMA oracionDePalabras */
/* El usuario ingresa palabras y el programa va armando la oración */
/* string $oracion, $palabra */

$oracion = "";
do {
    echo "Ingrese palabra (. para finalizar): ";
    $palabra = trim(fgets(STDIN));
    $oracion = $oracion . " " . $palabra;
} while ($palabra != ".");

echo $oracion;







?>