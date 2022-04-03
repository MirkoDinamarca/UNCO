<?php

/*
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha 
clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. 
Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar 
la información del viaje, modificar y ver sus datos.
*/

class Viaje {

    // Atributos
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
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

    public function modificarPasajero($indice, $change, $key) {
        $arrayPasajeros = $this->getPasajeros();
        $arrayPasajeros[$indice][$key] = $change;
            
        $this->setPasajeros($arrayPasajeros);
    }

    /**
     * Método para verificar que el DNI no es el mismo
     * 
     */

    public function verificarDni($dni) {
        $valido = false;

        foreach($this->getPasajeros() as $key => $pasajero) {
            if ($pasajero["dni"] == $dni) {
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

    // Método __toString()
    public function __toString()
    {
        return "El código del viaje es: " . $this->getCodigo() . "\n" .
                "El destino del viaje es: " . $this->getDestino() . "\n" .
                "La capacidad máxima de pasajeros es: " . $this->getCantMaxPasajeros() . "\n";
    }
}

?>