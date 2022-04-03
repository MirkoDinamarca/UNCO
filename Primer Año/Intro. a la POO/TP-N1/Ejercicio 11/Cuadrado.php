<?php

class Cuadrado {
    private $coordenadaA = ["x" => 0, "y" => 0];
    private $coordenadaB = ["x" => 0, "y" => 0];
    private $coordenadaC = ["x" => 0, "y" => 0];
    private $coordenadaD = ["x" => 0, "y" => 0];
    private $tamaño;

    // (a) Método constructor que recibe como parámetros las coordenadas de los puntos
    public function __construct($CoorA, $CoorB, $CoorC, $CoorD) 
    {
        $this->coordenadaA = $CoorA;
        $this->coordenadaB = $CoorB;
        $this->coordenadaC = $CoorC;
        $this->coordenadaD = $CoorD;  
    }

    // (b) Los métodos de acceso de cada uno de los atributos de la clase
    public function getCoorA() {
        return $this->coordenadaA;
    }
    public function getCoorB() {
        return $this->coordenadaB;
    }
    public function getCoorC() {
        return $this->coordenadaC;
    }
    public function getCoorD() {
        return $this->coordenadaD;
    }

    // (c) area() método que calcula el área del cuadrado
    public function area() {
        $ladoAB = abs($this->getCoorA()["x"] - $this->getCoorB()["x"]);
        $ladoCD = abs($this->getCoorA()["x"] - $this->getCoorB()["x"]);
        $area = $ladoAB * $ladoCD;
        return $area;
    }

    // (d) desplazar($d) Método que recibe por parámetro un punto y desplaza el cuadrado en el plano desde su punto más inferior izquierdo
    public function desplazar($d) {
        /* ? */
    }

    // (e) aumentarTamanio($t) Método que recibe por parámetro el tamaño que debe aumentar el cuadrado
    
    public function aumentarTamanio($t) {
        $this->coordenadaA["x"] = $this->getCoorA()["x"] - $t;
        $this->coordenadaA["y"] = $this->getCoorA()["y"] + $t;
        $this->coordenadaB["x"] = $this->getCoorB()["x"] + $t;
        $this->coordenadaB["y"] = $this->getCoorB()["y"] + $t;
        $this->coordenadaC["x"] = $this->getCoorC()["x"] + $t;
        $this->coordenadaC["y"] = $this->getCoorC()["y"] - $t;
        $this->coordenadaD["x"] = $this->getCoorD()["x"] - $t;
        $this->coordenadaD["y"] = $this->getCoorD()["y"] - $t;
    }

    // (f) Redefinir el método __toString() para que retorne la información de los atributos de la clase
    public function __toString()
    { 
        return "Los puntos ingresados son: " . "\n" . 
                "Vertice A: (" . $this->getCoorA()["x"] . "," . $this->getCoorA()["y"] . ")\n" . 
                "Vertice B: (" . $this->getCoorB()["x"] . "," . $this->getCoorB()["y"] . ")\n" .
                "Vertice C: (" . $this->getCoorC()["x"] . "," . $this->getCoorC()["y"] . ")\n" .
                "Vertice D: (" . $this->getCoorD()["x"] . "," . $this->getCoorD()["y"] . ")\n";
    }

    // Crear un script Test_Cuadrado que cree un objeto Cuadrado e invoque a cada uno de los métodos implementados.
}