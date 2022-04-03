<?php

class Fecha {
    private $dia;
    private $mes;
    private $anio;

    public function __construct($dia, $mes, $anio)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    public function fechaAbreviada() {
        return $this->dia . "/" . $this->mes . "/" . $this->anio;
    }

    public function fechaExtendida() {
        $meses = ["","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        for ($i=0; $i <= count($meses); $i++) { 
            if ($meses[$this->mes] === $meses[$i]) {
                $mesExtendido = $meses[$i];
                return $this->dia . " de " . $mesExtendido . " de " . $this->anio;
            }
        }
    }

    public function incrementa_un_dia($entero) {
        $this->dia = $this->dia + $entero;
        return $this->dia;
    }

    public function incremento($dia, $mes, $anio, $entero) {
        $dia = $this->incrementa_un_dia($entero);
        return $dia . "/" . $mes . "/" . $anio;
    }

    public function __toString()
    {
        return $this->fechaAbreviada() . "\n" . $this->fechaExtendida() . "\n" . "La fecha incrementada es " . $this->incremento(10, 12, 1999, 10);
    }
}

$fechaActual = new Fecha(10, 12, 1999);

echo $fechaActual;