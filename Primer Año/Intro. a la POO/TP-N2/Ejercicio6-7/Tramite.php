<?php

class Tramite {
    private $cliente;
    private $fecha_ingreso;
    private $fecha_cierre;
    private $hora_ingreso;
    private $hora_cierre;

    public function __construct($cliente, $fecha_ingreso, $fecha_cierre)
    {
        $this->cliente = $cliente;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->fecha_cierre = $fecha_cierre;
    }
    

    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getFecha_ingreso(){
        return $this->fecha_ingreso;
    }
    public function setFecha_ingreso($fecha_ingreso){
        $this->fecha_ingreso = $fecha_ingreso;
    }

    public function getFecha_cierre(){
        return $this->fecha_cierre;
    }
    public function setFecha_cierre($fecha_cierre){
        $this->fecha_cierre = $fecha_cierre;
    }

    public function getHora_ingreso(){
        return $this->hora_ingreso;
    }
    public function setHora_ingreso($hora_ingreso){
        $this->hora_ingreso = $hora_ingreso;
    }

    public function getHora_cierre(){
        return $this->hora_cierre;
    }
    public function setHora_cierre($hora_cierre){
        $this->hora_cierre = $hora_cierre;
    }

    public function __toString()
    {
        return "";
    }
}




?>