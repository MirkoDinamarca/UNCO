<?php

include_once "Partido.php";

class Futbol extends Partido {
    
    public function __construct($idPartido, $primerEquipo, $segundoEquipo, $fecha, $cantGolesE1, $cantGolesE2)
    {
        parent::__construct($idPartido, $primerEquipo, $segundoEquipo, $fecha, $cantGolesE1, $cantGolesE2);
    }

    /**
     * coeficientePartido() redefinido
     */

    // TODO | Probar si funciona
    public function coeficientePartido()
    {
        $coeficiente = parent::coeficientePartido();

        if ($this->getPrimerEquipo()->getCategoria()->getDescripcion() == "Menores") {
            $coeficiente = $coeficiente * 1.11;
        } else if ($this->getPrimerEquipo()->getCategoria()->getDescripcion() == "Juveniles") {
            $coeficiente = $coeficiente * 1.17;
        } else if ($this->getPrimerEquipo()->getCategoria()->getDescripcion() == "Mayores") {
            $coeficiente = $coeficiente * 1.23;
        }

        return $coeficiente;
    }

    public function __toString()
    {
        $string = parent::__toString();
        return $string;
    }
}

?>