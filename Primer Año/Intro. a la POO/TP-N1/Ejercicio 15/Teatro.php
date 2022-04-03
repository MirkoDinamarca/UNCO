<?php

class Teatro {
    // Atributos
    private $nombre;
    private $direccion;
    private $primerFuncion = ["nombre" => "", "precio" => 0];
    private $segundaFuncion = ["nombre" => "", "precio" => 0];
    private $terceraFuncion = ["nombre" => "", "precio" => 0];
    private $cuartaFuncion = ["nombre" => "", "precio" => 0];

    public function __construct($nombre, $direccion)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    // Métodos de Acceso
    public function getNombreTeatro() {
        return $this->nombre;
    }
    public function setNombreTeatro($nombre) {
        return $this->nombre = $nombre;
    }

    public function getDireccionTeatro() {
        return $this->direccion;
    }
    public function setDireccionTeatro($direccion) {
        return $this->direccion = $direccion;
    }

    public function getPrimerFuncion() {
        return $this->primerFuncion;
    }
    public function setPrimerFuncion($nombre, $precio) {
        $this->primerFuncion["nombre"] = $nombre;
        $this->primerFuncion["precio"] = $precio;
    }

    public function getSegundaFuncion() {
        return $this->segundaFuncion;
    }
    public function setSegundaFuncion($nombre, $precio) {
        $this->segundaFuncion["nombre"] = $nombre;
        $this->segundaFuncion["precio"] = $precio;
    }

    public function getTerceraFuncion() {
        return $this->terceraFuncion;
    }
    public function setTerceraFuncion($nombre, $precio) {
        $this->terceraFuncion["nombre"] = $nombre;
        $this->terceraFuncion["precio"] = $precio;
    }

    public function getCuartaFuncion() {
        return $this->cuartaFuncion;
    }
    public function setCuartaFuncion($nombre, $precio) {
        $this->cuartaFuncion["nombre"] = $nombre;
        $this->cuartaFuncion["precio"] = $precio;
    }

    // Método para cambiar nombre y dirección del teatro
    public function cambiarTeatro($newName, $newDirection) {
        $this->setNombreTeatro($newName);
        $this->setDireccionTeatro($newDirection);
    }

    // Método para cambiar nombre y precio de la función
    public function cambiarFuncion($numero, $newName, $newPrice) {
        switch ($numero) {
            case 1:
                $this->setPrimerFuncion($newName, $newPrice);
                break;
            case 2:
                $this->setSegundaFuncion($newName, $newPrice);
                break;
            case 3:
                $this->setTerceraFuncion($newName, $newPrice);
                break;
            case 4:
                $this->setCuartaFuncion($newName, $newPrice);
                break;
        }
    }
}

