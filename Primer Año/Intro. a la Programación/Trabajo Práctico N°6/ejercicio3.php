<?php

/* PROGRAMA Principal */
/* Se muestra en pantalla los números menores al número que ingresa el usuario */
/* float $numeroUsuario, $numeroPositivo */

$numeroPositivo = 1;
echo "Por favor, ingrese un número: ";
$numeroUsuario = trim(fgets(STDIN));
while ($numeroPositivo < $numeroUsuario) {
    echo $numeroPositivo . ", ";
    $numeroPositivo = $numeroPositivo + 1;
}

?>