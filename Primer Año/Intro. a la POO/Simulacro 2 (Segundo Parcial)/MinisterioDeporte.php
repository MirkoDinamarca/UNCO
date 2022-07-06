<?php

class MinisterioDeporte {
    private $anio;
    private $coleccionTorneos;

    public function __construct($anio /*, $coleccionTorneos*/)
    {
        $this->anio = $anio;
        // $this->coleccionTorneos = $coleccionTorneos;
    }

    public function getAnio(){
        return $this->anio;
    }
    public function setAnio($anio){
        $this->anio = $anio;
    }

    public function getColeccionTorneos(){
        return $this->coleccionTorneos;
    }
    public function setColeccionTorneos($coleccionTorneos){
        $this->coleccionTorneos = $coleccionTorneos;
    }

    /**
     * @param $ColPartidos array
     * @param $tipo string
     * @param $ArrayAsociativo array
     * @return object
     */

    // TODO | Probar si funciona
    public function registrarTorneo($ColPartidos, $tipo, $ArrayAsociativo) {

        $torneos = $this->getColeccionTorneos(); 

        if ($tipo == "nacionales") {
            $torneo = new TorneoNacional($ArrayAsociativo["idTorneo"], $ArrayAsociativo["montoPremio"], $ColPartidos, $ArrayAsociativo["localidad"]);
        } else if ($tipo == "provinciales") {
            $torneo = new TorneoProvincial($ArrayAsociativo["idTorneo"], $ArrayAsociativo["montoPremio"], $ColPartidos, $ArrayAsociativo["localidad"], $ArrayAsociativo["provincia"]);
        }

        $torneos[] = $torneo;
        $this->setColeccionTorneos($torneos);

        return $torneo;
    }

    /**
     * Método para recorrer la colección de torneos
     */

    public function stringTorneos() {
        $stringTorneos = "";

        foreach ($this->getColeccionTorneos() as $key => $torneo) {
            $stringTorneos.= $torneo;
        }
        return $stringTorneos;
    }

    public function __toString()
    {
        return  "Año Torneo: " . $this->getAnio() . "\n" .
                "Torneos: " . $this->stringTorneos();
    }
}

?>