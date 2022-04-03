<?php

$contador = 1;
$i = 0;
$oracion = "";
echo "¿Cuántas palabras desea ingresar?: ";
$cantidadPalabras = trim(fgets(STDIN));
do {
    echo "Ingrese la palabra: ";
    $palabra = trim(fgets(STDIN));
    echo "Su palabra número " . $contador . " es: " . $palabra . "\n";
    $contador++;
    $oracion = $oracion . " " . $palabra;
    $i++;
} while ($i < $cantidadPalabras);
echo $oracion;








?>