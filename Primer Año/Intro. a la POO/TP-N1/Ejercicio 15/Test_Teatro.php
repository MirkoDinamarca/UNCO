<?php

require_once "Teatro.php";

$teatro = new Teatro("Cine Español", "Avenida Argentina");

do {
    echo "¿Qué desea hacer?: \n";
    echo "(1) ¿Cambiar nombre y dirección del teatro?\n";
    echo "(2) ¿Cambiar nombre y precio de la función?\n";
    echo "(3) Salir\n";
    echo "Opción: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            echo "¿Qué nombre va a tener el teatro?: ";
            $newName = trim(fgets(STDIN));
            echo "¿Y su dirección?: ";
            $newDirection = trim(fgets(STDIN));
            $teatro->cambiarTeatro($newName, $newDirection);
            echo "Su teatro ahora se llama " . $teatro->getNombreTeatro() . " y su nueva dirección es " . $teatro->getDireccionTeatro() . "\n";
            break;
        case 2:
            echo "¿Qué función va a escoger?(1-4): ";
            $numero = trim(fgets(STDIN));
            echo "¿Qué nombre va a tener la función?: ";
            $newName = trim(fgets(STDIN));
            echo "¿Y su precio?: ";
            $newPrice = trim(fgets(STDIN));
            $teatro->cambiarFuncion($numero, $newName, $newPrice);

            if ($numero == 1) {
                echo "Su función ahora se llama " . $teatro->getPrimerFuncion()["nombre"] . " con un valor de $" . $teatro->getPrimerFuncion()["precio"] . "\n";
            } else if ($numero == 2) {
                echo "Su función ahora se llama " . $teatro->getSegundaFuncion()["nombre"] . " con un valor de $" . $teatro->getSegundaFuncion()["precio"] . "\n";
            } else if ($numero == 3) {
                echo "Su función ahora se llama " . $teatro->getTerceraFuncion()["nombre"] . " con un valor de $" . $teatro->getTerceraFuncion()["precio"] . "\n";
            } else {
                echo "Su función ahora se llama " . $teatro->getCuartaFuncion()["nombre"] . " con un valor de $" . $teatro->getCuartaFuncion()["precio"] . "\n";
            }
            break;
        case 3:
            echo "¡Que tengas un buen día!";
            break;
    }
} while ($opcion != 3);
