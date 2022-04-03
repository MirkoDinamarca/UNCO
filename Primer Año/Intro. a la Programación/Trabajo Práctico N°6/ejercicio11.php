<?php

/* PRROGRAMA sumatoriaNumero2 */
/* Calcula la sumatoria de un número ingresado por el usuario */
/* int $sumatoria, $numUsuario, $numDoble */

echo "Ingrese un número para calcular su sumatoria: ";
$sumatoria = 0;
$numUsuario = trim(fgets(STDIN));
$numDoble = $numUsuario * 2;
for ($i = 1; $i <= $numDoble; $i++) {
    if ($i % 2 != 0) {
        $sumatoria = $sumatoria + $i;
    }
}
echo "La sumatoria del número ingresado " . $numUsuario . " es " . $sumatoria;

?>