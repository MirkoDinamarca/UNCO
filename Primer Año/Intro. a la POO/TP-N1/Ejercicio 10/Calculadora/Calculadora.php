<?php

/* 
(a) Diseñar e implementar la clase Calculadora que permite realizar las operaciones básicas: + , - , *, /
*/

class Calculadora {
    private $numero1;
    private $numero2;

    public function __construct($numero1, $numero2) 
    {
        $this->numero1 = $numero1;
        $this->numero2 = $numero2;
    }

    public function getNumero1() {
        return $this->numero1;
    }
    public function getNumero2() {
        return $this->numero2;
    }

    public function sumar() {
        return $this->getNumero1() + $this->getNumero2();
    }
    public function restar() {
        return $this->getNumero1() - $this->getNumero2();
    }
    public function multiplicar() {
        return $this->getNumero1() * $this->getNumero2();
    }
    public function dividir() {
        return $this->getNumero1() / $this->getNumero2();
    }

    public function __toString()
    {
        return "La suma es " . $this->sumar();
    }
}

$calculadora = new Calculadora(10,10);

echo $calculadora;