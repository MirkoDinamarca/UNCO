<?php

include "Empresa.php";
include "Viaje.php";
include "Pasajero.php";
include "Responsable.php";
include_once "BaseDatos.php";

echo "\n¡Bienvenido! \n";
do {
    echo "\n--------------------------------------------------\n";
    echo "¿Qué desea hacer?\n\n";
    echo "(1) Agregar una Empresa\n\n";
    echo "(2) Modificar Empresa\n\n";
    echo "(3) Agregar un viaje\n\n";
    echo "(4) Modificar Viaje\n\n";
    echo "(5) Agregar pasajeros\n\n";
    echo "(6) Modificar los datos de los pasajeros\n\n";
    echo "(7) Agregar un nuevo responsable\n\n";
    echo "(8) Modificar responsable\n\n";
    echo "(9) Salir\n\n";
    echo "Respuesta: ";
    $respuesta = trim(fgets(STDIN));

    switch ($respuesta) {
        case 1:
            $response = agregarEmpresa();
            if ($response) {
                echo "¡Empresa agregada con exito!";
            } else {
                echo "¡Hubo un error al agregar una nueva empresa!";
            }

            break;
        case 2:
            $response = modificarEmpresa();
            echo $response;
            break;
        case 3:
            $response = agregarViaje();

            if ($response) {
                echo "\n¡Viaje agregado con exito!\n";
            }
            break;
        case 4:
            $response = modificarViaje();
            echo $response;
            break;
        case 5:
            $response = agregarPasajero();

            if ($response) {
                echo "\n¡Pasajero agregado con exito!\n";
            } else {
                echo "\n¡El Pasajero ya se encuentra registrado en un viaje!\n";
            }

            if (is_string($response)) {
                echo $response;
            }
            break;
        case 6:
            $response = modificarPasajero();
            echo $response;
            break;
        case 7:
            $response = agregarResponsable();

            if ($response) {
                echo "¡Responsable agregado con exito!";
            }
            break;
        case 8:
            $response = modificarResponsable();
            echo $response;
            break;
        case 9:
            echo "\n¡Que tenga un buen día!\n";
            break;
    }
} while ($respuesta != 9);

/** Empresas **/

/**
 * Agrega una empresa
 */

function agregarEmpresa() // Probar si funciona
{
    $obj_Empresa = new Empresa();
    echo "¿Cuál es el nombre de la empresa?: ";
    $nombre = strtolower(trim(fgets(STDIN)));

    // Verifica si el nombre de la empresa ya se encuentra registrada
    do {
        $verificacion = false;
        if ($obj_Empresa->Listar("enombre = '" . $nombre . "'")) {
            echo "¡La Empresa " . $nombre . " ya se encuentra registrada!\n";
            echo "Por favor, ingrese un nuevo nombre: ";
            $nombre = strtolower(trim(fgets(STDIN)));
        } else {
            $verificacion = true;
        }
    } while ($verificacion != true);

    echo "¿Su dirección?: ";
    $direccion = trim(fgets(STDIN));
    $obj_Empresa->cargarEmpresa(null, $nombre, $direccion);
    $response = $obj_Empresa->Insertar();

    return $response;
}

/**
 * Modifica una empresa
 */

function modificarEmpresa()
{
    $obj_Empresa = new Empresa();
    $empresas = $obj_Empresa->Listar("");
    $mensaje = "";

    // Muestra las empresas antes de modificarlas
    foreach ($empresas as $empresa) {
        echo "====================\n";
        echo $empresa . "\n";
    }

    echo "\n¿Que N°ID de la empresa desea modificar?: ";
    $idempresa = trim(fgets(STDIN));

    if ($obj_Empresa->Buscar($idempresa)) {
        echo "\n¿Qué desea cambiar?\n";
        echo "(1) Nombre\n";
        echo "(2) Dirección\n";
        echo "(3) Eliminar\n";
        echo "Opción: ";
        $opcion = trim(fgets(STDIN));

        switch ($opcion) {
            case 1:
                echo "Ingrese nombre: ";
                $nombre = trim(fgets(STDIN));

                // Verifica si el nombre de la empresa ya se encuentra registrada
                do {
                    $verificacion = false;
                    if ($obj_Empresa->Listar("enombre = '" . $nombre . "'")) {
                        echo "\n¡La Empresa " . $nombre . " ya se encuentra registrada!\n\n";
                        echo "Por favor, ingrese un nuevo nombre: ";
                        $nombre = strtolower(trim(fgets(STDIN)));
                    } else {
                        $verificacion = true;
                    }
                } while ($verificacion != true);

                $obj_Empresa->setEnombre($nombre);
                $response = $obj_Empresa->Modificar();

                if ($response) {
                    $mensaje = "\n¡El nombre de la empresa se modificó con éxito!\n";
                } else {
                    $mensaje = "¡Hubo un error inesperado!";
                }
                break;
            case 2:
                echo "Ingrese dirección: ";
                $direccion = trim(fgets(STDIN));

                $obj_Empresa->setEdireccion($direccion);
                $response = $obj_Empresa->Modificar();

                if ($response) {
                    $mensaje = "\n¡La dirección de la empresa se modificó con éxito!\n";
                } else {
                    $mensaje = "¡Hubo un error inesperado!";
                }
                break;
            case 3:
                $response = $obj_Empresa->Eliminar();
                if ($response) {
                    $mensaje = "\n¡La Empresa se eliminó con éxito!\n";
                } else {
                    $mensaje = "¡Hubo un error inesperado!";
                }
                break;
        }
    } else {
        echo "\n¡La Empresa que ingresó no existe!";
    }
    return $mensaje;
}

/** Viajes **/

/**
 * Agrega un viaje
 */

function agregarViaje()
{
    // Muestra los responsables para poder elejir uno
    $obj_Responsable = new Responsable();
    $responsables = $obj_Responsable->Listar("");
    echo "\nResponsables: \n";
    foreach ($responsables as $responsable) {
        echo "===================\n";
        echo $responsable . "\n";
    }

    // Si no hay responsable, entonces no hay viaje
    if (empty($responsables)) {
        echo "\n¡Primero debe agregar un Responsable!\n";
    } else {
        // Si hay responsable, muestro las empresas
        $obj_Empresa = new Empresa();
        $empresas = $obj_Empresa->Listar("");
        echo "\nEmpresas: \n";
        foreach ($empresas as $empresa) {
            echo "===================\n";
            echo $empresa . "\n";
        }

        $obj_Viaje = new Viaje();

        // Agrego un nuevo viaje
        echo "\nIngrese un destino: ";
        $vdestino = strtolower(trim(fgets(STDIN)));

        // Verificación si el viaje se encuentra repetido
        do {
            $verificacion = false;
            if ($obj_Viaje->listar("vdestino = '" . $vdestino . "'")) {
                echo "¡El viaje a " . $vdestino . " ya se encuentra registrado!\n";
                echo "Por favor, ingrese un nuevo destino: ";
                $vdestino = strtolower(trim(fgets(STDIN)));
            } else {
                $verificacion = true;
            }
        } while ($verificacion != true);

        echo "Cantidad máxima de pasajeros: ";
        $vcantMaxPasajeros = trim(fgets(STDIN));
        echo "N°ID de la empresa: ";
        $idempresa = trim(fgets(STDIN));

        // Verifico que exista una empresa
        // $obj_Empresa = new Empresa();
        do {
            $verificacion = false;
            if (!$obj_Empresa->Buscar($idempresa)) {
                echo "La Empresa que ingresó no existe!\n";
                echo "Por favor, ingrese un número válido: ";
                $idempresa = trim(fgets(STDIN));
            } else {
                $verificacion = true;
            }
        } while ($verificacion != true);

        echo "N°ID del Responsable: ";
        $nroResponsable = trim(fgets(STDIN));

        // Verifico que exista un responsable
        do {
            $verificacion = false;
            if (!$obj_Responsable->Buscar($nroResponsable)) {
                echo "El responsable que ingresó no existe!\n";
                echo "Por favor, ingrese un número válido: ";
                $nroResponsable = trim(fgets(STDIN));
            } else {
                $verificacion = true;
            }
        } while ($verificacion != true);

        echo "Importe: $";
        $vimporte = trim(fgets(STDIN));
        echo "Tipo de asiento (Cama / Semicama): ";
        $tipoAsiento = strtolower(trim(fgets(STDIN)));

        // Validación del tipo de asiento
        if ($tipoAsiento != "cama" && $tipoAsiento != "semicama") {
            $verificacion = false;
            while ($verificacion == false) {
                echo "¡Ingrese un asiento válido!\n";
                echo "Tipo de asiento (Cama / Semicama): ";
                $tipoAsiento = strtolower(trim(fgets(STDIN)));
                if ($tipoAsiento == "cama" || $tipoAsiento == "semicama") {
                    $verificacion = true;
                }
            }
        }

        echo "Ida o vuelta (Ida / Vuelta): ";
        $idaVuelta = strtolower(trim(fgets(STDIN)));

        // Validación del tipo de viaje
        if ($idaVuelta != "ida" && $idaVuelta != "vuelta") {
            $verificacion = false;

            while ($verificacion == false) {
                echo "¡Ingrese un tipo de viaje válido!\n";
                echo "Ida o vuelta (Ida / Vuelta): ";
                $idaVuelta = strtolower(trim(fgets(STDIN)));
                if ($idaVuelta == "ida" || $idaVuelta == "vuelta") {
                    $verificacion = true;
                }
            }
        }

        $obj_Viaje->cargarViaje(null, $vdestino, $vcantMaxPasajeros, $obj_Empresa, $obj_Responsable, $vimporte, $tipoAsiento, $idaVuelta);
        $response = $obj_Viaje->Insertar();

        return $response;
    }
}

/**
 * Modificar un viaje
 */

function modificarViaje()
{
    $obj_Viaje = new Viaje();
    $mensaje = "";

    $viajes = $obj_Viaje->Listar("");
    foreach ($viajes as $viaje) {
        echo $viaje . "\n";
    }

    // Si no hay viajes para modificar, entonces..
    if (empty($viajes)) {
        echo "\n¡No hay viajes para modificar!\n";
    } else { // Si hay, entonces modifico el viaje..
        echo "Ingrese el N°ID viaje a modificar: ";
        $idViaje = trim(fgets(STDIN));

        if ($obj_Viaje->Buscar($idViaje)) {
            echo "¿Qué desea modificar?\n";
            echo "(1) Destino\n";
            echo "(2) Cantidad max de pasajeros\n";
            echo "(3) Importe\n";
            echo "(4) Eliminar\n";
            echo "Opción: ";
            $opcion = trim(fgets(STDIN));
            switch ($opcion) {
                case 1:
                    if ($obj_Viaje->Buscar($idViaje)) {
                        echo "Ingrese nuevo destino: ";
                        $nuevoDestino = strtolower(trim(fgets(STDIN)));

                        // Verificación si el viaje se encuentra repetido
                        do {
                            $verificacion = false;
                            if ($obj_Viaje->Listar("vdestino = '" . $nuevoDestino . "'")) {
                                echo "¡El viaje a " . $nuevoDestino . " ya se encuentra registrado!\n";
                                echo "Por favor, ingrese un nuevo destino: ";
                                $nuevoDestino = strtolower(trim(fgets(STDIN)));
                            } else {
                                $verificacion = true;
                            }
                        } while ($verificacion != true);

                        $obj_Viaje->setVdestino($nuevoDestino);
                        $response = $obj_Viaje->Modificar();

                        if ($response) {
                            $mensaje = "\n¡El destino se modificó con éxito!\n";
                        } else {
                            $mensaje = "\n¡Ha ocurrido un error inesperado!\n";
                        }
                    } else {
                        echo "\n¡El viaje no existe!\n";
                    }
                    break;
                case 2:
                    echo "Ingrese la cantidad máxima de pasajeros: ";
                    $cantMaxPasajeros = trim(fgets(STDIN));
                    $obj_Viaje->setVcantMaxPasajeros($cantMaxPasajeros);
                    $response = $obj_Viaje->Modificar();

                    if ($response) {
                        $mensaje = "\n¡La cant.max de pasajeros se modificó con éxito!\n";
                    } else {
                        $mensaje = "\n¡Ha ocurrido un error inesperado!\n";
                    }

                    break;
                case 3:
                    echo "Ingrese el nuevo importe: $";
                    $importe = trim(fgets(STDIN));
                    $obj_Viaje->setVimporte($importe);
                    $response = $obj_Viaje->Modificar();

                    if ($response) {
                        $mensaje = "\n¡El importe se modificó con éxito!\n";
                    } else {
                        $mensaje = "\n¡Ha ocurrido un error inesperado!\n";
                    }
                    break;
                case 4:
                    $response = $obj_Viaje->Eliminar();
                    if ($response) {
                        $mensaje = "\n¡El viaje se eliminó con éxito!\n";
                    } else {
                        $mensaje = "\n¡El viaje no se puede eliminar ya que hay pasajeros registrados!\n";
                    }
                    break;
            }
        } else {
            echo "\n¡El viaje no existe!\n";
        }
    }
    return $mensaje;
}

/** Pasajeros **/

/**
 * Agregar un nuevo pasajero
 */

function agregarPasajero()
{
    $obj_Viaje = new Viaje();

    $viajes = $obj_Viaje->listar("");
    foreach ($viajes as $viaje) {
        echo $viaje . "\n";
    }

    if (empty($viajes)) {
        $response = "¡Primero debe agregar un Viaje!";
    } else {

        echo "Ingrese el N°ID del viaje: ";
        $idviaje = trim(fgets(STDIN));

        // Verifica que el viaje existe antes de agregar un pasajero
        do {
            $verificacion = false;
            if (!$obj_Viaje->Buscar($idviaje)) {
                echo "El viaje que ingresó no existe!\n";
                echo "Por favor, ingrese un id válido: ";
                $idviaje = trim(fgets(STDIN));
            } else {
                $verificacion = true;
            }
        } while ($verificacion != true);

        if ($obj_Viaje->pasajeDisponible()) {

            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Su apellido: ";
            $apellido = trim(fgets(STDIN));
            echo "Su N° documento: ";
            $nroDocumento = trim(fgets(STDIN));
            echo "Su Teléfono: ";
            $telefono = trim(fgets(STDIN));

            $obj_Pasajero = new Pasajero();
            $obj_Pasajero->cargarPasajero($nroDocumento, $nombre, $apellido, $telefono, $obj_Viaje);
            $response = $obj_Pasajero->Insertar();
        } else {
            $response = "\n¡La cantidad de pasajeros actual excede el límite de pasajeros!\n";
        }
        return $response;
    }
}

/**
 * Modificar un pasajero
 */

function modificarPasajero()
{
    $obj_Pasajero = new Pasajero();
    $mensaje = "";

    $pasajeros = $obj_Pasajero->listar("");
    foreach ($pasajeros as $pasajero) {
        echo $pasajero;
    }

    // Si no existe ningún pasajero, entonces..
    if (empty($pasajeros)) {
        echo "\n¡No hay pasajeros para modificar!\n";
    } else { // Si existen, entonces modifico..
        echo "\n\nIngrese N° documento del pasajero: ";
        $nroDocumento = trim(fgets(STDIN));

        if ($obj_Pasajero->Buscar($nroDocumento)) {

            echo "¿Qué desea cambiar?\n";
            echo "(1) Nombre\n";
            echo "(2) Apellido\n";
            echo "(3) Teléfono\n";
            echo "(4) Eliminar\n";
            echo "Opción: ";
            $opcion = trim(fgets(STDIN));
            switch ($opcion) {
                case 1:
                    echo "Ingrese el nombre: ";
                    $nombre = trim(fgets(STDIN));

                    $obj_Pasajero->setPnombre($nombre);
                    $response = $obj_Pasajero->Modificar();

                    if ($response) {
                        $mensaje = "\n¡El nombre se modificó con éxito!\n";
                    } else {
                        $mensaje = "\n¡Hubo un error al modificar el nombre!\n";
                    }
                    break;
                case 2:
                    echo "Ingrese el apellido: ";
                    $apellido = trim(fgets(STDIN));

                    $obj_Pasajero->setPapellido($apellido);
                    $response = $obj_Pasajero->Modificar();

                    if ($response) {
                        $mensaje = "\n¡El apellido se modificó con éxito!\n";
                    } else {
                        $mensaje = "\n¡Hubo un error al modificar el apellido!\n";
                    }
                    break;
                case 3:
                    echo "Ingrese el teléfono: ";
                    $telefono = trim(fgets(STDIN));

                    $obj_Pasajero->setPtelefono($telefono);
                    $response = $obj_Pasajero->Modificar();

                    if ($response) {
                        $mensaje = "\n¡El teléfono se modificó con éxito!\n";
                    } else {
                        $mensaje = "\n¡Hubo un error al modificar el teléfono!\n";
                    }
                    break;
                case 4:

                    $response = $obj_Pasajero->Eliminar();

                    if ($response) {
                        $mensaje = "\n¡El pasajero se eliminó con éxito!\n";
                    } else {
                        $mensaje = "\n¡Hubo un error al eliminar el pasajero!\n";
                    }
                    break;
            }
        } else {
            echo "\n¡El Pasajero no existe!\n";
        }
    }
    return $mensaje;
}

/** Responsables **/

/**
 * Agregar un responsable
 */

function agregarResponsable()
{
    $obj_Responsable = new Responsable();
    echo "Ingrese el nombre del responsable del viaje: ";
    $nombre = strtolower(trim(fgets(STDIN)));
    echo "Apellido: ";
    $apellido = strtolower(trim(fgets(STDIN)));
    echo "N° de Licencia: ";
    $nroLicencia = trim(fgets(STDIN));

    // Verifica si el nombre del responsable ya se encuentra registrado
    do {
        $verificacion = false;
        if ($obj_Responsable->Listar("rnumerolicencia = '" . $nroLicencia . "'")) {
            echo "¡El responsable " . $nombre . " ya se encuentra registrado!\n";
            echo "Por favor, ingrese un nuevo nombre: ";
            $nombre = strtolower(trim(fgets(STDIN)));
        } else {
            $verificacion = true;
        }
    } while ($verificacion != true);

    // TODO | Creo e inserto un objeto responsable a la BD

    $obj_Responsable->cargarResponsable(null, $nroLicencia, $nombre, $apellido);
    $response = $obj_Responsable->Insertar();

    if ($response) {
        echo "\nResponsable Registrado Correctamente\n";
    } else {
        echo $obj_Responsable->getMsjOperacion();
    }
}

/**
 * Modificar un responsable
 */

function modificarResponsable()
{
    $obj_Responsable = new Responsable();
    $mensaje = "";

    $responsables = $obj_Responsable->listar("");
    foreach ($responsables as $responsable) {
        echo "===================\n";
        echo $responsable . "\n";
    }

    // Si no hay responsables, entonces..
    if (empty($responsables)) {
        echo "\n¡No hay Responsables para modificar!\n";
    } else { // Si hay responsable, entonces..
        echo "¿Que N°ID del responsable desea modificar?: ";
        $nroEmpleado = trim(fgets(STDIN));

        if ($obj_Responsable->Buscar($nroEmpleado)) {
            echo "¿Qué desea cambiar?\n";
            echo "(1) Nombre\n";
            echo "(2) Apellido\n";
            echo "(3) N° Licencia\n";
            echo "Opción: ";
            $opcion = trim(fgets(STDIN));
            switch ($opcion) {
                case 1:
                    echo "Ingrese nombre: ";
                    $nombre = strtolower(trim(fgets(STDIN)));

                    $obj_Responsable->setRnombre($nombre);
                    $response = $obj_Responsable->Modificar();

                    if ($response) {
                        $mensaje = "\n¡El nombre del responsable se modificó con éxito!\n";
                    } else {
                        $mensaje = "\n¡Hubo un error inesperado!\n";
                    }
                    break;
                case 2:
                    echo "Ingrese apellido: ";
                    $apellido = strtolower(trim(fgets(STDIN)));

                    $obj_Responsable->setRapellido($apellido);
                    $response = $obj_Responsable->Modificar();

                    if ($response) {
                        $mensaje = "\n¡El apellido del responsable se modificó con éxito!\n";
                    } else {
                        $mensaje = "\n¡Hubo un error inesperado!\n";
                    }
                    break;
                case 3:
                    echo "Ingrese N° de Licencia: ";
                    $numeroLicencia = trim(fgets(STDIN));

                    // Verifica si el nombre del responsable ya se encuentra registrado
                    do {
                        $verificacion = false;
                        if ($obj_Responsable->Listar("rnumerolicencia = '" . $numeroLicencia . "'")) {
                            echo "¡El N°Licencia " . $numeroLicencia . " ya se encuentra registrado!\n";
                            echo "Por favor, ingrese un nuevo N° de Licencia: ";
                            $numeroLicencia = trim(fgets(STDIN));
                        } else {
                            $verificacion = true;
                        }
                    } while ($verificacion != true);

                    $obj_Responsable->setRnumerolicencia($numeroLicencia);
                    $response = $obj_Responsable->Modificar();

                    if ($response) {
                        $mensaje = "\n¡El N° de licencia del responsable se modificó con éxito!\n";
                    } else {
                        $mensaje = "\n¡Hubo un error inesperado!\n";
                    }
                    break;
            }
        } else {
            echo "\n¡El Responsable no existe!";
        }
    }
    return $mensaje;
}
