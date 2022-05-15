<?php

class Rubro {
    private $descripcionRubro;
    private $porcGanancia; // Aplicado a los productos vinculados a este rubro

    public function __construct($descripcionRubro, $porcGanancia)
    {
        $this->descripcionRubro = $descripcionRubro;
        $this->porcGanancia = $porcGanancia;
    }

    public function getDescripcionRubro(){
        return $this->descripcionRubro;
    }
    public function setDescripcionRubro($descripcionRubro){
        $this->descripcionRubro = $descripcionRubro;
    }

    public function getPorcGanancia(){
        return $this->porcGanancia;
    }
    public function setPorcGanancia($porcGanancia){
        $this->porcGanancia = $porcGanancia;
    }
    
}


?>