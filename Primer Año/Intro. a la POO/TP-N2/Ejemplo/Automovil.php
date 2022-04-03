<?php

class Automovil {
    private $marca;
    private $motor;

    /*
    public function __construct($marca, $motor)
    {
        $this->marca = $marca;
        $this->motor = $motor;
    }
    */

    public function getMotor() {
        return $this->motor;
    }

    public function setMotor($test) {
        $this->motor = $test;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($test) {
        $this->marca = $test;
    }

    /*
    public function boluda() {
        $motor = new Motor();

        $motor->setCilindros(6);
        $motor->setPotencia(700);

        $this->setMotor($motor);

        return var_dump($this->motor);
    }
    */
}

