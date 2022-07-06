<?php

include_once "Partido.php";

class Basquet extends Partido {

    private $infracciones;

    public function __construct($idPartido, $primerEquipo, $segundoEquipo, $fecha, $cantGolesE1, $cantGolesE2, $infracciones)
    {
        parent::__construct($idPartido, $primerEquipo, $segundoEquipo, $fecha, $cantGolesE1, $cantGolesE2);
        $this->infracciones = $infracciones;
    }

    public function getInfracciones(){
        return $this->infracciones;
    }
    public function setInfracciones($infracciones){
        $this->infracciones = $infracciones;
    }
    
    /**
     * coeficientePartido() redefinido
     */

    // TODO | Probar si funciona
    public function coeficientePartido()
    {
        $coeficiente = parent::coeficientePartido();
        $descuento = ($coeficiente * $this->getInfracciones()) / 100;
        $coeficiente = $coeficiente - $descuento;

        return $coeficiente;
    }

    public function __toString()
    {
        $string = parent::__toString();
        $string .= "Cantidad de infracciones: " . $this->getInfracciones() . "\n";

        return $string;
    }
    

    
}

?>