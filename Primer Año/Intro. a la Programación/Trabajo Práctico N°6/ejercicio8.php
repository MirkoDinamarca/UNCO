<?php

/* PROGRAMA sumaDeNumeros*/
/* Le solicita al usuario ingresar 4 números los cuales se van a sumar y mostrar en pantalla */
/* int $sumaNums, $numUsuario, $numero */

$sumaNums = 0;
echo "¿Cuántos números desea sumar?: ";
$numUsuario = trim(fgets(STDIN));

for($i = 1; $i <= $numUsuario; $i++) {
    echo "Ingrese el número " . $i . ": ";
    $numero = trim(fgets(STDIN));
    $sumaNums = $sumaNums + $numero;
}
echo "La suma de los números ingresados son: " . $sumaNums;














?>