<?php

/* PRROGRAMA sumatoriaNumero */
/* Calcula la sumatoria de un número ingresado por el usuario */
/* int $sumatoria, $numUsuario */

echo "Ingrese un número para calcular su sumatoria: ";
$sumatoria = 0;
$numUsuario = trim(fgets(STDIN));
for ($i = 1; $i <= $numUsuario; $i++) {
    $sumatoria = $sumatoria + $i;
    echo $i . ", ";
}

echo "La sumatoria del número ingresado " . $numUsuario . " es " . $sumatoria;







?>