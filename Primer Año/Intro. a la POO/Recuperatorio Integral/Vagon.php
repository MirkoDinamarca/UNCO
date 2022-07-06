<?php

class Vagon {
    private $anioInstalacion;
    private $largo;
    private $ancho;
    private $pesoVagonVacio;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio) {
        $this->anioInstalacion = $anioInstalacion;
        $this->largo = $largo;
        $this->ancho = $ancho;
        $this->pesoVagonVacio = $pesoVagonVacio;
    }

    // Métodos de acceso
    public function getAnioInstalacion()
    {
        return $this->anioInstalacion;
    }
    public function setAnioInstalacion($anioInstalacion)
    {
        $this->anioInstalacion = $anioInstalacion;

        return $this;
    }

    public function getLargo()
    {
        return $this->largo;
    }
    public function setLargo($largo)
    {
        $this->largo = $largo;

        return $this;
    }

    public function getAncho()
    {
        return $this->ancho;
    }
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;

        return $this;
    }

    public function getPesoVagonVacio()
    {
        return $this->pesoVagonVacio;
    }
    public function setPesoVagonVacio($pesoVagonVacio)
    {
        $this->pesoVagonVacio = $pesoVagonVacio;

        return $this;
    }

    /**
     * Calcula el peso del vagon
     */

    public function calcularPesoVagon() {
        $pesoVagonVacio = $this->getPesoVagonVacio();
        return $pesoVagonVacio;
    }

    public function __toString()
    {
        return  "Anio de Instalacion: " . $this->getAnioInstalacion() . "\n" .
                "Largo: " . $this->getLargo() . "mts" . "\n" .
                "Ancho: " . $this->getAncho() . "mts" . "\n" .
                "Peso vagon vacio: " . $this->getPesoVagonVacio();
    }



}

?>