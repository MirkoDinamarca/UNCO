<?php

class Locomotora {
    private $peso;
    private $velocidadMaxima;

    public function __construct($peso, $velocidadMaxima) {
        $this->peso = $peso;
        $this->velocidadMaxima = $velocidadMaxima;
    }

    // Métodos de acceso
    public function getPeso()
    {
        return $this->peso;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    public function getVelocidadMaxima()
    {
        return $this->velocidadMaxima;
    }
    public function setVelocidadMaxima($velocidadMaxima)
    {
        $this->velocidadMaxima = $velocidadMaxima;

        return $this;
    }

    public function __toString()
    {
        return  "Peso Locomotora: " . $this->getPeso() . "\n" .
                "Velocidad Máxima: " . $this->getVelocidadMaxima() . "kg/h" . "\n";
    }
}

?>