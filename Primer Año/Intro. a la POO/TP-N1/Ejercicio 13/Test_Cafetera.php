<?php

require_once "Cafetera.php";

$cafetera = new Cafetera(100, 30);

echo $cafetera;

do {
    echo "¿Qué desea hacer?\n";
    echo "(1) Llenar cafetera\n";
    echo "(2) Servir taza de café\n";
    echo "(3) Vaciar cafetera\n";
    echo "(4) Agregar café\n";
    echo "(5) Salir\n";
    echo "Respuesta: ";
    $respuesta = trim(fgets(STDIN));

    switch ($respuesta) {
        case 1:
            $cafetera->llenarCafetera();
            echo "La cafetera ahora tiene " . $cafetera->getCantidadActual() . "ml\n";
            break;
        case 2:
            echo "¿Cuánto café quiere servir?: ";
            $cantidad = trim(fgets(STDIN));
            $cafetera->servirTaza($cantidad);
            break;    
        case 3:
            $cafetera->vaciarCafetera();
            echo "Su cafetera se ha vaciado\n";
            break;
        case 4:
            echo "¿Cuánto café desea agregar? La cantidad máxima es de 100ml: ";
            $cantidad = trim(fgets(STDIN));
            $cafetera->agregarCafe($cantidad);
            echo "Ahora tiene " . $cafetera->getCantidadActual() . "ml de café\n";
            break;
        case 5:
            echo "Decidiste salir\n";
            break;
    }
} while ($respuesta != 5);

