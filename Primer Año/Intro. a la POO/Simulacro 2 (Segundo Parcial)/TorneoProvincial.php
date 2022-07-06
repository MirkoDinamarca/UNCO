<?php

include_once "Torneo.php";

class TorneoProvincial extends Torneo {
    private $provincia;

    public function __construct($idTorneo, $montoPremio, $coleccionPartidos, $localidad, $provincia)
    {
        parent::__construct($idTorneo, $montoPremio, $coleccionPartidos, $localidad);
        $this->provincia = $provincia;
    }
    
    public function getProvincia(){
        return $this->provincia;
    }
    public function setProvincia($provincia){
        $this->provincia = $provincia;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Provincia: " . $this->getProvincia();

        return $cadena;
    }
}


?>