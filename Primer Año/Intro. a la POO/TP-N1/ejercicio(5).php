<?php

class Persona {
    private $nombre;
    private $nacionalidad;
    private $edad;
    private $altura;

    public function __construct($nombre, $nacionalidad, $edad, $altura)
    {
        $this->nombre = $nombre;
        $this->nacionalidad = $nacionalidad;
        $this->edad = $edad;
        $this->altura = $altura;
    }

    public function __toString()
    {
        return "Su nombre es " . $this->nombre . ", su nacionalidad " . $this->nacionalidad . ", tiene " . $this->edad . " años y una altura de " . $this->altura . " metros";
    }
}

$persona = new Persona("Mirko", "Argentino", 22, 1.87);
echo $persona;