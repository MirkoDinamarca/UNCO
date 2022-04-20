<?php

include "Teatro.php";
include "Funcion.php";

$primerTeatro = new Teatro("Teatro Nacional Cervantes", "Libertad 815");
$segundoTeatro = new Teatro("Teatro Colón", "Cerrito 628");
$tercerTeatro = new Teatro("Teatro Ópera Orbis", "Av.Corrientes 860");


do {
    echo "¡Bienvenido! ¿Qué desea hacer?\n";
    echo "(1) Crear una función\n";
    echo "(2) Cambiar nombre y dirección de la función\n";
    echo "(3) Salir\n";
    echo "Respuesta: ";
    $respuesta = trim(fgets(STDIN));
    
    switch ($respuesta) {
        case 1:
            echo "Ingrese el ID de la función: ";
            $numFuncion = trim(fgets(STDIN));
            echo "Ingrese el nombre de la función: ";
            $nombre_funcion = strtolower(trim(fgets(STDIN)));
            echo "¿A qué hora inicia?: ";
            $horario_inicio = strtolower(trim(fgets(STDIN)));
            echo "¿Cuál es su duración? (hs): ";
            $obra_duracion = strtolower(trim(fgets(STDIN)));
            echo "¿Precio de la obra?: ";
            $obra_precio = strtolower(trim(fgets(STDIN)));

            $funcion = new Funcion($numFuncion, $nombre_funcion, $horario_inicio, $obra_duracion, $obra_precio);

            echo "(1) Teatro Nacional Cervantes\n";
            echo "(2) Teatro Colón\n";
            echo "(3) Teatro Ópera Orbis\n";
            echo "¿A qué teatro aplicará la obra?: ";
            $opcion = trim(fgets(STDIN));

            switch ($opcion) {
                case 1:
                    echo $primerTeatro->crearFuncion($funcion, $horario_inicio);
                    break;
                case 2:
                    echo $segundoTeatro->crearFuncion($funcion, $horario_inicio);
                    break;
                case 3:
                    echo $tercerTeatro->crearFuncion($funcion, $horario_inicio);
                    break;
            }           
            break;
        case 2:
            echo "Ingrese el ID de la función: ";
            $numFuncion = trim(fgets(STDIN));
            echo "Nombre de la función: ";
            $newName = strtolower(trim(fgets(STDIN)));
            echo "Precio de la función: ";
            $newPrice = strtolower(trim(fgets(STDIN)));
            echo "¿De qué Teatro desea modificar la función?\n";
            echo "(1) Teatro Nacional Cervantes\n";
            echo "(2) Teatro Colón\n";
            echo "(3) Teatro Ópera Orbis\n";
            echo "Opción: ";
            $opcion = trim(fgets(STDIN));

            switch ($opcion) {
                case 1:
                    echo $primerTeatro->cambiarFuncion($numFuncion, $newName, $newPrice);
                    break;
                case 2:
                    echo $segundoTeatro->cambiarFuncion($numFuncion, $newName, $newPrice);
                    break;
                case 3:
                    echo $tercerTeatro->cambiarFuncion($numFuncion, $newName, $newPrice);
                    break;
            }       
            break;
        case 3:
            echo "¡Que tengas un buen día!";
            break;
    }
} while ($respuesta != 3);
