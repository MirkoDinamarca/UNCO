<?php
include "../Ejercicio3/Libro.php";

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

    public function almacenandoLibros() {
        echo "Ingrese el ISBN del libro: ";
        $isbn = trim(fgets(STDIN));
        echo "Ingrese el título: ";
        $titulo = strtoupper(trim(fgets(STDIN)));
        echo "Ingrese el año de edición: ";
        $anio = trim(fgets(STDIN));
        echo "Ingrese la editorial: ";
        $editorial = trim(fgets(STDIN));
        echo "¿Cuántas páginas tiene?: ";
        $paginas = trim(fgets(STDIN));
        echo "Dé una breve sinópsis del libro: ";
        $sinopsis = trim(fgets(STDIN));

        $libro = new Libro($isbn, $titulo, $anio, $editorial, $paginas, $sinopsis);
        $this->setBackupLibros($libro);

        return $this->getBackupLibros();
    }

    // (Ejercicio5 - a)
    public function libroLeido() {
        var_dump($this->getBackupLibros());

        /*
        $contadorArreglo = count($this->getBackupLibros());

        for ($i=0; $i < $contadorArreglo; $i++) { 
            if ($titulo === $this->getBackupLibros()[$i]->getTitulo()) {
                $libroLeido = true;
            } else {
                $libroLeido = false;
            }
        }
        return $libroLeido;
        // FOREACH para recorrer el array por cada objeto
        */
    }

    // (Ejercicio5 - b)
    public function darSinopsis($titulo) {
        if (in_array($this->getLibro(), $this->getBackupLibros())) {

        } else {
            var_dump($this->getBackupLibros());
            echo "El libro no se encuentra en la Backup\n";
        }
        // return $this->setLibro($titulo) . "\n";
    }

    // (Ejercicio5 - c)
    public function leidosAnioEdicion($x) {

    }

    // (Ejercicio5- d)
    public function darLibrosPorAutor($nombreAutor) {

    }



    // (f)
    public function __toString()
    {
        return "El libro seleccionado es " . $this->getLibro() . "\n" .
                "El número de la página seleccionada es " . $this->getNumPagina();
    }

}

?>