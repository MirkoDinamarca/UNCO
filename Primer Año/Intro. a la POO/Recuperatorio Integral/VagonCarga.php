<?php

include_once "Vagon.php";

class VagonCarga extends Vagon {
    private $pesoMaxTransportar;
    private $pesoActual;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio, $pesoMaxTransportar, $pesoActual) {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio);
        $this->pesoMaxTransportar = $pesoMaxTransportar;
        $this->pesoActual = $pesoActual;
    }

    // Métodos de acceso
    public function getPesoMaxTransportar()
    {
        return $this->pesoMaxTransportar;
    }
    public function setPesoMaxTransportar($pesoMaxTransportar)
    {
        $this->pesoMaxTransportar = $pesoMaxTransportar;

        return $this;
    }

    public function getPesoActual()
    {
        return $this->pesoActual;
    }
    public function setPesoActual($pesoActual)
    {
        $this->pesoActual = $pesoActual;

        return $this;
    }

    /**
     * Recibe por parámetro la cantidad de carga que va a
     * transportar el vagón
     * Retorna verdadero en caso de que se que la carga
     * se incorpora al vagon
     */

    public function incorporarCargaVagon($cargaVagon) {
        $carga = $this->getPesoActual() + $cargaVagon;
        $validacion = false;

        if ($this->getPesoMaxTransportar() > $carga) {
            $validacion = true;
            $this->setPesoActual($carga);
        } 

        return $validacion;
    }


    /**
     * Se redefine el método calcularPesoVagon para calcular el
     * peso de la carga
     */

    public function calcularPesoVagon() {
        $pesoVagonVacio = parent::calcularPesoVagon();

        $pesoTotal = ($this->getPesoActual() * 1.20) + $pesoVagonVacio;

        return $pesoTotal;
    }
 
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.=   "Peso maximo permitido: " . $this->getPesoMaxTransportar() . " toneladas" . "\n" .
                    "Peso actual: " . $this->getPesoActual() . " toneladas";
        return $cadena;
    }

}

?>