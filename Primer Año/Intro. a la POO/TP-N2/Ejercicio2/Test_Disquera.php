<?php

include "../Ejercicio1/Persona.php";
include "Disquera.php";

$persona = new Persona("Mirko", "Dinamarca", "DNI", 41609029);

$disquera = new Disquera(9, 20, "Av. Argentina 420");
$disquera->setDuenio($persona->getNombre());
echo $disquera;

do {
    echo $disquera->getEstadoAbierta() . "\n";
    echo "(1) Consultar si está abierto\n";
    echo "(2) Abrir Disquera\n";
    echo "(3) Cerrar Disquera\n";
    echo "(4) Salir\n";
    echo "Opción a elegir: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1: 
            echo "¿Qué hora quiere consultar?: ";
            $hora = trim(fgets(STDIN));
            echo "¿Minutos?: ";
            $minutos = trim(fgets(STDIN));
            $openClose = $disquera->dentroHorarioAtencion($hora, $minutos);
            if ($openClose == 1) {
                echo "¡Si se encuentra abierta!";
            } else {
                echo "Se encuentra cerrada :(";
            }
            break;
        case 2:
            $disquera->abrirDisquera(10, 50);
            if ($disquera->getEstadoAbierta() == 1) {
                echo "La disquera se encuentra abierta\n";
            } else {
                echo "La disquera está cerrada\n";
            }
            break;
        case 3:
            $disquera->cerrarDisquera(21, 40);
            if ($disquera->getEstadoCerrada() == 1) {
                echo "La disquera se encuentra cerrada\n";
            } else {
                echo "La disquera está abierta\n";
            }
            break;
        case 4:
            echo "Que tengas buen día";
            break;
    }
} while ($opcion != 4);





