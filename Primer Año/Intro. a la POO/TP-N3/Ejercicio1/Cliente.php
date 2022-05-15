<?php

include "Persona.php";

class Cliente extends Persona {
    private $nroCliente;

    public function __construct($nombre, $apellido, $tipoDni, $dni, $nroCliente)
    {
        parent::__construct($nombre, $apellido, $tipoDni, $dni);
        $this->nroCliente = $nroCliente;
    }

    public function getNroCliente(){
        return $this->nroCliente;
    }
    public function setNroCliente($nroCliente){
        $this->nroCliente = $nroCliente;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "N°Cliente: " . $this->getNroCliente() . "\n";

        return $cadena;
    }
}

?>