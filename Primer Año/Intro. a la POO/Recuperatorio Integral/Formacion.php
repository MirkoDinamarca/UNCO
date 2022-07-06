<?php

class Formacion {
    private $locomotora; // Referencia a la clase Locomotora
    private $coleccionVagon = [];
    private $cantMaxVagones;

    public function __construct($locomotora, $cantMaxVagones) {
        $this->locomotora = $locomotora;
        $this->cantMaxVagones = $cantMaxVagones;
    }

    // Métodos de acceso
    public function getLocomotora()
    {
        return $this->locomotora;
    }
    public function setLocomotora($locomotora)
    {
        $this->locomotora = $locomotora;

        return $this;
    }

    public function getColeccionVagon()
    {
        return $this->coleccionVagon;
    }
    public function setColeccionVagon($coleccionVagon)
    {
        $this->coleccionVagon = $coleccionVagon;

        return $this;
    }

    public function getCantMaxVagones()
    {
        return $this->cantMaxVagones;
    }
    public function setCantMaxVagones($cantMaxVagones)
    {
        $this->cantMaxVagones = $cantMaxVagones;

        return $this;
    }


    /**
     * Recibe la cantidad de pasajeros que se desea incorporar a la formación y 
     * busca dentro de la colección de vagones aquel vagón capaz de incorporar 
     * esa cantidad de pasajeros. Si no hay ningún vagón en la formación que pueda 
     * ingresar la cantidad de pasajeros, el método debe retornar un valor falso y 
     * verdadero en caso contrario.
     */

    public function incorporarPasajeroFormacion($cantPasajeros) {
        $resultado = false;
        foreach ($this->getColeccionVagon() as $key => $vagon) {
            if (is_a($vagon, "VagonPasajeros")) {
                $resultado = $vagon->incorporarPasajeroVagon($cantPasajeros);
            }
        }
        return $resultado;
    }

    /**
     * Recibe por parámetro un objeto vagón y lo incorpora a la formación. 
     * El método retorna verdadero si la incorporación se realizó con éxito y 
     * falso en caso contrario.
     * @param object
     * @return boolean
     */
    public function incorporarVagonFormacion($vagon) {
        $validacion = false;
        $coleccionVagones = $this->getColeccionVagon();

        if ($this->getCantMaxVagones() > count($this->getColeccionVagon())) {
            array_push($coleccionVagones, $vagon);
            $this->setColeccionVagon($coleccionVagones);
            $validacion = true;
        }

        return $validacion;
    }

    /**
     * Calcula el promedio de pasajeros en total que se encuentra en la formación
     */

    public function promedioPasajeroFormacion() {
        $maxPasajeros = 0;
        $pasajerosActuales = 0;
        foreach ($this->getColeccionVagon() as $key => $vagon) {
            if (is_a($vagon, "VagonPasajeros")) {
                $maxPasajeros = $maxPasajeros + $vagon->getCantMaxPasajeros();
                $pasajerosActuales = $pasajerosActuales + $vagon->getCantPasajerosActual();
            }
        }
        $promedioPasajeros = ($pasajerosActuales * 100) / $maxPasajeros;
        return $promedioPasajeros;
    }

    /**
     * Retorna el peso de la formación completa
     */

    public function pesoFormacion() {
        $pesoTotal = 0;
        foreach ($this->getColeccionVagon() as $key => $vagon) {
            $pesoVagon = $vagon->calcularPesoVagon();
            $pesoTotal = $pesoTotal + $pesoVagon;
        }

        return $pesoTotal;
    }

    public function stringColeccionVagones() {
        $stringVagones = "";

        foreach ($this->getColeccionVagon() as $vagon) {
            $stringVagones.= $vagon;
        }

        return $stringVagones;
    }

    public function __toString()
    {
        return  "*****************\n" .
                "Locomotora: " . $this->getLocomotora() . "\n" .
                "Vagones: " . $this->stringColeccionVagones() . "\n" .
                "N° Max de vagones: " . $this->getCantMaxVagones();
    }


}

?>