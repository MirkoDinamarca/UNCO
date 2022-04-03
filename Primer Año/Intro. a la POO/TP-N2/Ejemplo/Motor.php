<?php

class Motor {
    public $potencia;
    public $cilindros;

    /*
    public function __construct($potencia, $cilindros)
    {
        $this->potencia = $potencia;
        $this->cilindros = $cilindros;
    }
    */

    public function getPotencia() {
        return $this->potencia;
    }

    public function setPotencia($test) {
        return $this->potencia = $test;
    }

    public function getCilindros() {
        return $this->cilindros;
    }

    public function setCilindros($test) {
        return $this->cilindros = $test;
    }
}