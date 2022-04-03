<?php


class Persona {
    private $nombre;
    private $apellidos;
    private $edad;
    function _construct ($nombre, $apellidos, $edad)
    {
        $this->nombre = $nombre;
        $this-> apellidos - $apellidos;
        $this->edad = $edad;
    }
   function __get($propiedad)
    {
        if(property_exists ($this, $propiedad)){
             return $this-> $propiedad;
        }
    }
    function __set ($propiedad, $valor){
        if(property_exists($this, $propiedad)) {
            $this->$propiedad = $valor;
        }
    }

}