<?php

/* PROGRAMA encontrarNumero */
/* Del número ingresado por el usuario se debe ingresar varios números hasta dar con el mismo */
/* int */

echo "Ingrese el número a encontrar: ";
$numUsuario = trim(fgets(STDIN));
do {
    echo "Ingrese un número para la secuencia: ";
    $numIngresado = trim(fgets(STDIN));
    
    if ($numIngresado == $numUsuario) {
        break;
    }
    
} while ($numIngresado != -1);

if ($numIngresado == $numUsuario) {
    echo "¡" . $numUsuario . " fue encontrado!";
} elseif ($numIngresado == -1) {
    echo "¡" . $numUsuario . " no fue encontrado!";
}






?>