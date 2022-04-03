<?php

/* PROGRAMA sumaDeImpares */
/* Retorna la suma de los números impares naturales que hay en entre dos números que va a ingresar el usuario */
/* int $numMinimo, $numMaximo, $sumaNums, $i */
$sumaNums = 0;
echo "Por favor, ingrese un número mínimo: ";
$numMinimo = trim(fgets(STDIN));
echo "Por favor, ingrese un número máximo: ";
$numMaximo = trim(fgets(STDIN));

for($i = $numMinimo + 1; $i < $numMaximo; $i++) {
    // echo $i . ", ";
    if ($i % 2 != 0) {
        $sumaNums = $sumaNums + $i;
    }
    echo $i . ", ";
}
echo "La suma de los números impares entre " . $numMinimo . " y " . $numMaximo . " es: " . $sumaNums;