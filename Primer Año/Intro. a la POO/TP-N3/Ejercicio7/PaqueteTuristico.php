<?php

class PaqueteTuristico {
    private $fecha;
    private $cantDias;
    private $destino;
    private $cantPlazas;

    // $cantDisponiblePlazas debe ser un valor que se setea con el valor 
    // recibido para la cantidad total de plazas del
    // paquete.
    private $cantDisponiblePlazas;

    public function __construct($fecha, $cantDias, $destino, $cantPlazas)
    {
        $this->fecha = $fecha;
        $this->cantDias = $cantDias;
        $this->destino = $destino;
        $this->cantPlazas = $cantPlazas;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getCantDias(){
        return $this->cantDias;
    }
    public function setCantDias($cantDias){
        $this->cantDias = $cantDias;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function getCantPlazas(){
        return $this->cantPlazas;
    }
    public function setCantPlazas($cantPlazas){
        $this->cantPlazas = $cantPlazas;
    }

    public function getCantDisponiblePlazas(){
        return $this->cantDisponiblePlazas;
    }
    public function setCantDisponiblePlazas($cantDisponiblePlazas){
        $this->cantDisponiblePlazas = $cantDisponiblePlazas;
    }
}




?>