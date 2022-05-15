<?php

class Persona {
    private $nombre;
    private $apellido;
    private $tipoDNI;
    private $dni;

    /**
     * (a-1) Método Constructor
     */

    public function __construct($nombre, $apellido, $tipoDNI, $dni)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDNI = $tipoDNI;
        $this->dni = $dni;
    }

    
    //(a-2) Métodos de acceso

    public function getNombre() {
       return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
     }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getTipoDNI(){
        return $this->tipoDNI;
    }
    public function setTipoDNI($tipoDNI){
        $this->tipoDNI = $tipoDNI;
    }

    public function getDni() {
        return $this->dni;
    }
    public function setDni($dni) {
        $this->dni = $dni;
    }

    // (a-3) Método __toString
    public function __toString()
    {
        return  "\nNombre y Apellido: " . $this->getNombre() . " " . $this->getApellido() . "\n" .
                "Tipo y N° documento: " . $this->getTipoDNI() . " " . $this->getDni() . "\n";
    }

    
}