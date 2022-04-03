<?php

/* PROGRAMA sucesionFibonacci */
/* Del número ingresado, genera los primeros términos de la sucesión de Fibonacci */
/* int $primero, $segundo, $numUsuario, $i, $sucesion */

$primero = 0;
$segundo = 1;
echo "Ingrese un número entero mayor a 0: ";
$numUsuario = trim(fgets(STDIN));
echo $segundo . ", ";
for ($i = 0; $i < $numUsuario; $i++) {
    $sucesion = $primero + $segundo;
    $primero = $segundo;
    $segundo = $sucesion;
    echo $sucesion . ", ";
}
echo "\nFIN";


/* 
$sucesion = 1; // Segundo
echo "Ingrese un número: ";
$numUsuario = trim(fgets(STDIN));

for ($i = 2; $i < $numUsuario; $i++) {
    $resultado = ($i - 2) + ($i - 1);
    echo $resultado . ", ";
}
*/

/*
primero // 1
0 + primero = segundo // 1
primero + segundo = tercero // 2
segundo + tercero = cuarto // 3
tercero + cuarto = quinto // 5
*/



?>