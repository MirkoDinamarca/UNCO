<?php

/*

(Primer Entrega)
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha 
clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. 
Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar 
la información del viaje, modificar y ver sus datos.

(Segunda Entrega)
- Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, 
numero de documento y teléfono. // TODO (Listo)
- El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. // TODO (Listo)
- También se desea guardar la información de la persona responsable de realizar el viaje, 
para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. // TODO (Listo) 
- La clase Viaje debe hacer referencia al responsable de realizar el viaje. // TODO (Listo)
- Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. // TODO (Listo)
- Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. // TODO (Listo)
- Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. // TODO (Listo)
- De la misma forma cargue la información del responsable del viaje. // TODO (Listo)
*/

class Viaje {

    // Atributos
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $empleadoResponsable;
    private $pasajeros = [];

    // Método __construct
    public function __construct($codigo, $destino, $cantMaxPasajeros)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    // Métodos de acceso
    public function getCodigo() {
        return $this->codigo;
    }
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDestino() {
        return $this->destino;
    }
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($maxPasajeros) {
        $this->cantMaxPasajeros = $maxPasajeros;
    }

    public function getEmpleadoResponsable(){
        return $this->empleadoResponsable;
    }
    public function setEmpleadoResponsable($empleadoResponsable){
        $this->empleadoResponsable = $empleadoResponsable;
    }

    public function getPasajeros() {
        return $this->pasajeros;
    }
    public function setPasajeros($pasajero) {
        $this->pasajeros = $pasajero;
    }

    /**
     * Método para agregar a pasajero
     * @param array $pasajero
     */

    public function agregarPasajeros($pasajero) {
        $arrayPasajeros = $this->getPasajeros();
        array_push($arrayPasajeros, $pasajero);
        $this->setPasajeros($arrayPasajeros);
    }

    /**
     * Método para modificar el pasajero
     * @param int $indice
     * @param string $change
     * @param int $key
     */

    public function modificarPasajero($indice, $change, $numero) {

        $arrayPasajeros = $this->getPasajeros();
    
        switch ($numero) {
            case 1:
                $arrayPasajeros[$indice]->setNombre($change);
                $this->setPasajeros($arrayPasajeros);
                break;
            case 2:
                $arrayPasajeros[$indice]->setApellido($change);
                $this->setPasajeros($arrayPasajeros);
                break;
            case 3:
                $arrayPasajeros[$indice]->setDni($change);
                $this->setPasajeros($arrayPasajeros);
                break;
            case 4:
                $arrayPasajeros[$indice]->setTelefono($change);
                $this->setPasajeros($arrayPasajeros);
                break;
        }
    }

    /**
     * Método para verificar que el DNI no es el mismo
     * 
     */

    public function verificarDni($dni) {
        $valido = false;

        foreach($this->getPasajeros() as $key => $pasajero) {
            if ($pasajero->getDni() == $dni) {
                $valido = true;
                break;
            } else {
                $valido = false;
            }
        }
        return $valido;
    }

    /**
     * Método eliminar pasajero
     * @param int $numero
     */

    public function eliminarPasajero($numero) {
        $arrayPasajeros = $this->getPasajeros();
        $pasajeroEliminar = $this->getPasajeros()[$numero];

        if (in_array($pasajeroEliminar, $arrayPasajeros)) {
            array_splice($arrayPasajeros, $numero, 1);
            $this->setPasajeros($arrayPasajeros);
        }
    }

    /**
     * Método modificar responsable del viaje
     * 
     */

    public function modificarResponsable($numero, $change) {
        $empleadoResponsable = $this->getEmpleadoResponsable();

        switch ($numero) {
            case 1:
                $empleadoResponsable->setNombre($change);
                $this->setEmpleadoResponsable($empleadoResponsable);
                break;
            case 2:
                $empleadoResponsable->setApellido($change);
                $this->setEmpleadoResponsable($empleadoResponsable);
                break;
            case 3:
                $empleadoResponsable->setNumLicencia($change);
                $this->setEmpleadoResponsable($empleadoResponsable);
                break;
            case 4:
                $empleadoResponsable->setNumEmpleado($change);
                $this->setEmpleadoResponsable($empleadoResponsable);
                break;
        }
    }

    /**
     * Método mostrar pasajeros
     */

    public function stringPasajeros() {
        $stringPasajeros = "";

        foreach ($this->getPasajeros() as $key => $pasajero) {
            $stringPasajeros .= $pasajero;
        }
        return $stringPasajeros;
    }

    /**
     * Método para mostrar al Empleado
     */

    public function stringEmpleado() {
        $stringEmpleado = "";
        $stringEmpleado .= $this->getEmpleadoResponsable();
        return $stringEmpleado;
    }

    // Método __toString()
    public function __toString()
    {
        return  $this->stringEmpleado() . "\n" .
                "----------------------------\n" .
                "El código del viaje es: " . $this->getCodigo() . "\n" .
                "El destino del viaje es: " . $this->getDestino() . "\n" .
                "La capacidad máxima de pasajeros es: " . $this->getCantMaxPasajeros() . "\n" .
                "Los pasajeros son los siguientes: " . $this->stringPasajeros();
    }

    
}

?>