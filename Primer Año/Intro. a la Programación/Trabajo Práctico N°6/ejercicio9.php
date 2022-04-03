<?php

/* PROGRAMA factorialNumero */
/* Calcula el factorial de un número ingresado por el usuario */
/* int $factorial, $numUsuario */

$factorial = 1;
echo "Ingrese el número para obtener su factorial: ";
$numUsuario = trim(fgets(STDIN));
for ($i = 1; $i <= $numUsuario; $i++) {
    $factorial = $factorial * $i;
}
echo "El factorial es: " . $factorial;
?>