<?php

include_once "Torneo.php";

class TorneoNacional extends Torneo {

    public function __construct($idTorneo, $montoPremio, $coleccionPartidos, $localidad)
    {
        parent::__construct($idTorneo, $montoPremio, $coleccionPartidos, $localidad);
    }

    public function __toString()
    {
        return "";
    }
}

?>