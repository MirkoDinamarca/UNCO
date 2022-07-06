<?php

class Partido {
    private $idPartido;
    private $primerEquipo;
    private $segundoEquipo;
    private $fecha;
    private $cantGolesE1;
    private $cantGolesE2;

    public function __construct($idPartido, $primerEquipo, $segundoEquipo, $fecha, $cantGolesE1, $cantGolesE2)
    {
        $this->idPartido = $idPartido;
        $this->primerEquipo = $primerEquipo;
        $this->segundoEquipo = $segundoEquipo;
        $this->fecha = $fecha;
        $this->cantGolesE1 = $cantGolesE1;
        $this->cantGolesE2 = $cantGolesE2;
    }

    public function getIdPartido(){
        return $this->idPartido;
    }
    public function setIdPartido($idPartido){
        $this->idPartido = $idPartido;
    }

    public function getPrimerEquipo(){
        return $this->primerEquipo;
    }
    public function setPrimerEquipo($primerEquipo){
        $this->primerEquipo = $primerEquipo;
    }

    public function getSegundoEquipo(){
        return $this->segundoEquipo;
    }
    public function setSegundoEquipo($segundoEquipo){
        $this->segundoEquipo = $segundoEquipo;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
    public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1 = $cantGolesE1;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }
    public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2 = $cantGolesE2;
    }

    /**
     * Cálculo de coeficiente
     * Apliqué por equipo ganador, le encontré más sentido
     * @return int
     */
    public function coeficientePartido() {

        if ($this->getCantGolesE1() > $this->getCantGolesE2()) {
            $coeficiente = 1.5 * $this->getCantGolesE1() * $this->getPrimerEquipo()->getCantJugadores();
        } else {
            $coeficiente = 1.5 * $this->getCantGolesE2() * $this->getSegundoEquipo()->getCantJugadores();
        }
        return $coeficiente;
    }

    /**
     * Cree un método el cual me retorna un ganador
     */
    public function campeon() {
        if ($this->getCantGolesE1() > $this->getCantGolesE2()) {
            $campeon = $this->getPrimerEquipo();
        } else {
            $campeon = $this->getSegundoEquipo();
        }    
    
        return $campeon;
    }

    public function __toString()
    {
        return  "-------------------\n" .
                "ID: " . $this->getIdPartido() . "\n" . 
                "Primer Equipo \n" . $this->getPrimerEquipo() . "\n" .
                "Segundo Equipo \n" . $this->getSegundoEquipo() . "\n" . 
                "Fecha: " . $this->getFecha() . "\n" . 
                "Goles Equipo N°1: " . $this->getCantGolesE1() . "\n" . 
                "Goles Equipo N°2: " . $this->getCantGolesE2() . "\n";
    }

    
}


?>