<?php

class Cafetera {
    private $capacidadMaxima;
    private $cantidadActual;

    // Método __construct
    public function __construct($capacidadMaxima, $cantidadActual)
    {
        $this->capacidadMaxima = $capacidadMaxima;
        $this->cantidadActual = $cantidadActual;
    }

    // Métodos de acceso
    public function getCapacidadMaxima() {
        return $this->capacidadMaxima;
    }

    public function getCantidadActual() {
        return $this->cantidadActual;
    }

    // Método para llenar la cafetera al máximo
    public function llenarCafetera() {
        return $this->cantidadActual = $this->capacidadMaxima;
    }

    // Método para servir taza de café
    public function servirTaza($cantidad) {
     
        if ($this->cantidadActual < $cantidad) {
            $this->cantidadActual - $cantidad;
            echo "Se llenó su taza hasta " . $this->cantidadActual . "ml debido a que no había más café en la cafetera\n";
        } else {
            $this->cantidadActual - $cantidad;
            echo "Su taza se llenó a " . $cantidad . "ml\n";
        }
    }

    // Método para vaciar la cafetera
    public function vaciarCafetera() {
        return $this->cantidadActual = 0;
    }

    // Método para agregar café a la cafetera
    public function agregarCafe($cantidad) {
        $this->cantidadActual = $this->cantidadActual + $cantidad;

        if ($this->cantidadActual > 100) {
            $this->cantidadActual = 100;
        } else {
            $this->cantidadActual;
        }
        return $this->cantidadActual;
    }

    public function __toString()
    {
        return "La capacidad máxima de la cafetera es de " . $this->getCapacidadMaxima() . "ml y usted tiene " . $this->getCantidadActual() . "ml\n";
    }
}