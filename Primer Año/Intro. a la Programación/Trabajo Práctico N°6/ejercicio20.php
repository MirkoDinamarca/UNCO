<?php

/**
 * (a)
 * Dado un número, la función lo va a retornar de manera inversa
 * @param int $numero
 * @return int
 */

function inversion($numero) {
    $i = 0;
    $numInvertido = 0;
    do {
        $restoNum = $numero % 10;
        $numerosRestantes = (int)($numero / 10);
        $numero = $numerosRestantes;
        $numAnterior = $numInvertido;
        $numInvertido = $restoNum;
        if ($i > 0) {
            $numInvertido = $numAnterior * 10 + $numInvertido;
        }
        $i++;
    } while ($numerosRestantes != 0);
    return $numInvertido;
}

/**
 * (b)
 * Dado un número, la función suma sus dígitos y los retorna
 * @param int $numero
 * @return int
 */

function sumaNumeros($numero) {
    $numInvertido = 0;
    $sumaTotal = 0;
    do {
        $restoNum = $numero % 10;
        $numerosRestantes = (int)($numero / 10);
        $numero = $numerosRestantes;
        $numInvertido = $restoNum;
        $sumaTotal = $sumaTotal + $numInvertido;
    } while ($numerosRestantes != 0);
    return $sumaTotal;
}

/**
 * (c)
 * Dado un número, la función retorna los divisores del mismo
 * @param int $numero
 * @return int
 */

function divisoresNumero($numero) {
    echo "Los divisores son: ";
    for ($i = 1; $i <= $numero; $i++) { 
        if ($numero % $i == 0) {
            echo $i . ", "; 
        }
    }   
}

/**
 * (d)
 * Dado un número, determina si el mismo es un número primo o no
 * @param int $numero
 * @return int
 */

function numeroPrimo($numero) {
    $contador = 0;
    $resultado = True;
    for ($i = 1; $i < $numero; $i++) { 
        if ($numero % $i == 0) {
            // Si al $numero se lo puede dividir por más de un número eso lo convierte en un número compuesto
            // y no primo, por lo cual, retorna false
            if ($contador++ > 1) {
                $resultado = False;
            }
        }
    }
    return $resultado;
}

echo numeroPrimo(7);

?>