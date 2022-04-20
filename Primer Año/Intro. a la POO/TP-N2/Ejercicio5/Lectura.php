<?php

class Lectura {
    private $libro;
    private $numPagina;
    private $backupLibros = [];

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

    public function getBackupLibros() {
        return $this->backupLibros;
    }
    public function setBackupLibros($libro) {
        $this->backupLibros[] = $libro;
    }

    // (c) Método siguientePagina()
    public function siguientePagina() {
        $this->setNumPagina($this->getNumPagina() + 1);
    }

    // (d) Método retrocederPagina()
    public function retrocederPagina() {
        $this->setNumPagina($this->getNumPagina() - 1);
    }

    /**
     * (e) Método irPagina($x)
     * @param int $x
     */

    public function irPagina($x) {
        $this->setNumPagina($x);
    }

    /**
     * Ejercicio 5 - Almacenar info de los libros q va leyendo una persona
     * @param $libro
     * @return array
     */

    public function almacenandoLibros($libro) {
        $this->setBackupLibros($libro);
    }

    // (Ejercicio5 - a)
    public function libroLeido($titulo) {

        foreach ($this->getBackupLibros() as $key => $libro) {
            if ($titulo === $libro->getTitulo()) {
                $validacion = true;
            } else {
                $validacion = false;
            }
        }
        return $validacion;
    }

    // (Ejercicio5 - b)
    public function darSinopsis($titulo) {
        foreach ($this->getBackupLibros() as $key => $libro) {
            if ($titulo === $libro->getTitulo()) {
                return $libro->getSinopsis();
            } 
        }
    }

    // (Ejercicio5 - c)
    public function leidosAnioEdicion($x) {
        $libros = [];
        foreach ($this->getBackupLibros() as $key => $libro) {
            if ($x === $libro->getanioEdicion()) {
                $libros[] = $libro->getTitulo();
            } 
        }
        return $libros;
    }

    // (Ejercicio5- d)
    public function darLibrosPorAutor($autor) {
        $libros = [];
        foreach ($this->getBackupLibros() as $key => $libro) {
            if ($autor === $libro->getNombreAutor()) {
                $libros[] = $libro->getTitulo();
            } 
        }
        return $libros;
    }



    // (f)
    public function __toString()
    {
        return "El libro seleccionado es " . $this->getLibro() . "\n" .
                "El número de la página seleccionada es " . $this->getNumPagina();
    }

}

?>