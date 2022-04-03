<?php

//  6. Dado un número que se corresponde a un año calendario, retornar un arreglo con todos los años bisiestos 
// menores al año ingresado.

function anioBisiesto($anio) {
    $aniosAnteriores = 0;
    $arrayAnios = [];
    
    for ($i=0; $i < $anio; $i++) { 
        $aniosAnteriores = $anio - 1; // Le va a restar 4 a $aniosAnteriores
        $restaAños = $aniosAnteriores; // a $restaAños le almacenamos el $aniosAnteriores
        $anio = $aniosAnteriores; // Y para la otra vuelta, a $anio le almacenamos el $aniosAnteriores

        if ($restaAños % 4 === 0) {
            $arrayAnios[] = $restaAños; // Se van almacenando los años bisiestos en el arreglo
        } 
    }
    return $arrayAnios;
}

print_r(anioBisiesto(2030));