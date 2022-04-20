<?php

class Pasajero {
    // Atributos
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    // Método __construct
    public function __construct($nombre, $apellido, $dni, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;
    }

    // Métodos de Acceso

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function __toString()
    {
        return  "\n------------------------\n" .
                "Nombre y apellido: " . $this->getNombre() . " " . $this->getApellido() . "\n" .
                "DNI: " . $this->getDni() . "\n" .
                "Teléfono: " . $this->getTelefono();
    }
}





?>