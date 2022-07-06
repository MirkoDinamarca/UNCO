<?php

class Destino {
    private $identificacion;
    private $nombreLugar;
    private $valorxPasajeroxDia;

    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }

    public function getNombreLugar(){
        return $this->nombreLugar;
    }
    public function setNombreLugar($nombreLugar){
        $this->nombreLugar = $nombreLugar;
    }

    public function getValorxPasajeroxDia(){
        return $this->valorxPasajeroxDia;
    }
    public function setValorxPasajeroxDia($valorxPasajeroxDia){
        $this->valorxPasajeroxDia = $valorxPasajeroxDia;
    }
}




?>