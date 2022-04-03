<?php

include "Viaje.php";

$viaje = new Viaje(1, "Bariloche", 2);

echo "--------------------------------------------------\n";
echo "¡Bienvenido al Viaje! ¿Qué desea hacer?\n";
do {
    echo "--------------------------------------------------\n";
    echo "(1) Modificar el código\n";
    echo "(2) Modificar el destino\n";
    echo "(3) Modificar la cantidad máxima de pasajeros\n";
    echo "(4) Agregar nuevos pasajeros\n";
    echo "(5) Mostrar y/o modificar los datos de los pasajeros\n";
    echo "(6) Ver información sobre el viaje\n";
    echo "(7) Salir\n";
    echo "Respuesta: ";
    $respuesta = trim(fgets(STDIN));

    switch ($respuesta) {
        case 1:
            echo "Ingrese nuevo código: ";
            $respuesta = trim(fgets(STDIN));
            $viaje->setCodigo($respuesta);
            echo "Código cambiado correctamente\n\n";
            break;
        case 2:
            echo "Ingrese nuevo destino: ";
            $respuesta = trim(fgets(STDIN));
            $viaje->setDestino($respuesta);
            echo "Destino cambiado correctamente\n\n";
            break;
        case 3:
            echo "Ingrese la cantidad máxima de pasajeros: ";
            $respuesta = trim(fgets(STDIN));
            $viaje->setCantMaxPasajeros($respuesta);
            echo "La cantidad máxima ahora es de " . $viaje->getCantMaxPasajeros() . " pasajeros\n\n";
            break;
        case 4:
            if (count($viaje->getPasajeros()) <= $viaje->getCantMaxPasajeros()) {
                echo "Ingrese el nombre del pasajero: ";
                $nombre = trim(fgets(STDIN));
                echo "Su apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Su DNI: ";
                $dni = trim(fgets(STDIN));
                
                if ($viaje->verificarDni($dni)) {
                    echo "¡No pueden haber dos pasajeros iguales!\n\n";                                
                } else {
                    
                    $pasajero = [
                        "nombre" => $nombre,
                        "apellido" => $apellido,
                        "dni" => $dni,
                    ];
        
                    $viaje->agregarPasajeros($pasajero);
                    echo "Pasajero agregado correctamente\n\n";
                }
            } else {
                echo "¡La cantidad de pasajeros excede el límite de pasajero!\n\n";
            }
            break;
        case 5:
            $i = 0;
            foreach ($viaje->getPasajeros() as $key => $pasajero) {
                echo "---------------------------------------------\n";
                echo "Pasajero N°" . $i . "\n"; 
                echo "Nombre: " . $pasajero["nombre"] . "\n";
                echo "Apellido: " . $pasajero["apellido"] . "\n";
                echo "DNI: " . $pasajero["dni"] . "\n";
                echo "---------------------------------------------\n";
                $i++;
            }
            echo "¿Desea modificar algún pasajero?\n";
            echo "Respuesta(si/no): ";
            $respuesta = trim(fgets(STDIN));

            if ($respuesta === "si") {
                echo "Ingrese N° del pasajero: ";
                $numero = trim(fgets(STDIN));
                if ($numero <= count($viaje->getPasajeros()) && $numero > -1) {
                    echo "¿Qué desea cambiar?\n";
                    echo "(1) Nombre\n";
                    echo "(2) Apellido\n";
                    echo "(3) DNI\n";
                    echo "(4) Eliminar\n";
                    echo "Opción: ";
                    $opcion = trim(fgets(STDIN));
                    switch ($opcion) {
                        case 1:
                            echo "Ingrese el nombre: ";
                            $nombre = trim(fgets(STDIN));
                            $key = "nombre";
    
                            $viaje->modificarPasajero($numero, $nombre, $key);
                            echo "Nombre modificado correctamente\n";
                            break;         
                        case 2:
                            echo "Ingrese el apellido: ";
                            $apellido = trim(fgets(STDIN));
                            $key = "apellido";
    
                            $viaje->modificarPasajero($numero, $apellido, $key);
                            echo "Apellido modificado correctamente\n";
                            break;
                        case 3:
                            echo "Ingrese el DNI: ";
                            $dni = trim(fgets(STDIN));
                            $key = "dni";
    
                            if ($viaje->verificarDni($dni)) {
                                echo "¡No pueden haber dos pasajeros iguales!\n\n";                                
                            } else {
                                $viaje->modificarPasajero($numero, $dni, $key);
                                echo "DNI modificado correctamente\n";
                            }
                            
                            break;
                        case 4:
                            $viaje->eliminarPasajero($numero);
                            echo "¡Pasajero eliminado correctamente!\n\n";
                            break;
                    }
                } else {
                    echo "¡No existe tal pasajero!\n\n";
                }
            } else if ($respuesta == "no") {
                echo "A elegido no modificar los pasajeros\n\n";
            }
            break;
        case 6:
            echo $viaje;
            break;
        case 7:
            echo "¡Que tenga un buen día!";
            break;  
    }
} while ($respuesta != 7);

?>