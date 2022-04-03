<?php

class Linea {
    private $pA;
    private $pB;
    private $pC;
    private $pD;

    public function __construct($puntoA,$puntoB, $puntoC, $puntoD) {
        $this->pA = $puntoA;
        $this->pB = $puntoB;
        $this->pC = $puntoC;
        $this->pD = $puntoD;
    }

    public function getpA() {
        return $this->pA;
    }
    public function setpA($num) {
        return $this->pA = $num;
    }
    public function getpB() {
        return $this->pB;
    }
    public function setpB($num) {
        return $this->pB = $num;
    }
    public function getpC() {
        return $this->pC;
    }
    public function setpC($num) {
        return $this->pC = $num;
    }
    public function getpD() {
        return $this->pD;
    }
    public function setpD($num) {
        return $this->pD = $num;
    }

    public function mueveDerecha($d) {
        return ($this->pA = $this->getpA() + $d) . ($this->pC = $this->getpC() + $d);
    }

    public function mueveIzquierda($d) {
        return ($this->pA = $this->getpA() - $d) . ($this->pC = $this->getpC() - $d);
    }

    public function mueveArriba($d) {
        return ($this->pB = $this->getpB() + $d) . ($this->pD = $this->getpD() + $d);
    }

    public function mueveAbajo($d) {
        return ($this->pB = $this->getpB() - $d) . ($this->pD = $this->getpD() - $d);
    }

    public function __toString()
    {
        return "Las coordenadas son: (" . $this->getpA() . ";" . $this->getpB() . ")" . "(" . $this->getpC() . ";" . $this->getpD() . ")";
    }
}