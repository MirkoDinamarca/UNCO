<?php

/* PROGRAMA cantidadDeVocales */
/* El usuario ingresa letras y de todas ellas el programa detecta cuales son vocales */
/* int $vocales string $letras */

$vocales = 0;
do {
    echo "Ingrese letra (- para finalizar): ";
    $letras = trim(fgets(STDIN));
    if ($letras == "a" || $letras == "e" || $letras == "i" || $letras == "o" || $letras == "u") {
        $vocales++;
    }
} while ($letras != "-");

echo "Cant. de vocales: " . $vocales;


?>