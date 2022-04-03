<?php

/**
 * Calcula su IMC
 * @param float $peso
 * @param float $estatura
 * @return float
 */

function calculoImc($peso, $estatura) {
    $imc = bcdiv($peso / ($estatura * $estatura), "1", 1);
    return $imc;
}

/**
 * Retorna la clasificación de la OMS del estado nutricional de una persona
 * @param $imc
 * @return string
 */

function clasificacionPersona($imc) {
    /* string estado */
    if ($imc < 18.5) {
        $estado = "Bajo Peso";
    } else if (18.5 >= $imc || $imc <= 24.99) {
        $estado = "Normal";
    } else if (25 >= $imc || $imc <= 29.99) {
        $estado = "Sobrepeso";
    } else if (30 >= $imc || $imc <= 34.99) {
        $estado = "Obesidad Leve";
    } else if (35 >= $imc || $imc <= 39.99) {
        $estado = "Obesidad Media";
    } else if ($imc >= 40) {
        $estado = "Obesidad Mórbida";
    }

    return $estado;
} 

/* PROGRAMA calculadoraDeImc */
/* Calcula el IMC de una persona e informa sobre su estado nutricional */
/* float peso, estatura, imc, string clasificacionImc */

echo "Por favor, ingrese su peso en kg: ";
$peso = trim(fgets(STDIN));
echo "Ingrese su estatura en metros: ";
$estatura = trim(fgets(STDIN));
$imc = calculoImc($peso, $estatura);
$clasificicacionImc = clasificacionPersona($imc);
echo "Su índice de masa corporal es: " . $imc . " lo que indica 
      que su peso se encuentra en la categoría de " . $clasificicacionImc . " según la OMS";

?>
