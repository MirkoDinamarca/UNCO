<?php

require_once "CuentaBancaria.php";

$cuenta = new CuentaBancaria(10, 41609029, 80000, 30000);

echo "¡Buenos días! Su N° de cuenta es " . $cuenta->getNumCuenta() . " DNI: " . $cuenta->getdniCliente() . "\n" . 
        "Tiene actualmente $" . $cuenta->getSaldoActual() . "\n";

do {
    echo "¿Qué operación va a realizar?\n";
    echo "(1) Actualizar saldo con intereses\n";
    echo "(2) Depositar dinero\n";
    echo "(3) Retirar dinero\n";
    echo "(4) Finalizar\n";

    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            $saldoConInteres = $cuenta->actualizarSaldo();
            echo "Su saldo más intereses es de $" . $saldoConInteres . "\n";
            break;

        case 2:
            echo "¿Cuánto dinero desea ingresar?: ";
            $cantidad = trim(fgets(STDIN));
            $cuenta->depositar($cantidad);
            echo "Le quedó un total de $" . $cuenta->getSaldoActual() . "\n";
            break;

        case 3:
            echo "¿Cuánto dinero desea retirar?: ";
            $cantidad = trim(fgets(STDIN));

            if ($cuenta->getSaldoActual() < $cantidad) {
                echo "No es posible retirar esa cantidad de dinero ya que se excede el saldo actual\n";
            } else {
                $cuenta->retirar($cantidad);
                echo "Retiraste $" . $cantidad . " y le quedó un total de $" . $cuenta->getSaldoActual() . "\n";
            }
            break;

        case 4:
            echo "¡Que tengas buen día!";
            break;
    }
} while ($opcion != 4);