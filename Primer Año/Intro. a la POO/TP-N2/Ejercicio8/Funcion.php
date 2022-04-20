<?php

class Funcion {
    private $numFuncion;
    private $nombre;
    private $horario_inicio;
    private $obra_duracion;
    private $obra_precio;

    public function __construct($numFuncion, $nombre, $horario_inicio, $obra_duracion, $obra_precio) {
        $this->numFuncion = $numFuncion;
        $this->nombre = $nombre;
        $this->horario_inicio = $horario_inicio;
        $this->obra_duracion = $obra_duracion;
        $this->obra_precio = $obra_precio;
    }

    public function getNumFuncion()
    {
        return $this->numFuncion;
    }
    public function setNumFuncion($numFuncion)
    {
        $this->numFuncion = $numFuncion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getHorario_inicio()
    {
        return $this->horario_inicio;
    } 
    public function setHorario_inicio($horario_inicio)
    {
        $this->horario_inicio = $horario_inicio;
    }

    public function getObra_duracion()
    {
        return $this->obra_duracion;
    } 
    public function setObra_duracion($obra_duracion)
    {
        $this->obra_duracion = $obra_duracion;
    }
    
    public function getObra_precio()
    {
        return $this->obra_precio;
    } 
    public function setObra_precio($obra_precio)
    {
        $this->obra_precio = $obra_precio;
    }



    public function __toString()
    {
        return "-------------------------" . "\n" .
                "-Nombre de la función: " . $this->getNombre() . "\n" .
                "-Horario de inicio: " . $this->getHorario_inicio() . "\n" . "hs" .
                "-Duración de la obra: " . $this->getObra_duracion() . "hs" . "\n" . 
                "-Precio: $" . $this->getObra_precio() . "\n";
    }
}












?>