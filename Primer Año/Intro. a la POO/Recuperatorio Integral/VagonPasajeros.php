<?php

include_once "Vagon.php";

class VagonPasajeros extends Vagon {
    private $cantMaxPasajeros;
    private $cantPasajerosActual;
    private $pesoPromedioPasajero = 50;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio, $cantMaxPasajeros, $cantPasajerosActual) {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio);
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->cantPasajerosActual = $cantPasajerosActual;
    }

    // Métodos de acceso
    public function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros)
    {
        $this->cantMaxPasajeros = $cantMaxPasajeros;

        return $this;
    }

    public function getCantPasajerosActual()
    {
        return $this->cantPasajerosActual;
    }
    public function setCantPasajerosActual($cantPasajerosActual)
    {
        $this->cantPasajerosActual = $cantPasajerosActual;

        return $this;
    }

    public function getPesoPromedioPasajero()
    {
        return $this->pesoPromedioPasajero;
    }
    public function setPesoPromedioPasajero($pesoPromedioPasajero)
    {
        $this->pesoPromedioPasajero = $pesoPromedioPasajero;

        return $this;
    }

    /**
     * Se recibe por parámetro la cantidad de pasajeros a agregar
     * Retorna verdadero en caso de que se que los pasajeros
     * se incorporen al vagon
     */

    public function incorporarPasajeroVagon($cantPasajeros) {

        $pasajeros = $this->getCantPasajerosActual() + $cantPasajeros;
        $validacion = false;

        if ($this->getCantMaxPasajeros() > $pasajeros) {
            $validacion = true;
            $this->setCantPasajerosActual($pasajeros);
        } 

        return $validacion;
    }

    /**
     * Se redefine el método calcularPesoVagon para calcular el
     * peso de los pasajeros
     */

    public function calcularPesoVagon() {
        $pesoVagonVacio = parent::calcularPesoVagon();

        $pesoTotal = ($this->getCantPasajerosActual() * $this->getPesoPromedioPasajero()) + $pesoVagonVacio;

        return $pesoTotal;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.=   "Cantidad max de pasajeros: " . $this->getCantMaxPasajeros() . "\n" .
                    "Pasajeros actuales: " . $this->getCantPasajerosActual() . "\n" . 
                    "Peso promedio pasajeros: " . $this->getPesoPromedioPasajero() . "kg";

        return $cadena;
    }


}

?>