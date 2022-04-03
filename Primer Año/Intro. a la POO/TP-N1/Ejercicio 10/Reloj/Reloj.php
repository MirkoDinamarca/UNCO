<?php

class Reloj {
    private $horas;
    private $minutos;
    private $segundos;

    public function __construct($horas, $minutos, $segundos)
    {
        $this->horas = $horas;
        $this->minutos = $minutos;
        $this->segundos = $segundos;
    }

    public function getHoras() {
        return $this->horas;
    }
    public function setHoras($numero) {
        return $this->horas = $numero;
    }

    public function getMinutos() {
        return $this->minutos;
    }
    public function setMinutos($numero) {
        return $this->minutos = $numero;
    }

    public function getSegundos() {
        return $this->segundos;
    }
    public function setSegundos($numero) {
        return $this->segundos = $numero;
    }

    public function puesta_a_cero() {
        $this->horas = 0;
        $this->minutos = 0;
        $this->segundos = 0;
    }

    public function incremento() {

        while ($this->horas < 24) {
            // Segundos
            if ($this->segundos >= 59) {
                $this->segundos = 0;

                // Minutos
                if ($this->minutos >= 59) {
                    $this->minutos = 0;

                    // Horas
                    if ($this->horas >= 23) {
                        $this->horas = 0;
                    } else {
                        $this->horas += 1;
                    }

                } else {
                    $this->minutos += 1;
                }

            } else {
                $this->segundos += 1;
            }
            echo $this->horas . ":" . $this->minutos . ":" . $this->segundos . "\n";
        }
    }

    public function __toString()
        {
            return "La hora es " . $this->getHoras() . ":" . $this->getMinutos() . ":" . $this->getSegundos();
        }
}

$reloj = new Reloj(22,55,10);
echo $reloj . "\n";
echo $reloj->incremento();