<?php

require_once "Calculadora.php";

$calculadora = new Calculadora(10, 2);

do {
    echo "¿Qué operación va a realizar?\n";
    echo "(+) Sumar\n";
    echo "(-) Restar\n";
    echo "(*) Multiplicar\n";
    echo "(/) Dividir\n";

    echo "(1) Salir\n";
    echo "Operación: ";
    $operacion = trim(fgets(STDIN));

    switch ($operacion) {
        case "+":
            echo "La suma es: " . $calculadora->sumar() . "\n";
            break;
        case "-":
            echo "La resta es: " . $calculadora->restar() . "\n";
            break;
        case "*":
            echo "La multiplicación es: " . $calculadora->multiplicar() . "\n";
            break;
        case "/":
            echo "La división es: " . $calculadora->dividir() . "\n";
            break;
        case 1:
            echo "Finalizaste la operación";
            break;
    }
} while ($operacion != 1);