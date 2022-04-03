<?php

include "Automovil.php";
include "Motor.php";

class Programa {
    
    public function probandoPrograma() {
        $auto = new Automovil();
        $auto->setMarca("Toyota");
        $motor = new Motor();

        $motor->setCilindros(6);
        $motor->setPotencia(700);

        $auto->setMotor($motor);

        var_dump($auto->getMotor()) . "\n";
    }
}

$automovil = new Programa();

echo $automovil->probandoPrograma();