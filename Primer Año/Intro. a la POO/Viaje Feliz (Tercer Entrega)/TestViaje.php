<?php

include "Viaje.php";
include "ViajeAereo.php";
include "ViajeTerrestre.php";
include "Pasajero.php";
include "Responsable.php";

/* Viaje Aéreo con Ida y Vuelta, primera clase, 2 escalas */
$viaje = new ViajeAereo(1, "EEUU", 4, 250, "ida", "vuelta", 23, true, "LATAM", 2);

/* Viaje Aéreo con Ida, primera clase, sin escalas */
// $viaje = new ViajeAereo(2, "Buenos Aires", 2, 140, "ida", "", 40, true, "Flybondi", 0);

/* Viaje Terrestre con Ida y Vuelta, comodidad cama */
// $viaje = new ViajeTerrestre(3, "San Martin de los Andes", 3, 105, "ida", "vuelta", "cama");

/* Viaje Terrestre con Ida, comodidad semicama */
// $viaje = new ViajeTerrestre(4, "Bariloche", 2, 80, "ida", "", "semicama");

echo "--------------------------------------------------\n";
echo "¡Bienvenido a la Empresa Viaje Feliz! \n";

echo "Ingrese el nombre del responsable del viaje: ";
$nombre = trim(fgets(STDIN));
echo "Apellido: ";
$apellido = trim(fgets(STDIN));
echo "N° de Licencia: ";
$nroLicencia = trim(fgets(STDIN));
echo "N° de Empleado: ";
$nroEmpleado = trim(fgets(STDIN));

$empleadoResponsable = new Responsable($nroEmpleado, $nroLicencia, $nombre, $apellido);
$viaje->setEmpleadoResponsable($empleadoResponsable);

do {
    echo "\n--------------------------------------------------\n";
    echo "¿Qué desea hacer?\n";
    echo "(1) Modificar el código\n";
    echo "(2) Modificar el destino\n";
    echo "(3) Modificar la cantidad máxima de pasajeros\n";
    echo "(4) Vender pasaje\n";
    echo "(5) Mostrar y/o modificar los datos de los pasajeros\n";
    echo "(6) Ver información sobre el viaje\n";
    echo "(7) Modificar responsable del viaje\n";
    echo "(8) Salir\n";
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
            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Su apellido: ";
            $apellido = trim(fgets(STDIN));
            echo "Su DNI: ";
            $dni = trim(fgets(STDIN));
            echo "Su Teléfono: ";
            $telefono = trim(fgets(STDIN));

            if ($viaje->verificarDni($dni)) {
                echo "¡No pueden haber dos pasajeros iguales!\n\n";                                
            } else {
                
                $pasajero = new Pasajero($nombre, $apellido, $dni, $telefono);
                echo "Pasajero agregado correctamente, el importe total del pasaje fue de $" . $viaje->venderPasaje($pasajero) . "\n\n";

            }
            break;
        case 5:
            $i = 0;
            foreach ($viaje->getPasajeros() as $key => $pasajero) {
                echo "---------------------------------------------\n";
                echo "Pasajero N°" . $i . "\n"; 
                echo "Nombre: " . $pasajero->getNombre() . "\n";
                echo "Apellido: " . $pasajero->getApellido() . "\n";
                echo "DNI: " . $pasajero->getDni() . "\n";
                echo "Teléfono: " . $pasajero->getTelefono() . "\n";
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
                    echo "(4) Teléfono\n";
                    echo "(5) Eliminar\n";
                    echo "Opción: ";
                    $opcion = trim(fgets(STDIN));
                    switch ($opcion) {
                        case 1:
                            echo "Ingrese el nombre: ";
                            $nombre = trim(fgets(STDIN));
    
                            $viaje->modificarPasajero($numero, $nombre, $opcion);
                            echo "Nombre modificado correctamente\n";
                            break;         
                        case 2:
                            echo "Ingrese el apellido: ";
                            $apellido = trim(fgets(STDIN));
    
                            $viaje->modificarPasajero($numero, $apellido, $opcion);
                            echo "Apellido modificado correctamente\n";
                            break;
                        case 3:
                            echo "Ingrese el DNI: ";
                            $dni = trim(fgets(STDIN));
    
                            if ($viaje->verificarDni($dni)) {
                                echo "¡No pueden haber dos pasajeros iguales!\n\n";                                
                            } else {
                                $viaje->modificarPasajero($numero, $dni, $opcion);
                                echo "DNI modificado correctamente\n";
                            }
                            break;
                        case 4:
                            echo "Ingrese el teléfono: ";
                            $telefono = trim(fgets(STDIN));
    
                            $viaje->modificarPasajero($numero, $telefono, $opcion);
                            echo "Apellido modificado correctamente\n";
                            break;
                        case 5:
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
            echo "¿Qué desea cambiar?\n";
            echo "(1) Nombre\n";
            echo "(2) Apellido\n";
            echo "(3) N° Licencia\n";
            echo "(4) N° Empleado\n";
            echo "Opción: ";
            $opcion = trim(fgets(STDIN));
            switch ($opcion) {
                case 1:
                    echo "Ingrese nombre: ";
                    $nombre = trim(fgets(STDIN));
                    
                    $viaje->modificarResponsable($opcion, $nombre);
                    break;
                case 2:
                    echo "Ingrese apellido: ";
                    $apellido = trim(fgets(STDIN));
                    
                    $viaje->modificarResponsable($opcion, $apellido);
                    break;
                case 3:
                    echo "Ingrese N° de Licencia: ";
                    $nroLicencia = trim(fgets(STDIN));
                    
                    $viaje->modificarResponsable($opcion, $nroLicencia);
                    break;
                case 4:
                    echo "Ingrese N° de Empleado: ";
                    $nroEmpleado = trim(fgets(STDIN));
                        
                    $viaje->modificarResponsable($opcion, $nroEmpleado);
                    break;
            }
            break;  
        case 8:
            echo "¡Que tenga un buen día!";
            break;
    }
} while ($respuesta != 8);

?>