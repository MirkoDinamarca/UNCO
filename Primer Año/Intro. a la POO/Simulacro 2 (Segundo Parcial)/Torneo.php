<?php

class Torneo {
    private $idTorneo;
    private $montoPremio;
    private $coleccionPartidos; // Hace referencia a los partidos
    private $localidad;

    public function __construct($idTorneo, $montoPremio, $coleccionPartidos, $localidad)
    {
        $this->idTorneo = $idTorneo;
        $this->montoPremio = $montoPremio;
        $this->coleccionPartidos = $coleccionPartidos;
        $this->localidad = $localidad;
    }


    public function getIdTorneo(){
        return $this->idTorneo;
    }
    public function setIdTorneo($idTorneo){
        $this->idTorneo = $idTorneo;
    }

    public function getMontoPremio(){
        return $this->montoPremio;
    }
    public function setMontoPremio($montoPremio){
        $this->montoPremio = $montoPremio;
    }

    public function getColeccionPartidos(){
        return $this->coleccionPartidos;
    }
    public function setColeccionPartidos($coleccionPartidos){
        $this->coleccionPartidos = $coleccionPartidos;
    }

    public function getLocalidad(){
        return $this->localidad;
    }
    public function setLocalidad($localidad){
        $this->localidad = $localidad;
    }

    /**
     * @return array
     */

    // TODO | Dudas con este punto
    public function obtenerEquipoGanadorTorneo() {
        $equiposGanadores = [];

        $equipoGanador = [
            "nombreEquipo" => "",
            "cantGoles" => 0
        ];
        
        $cantGoles = 0;

        foreach ($this->getColeccionPartidos() as $partido) {

            if ($partido->getCantGolesE2() > $partido->getCantGolesE1()) {
                // $equiposGanadores[] = $partido; // Acá no funciona la cosa
                array_push($equiposGanadores, $partido);
            } else {
                // print_r($partido);
                // $equiposGanadores[] = $partido; // Acá no funciona la cosa
            }

            // if ($partido->getCantGolesE1() > $partido->getCantGolesE2()) {
            //     if ($equipoGanador["nombreEquipo"] == $partido->getEquipo1()->getNombre()) {
            //         $equipoGanador = [
            //             "cantGoles" => $cantGoles + $partido->getCantGolesE1()
            //         ];
            //     } else {
            //         $equipoGanador = [
            //             "nombreEquipo" => $partido->getEquipo1()->getNombre(),
            //             "cantGoles" => $cantGoles + $partido->getCantGolesE1()
            //         ];
            //         $equiposGanadores[] = $equipoGanador;
            //     }
            // } else if ($partido->getCantGolesE1() < $partido->getCantGolesE2()) {
            //     if ($equipoGanador["nombreEquipo"] == $partido->getEquipo2()->getNombre()) {
            //         $equipoGanador = [
            //             "cantGoles" => $cantGoles + $partido->getCantGolesE2()
            //         ];
            //     } else {
            //         $equipoGanador = [
            //             "nombreEquipo" => $partido->getEquipo2()->getNombre(),
            //             "cantGoles" => $cantGoles + $partido->getCantGolesE2()
            //         ];
            //         $equiposGanadores[] = $equipoGanador;
            //     }
            // }
        }

        return $equiposGanadores;
    }

    /**
     * 
     */

    public function obtenerPremioTorneo() {
        $equipoGanador = $this->obtenerEquipoGanadorTorneo();

        
    }

    /**
     * Método para recorrer toda la colección de partidos
     */

    public function stringPartidos() {
        $stringPartidos = "";

        foreach ($this->getColeccionPartidos() as $key => $partido) {
            $stringPartidos.= $partido;
        }
        return $stringPartidos;
    }

    public function __toString()
    {
        return  "ID Torneo: " . $this->getIdTorneo() . "\n" .
                "Monto Premio: " . $this->getMontoPremio() . "\n" .
                "Partidos: " . $this->stringPartidos() . "\n" .
                "Localidad: " . $this->getLocalidad();
    }
}

?>