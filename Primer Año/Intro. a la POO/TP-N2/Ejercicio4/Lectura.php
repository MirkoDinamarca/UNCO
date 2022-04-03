<?php

class Lectura {
    private $libro;
    private $numPagina;

    // (a) Método __construct
    public function __construct($numPagina)
    {
        $this->numPagina = $numPagina;
    }

    // (b) Métodos de acceso
    public function getLibro() {
        return $this->libro;
    }
    public function setLibro($libro) {
        return $this->libro = $libro;
    }

    public function getNumPagina() {
        return $this->numPagina;
    }
    public function setNumPagina($numPagina) {
        return $this->numPagina = $numPagina;
    }

    // (c) Método siguientePagina()
    public function siguientePagina() {
        $this->setNumPagina($this->getNumPagina() + 1);
    }

    // (d) Método retrocederPagina()
    public function retrocederPagina() {
        $this->setNumPagina($this->getNumPagina() - 1);
    }

    // (e)
    public function irPagina($x) {
        $this->setNumPagina($x);
    }

    // (f)
    public function __toString()
    {
        return "El libro seleccionado es " . $this->getLibro() . "\n" .
                "El número de la página seleccionada es " . $this->getNumPagina();
    }

}

?>