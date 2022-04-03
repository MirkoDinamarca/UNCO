<?php

class Libro {
    // Atributos
    private $ISBN;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $nombreAutor;
    private $apellidoAutor;

    // (a) Método constructor
    public function __construct($ISBN, $titulo, $anioEdicion, $editorial, $nombreAutor, $apellidoAutor)
    {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->anioEdicion = $anioEdicion;
        $this->editorial = $editorial;
        $this->nombreAutor = $nombreAutor;
        $this->apellidoAutor = $apellidoAutor;
    }

    // (b)Métodos Acceso

    public function getISBN() {
        return $this->ISBN;
    }
    public function setISBN($new) {
        return $this->ISBN = $new;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($new) {
        return $this->titulo = $new;
    }

    public function getanioEdicion() {
        return $this->anioEdicion;
    }
    public function setanioEdicion($new) {
        return $this->anioEdicion = $new;
    }

    public function getEditorial() {
        return $this->editorial;
    }
    public function setEditorial($new) {
        return $this->editorial = $new;
    }

    public function getNombreAutor() {
        return $this->nombreAutor;
    }
    public function setNombreAutor($new) {
        return $this->nombreAutor = $new;
    }

    public function getApellidoAutor() {
        return $this->apellidoAutor;
    }
    public function setApellidoAutor($new) {
        return $this->apellidoAutor = $new;
    }

    /**
     * (d) Método perteneceEditorial($peditorial)
     * @param string $peditorial
     * @return boolean
     */

    public function perteneceEditorial($peditorial) {
        if($this->getEditorial() === $peditorial) {
            $boolean = true;
        } else {
            $boolean = false;
        }
        return $boolean;
    }

    /**
     * (e) Método aniosdesdeEdicion()
     * @return int
     */

    public function aniosdesdeEdicion() {
        $anioActual = 2022;
        $aniosEdicion = $anioActual - $this->getanioEdicion();
        return $aniosEdicion;
    }

    /**
     * (f-1) Método iguales($plibros, $parreglo)
     * @param string $plibros
     * @param array $parreglo
     */

    public function iguales($plibros, $parreglo) {
        if (in_array($plibros, $parreglo)) {
            $boolean = true;
        } else {
            $boolean = false;
        }
        return $boolean;
    }

    /**
     * (f-2) Método librodeEditorial($arreglolibros, $peditorial) 
     * @param array $arreglolibros
     * @param string $peditorial
     * @return array
     */

    public function librodeEditorial($arregloLibros,$peditorial) {
        if ($this->getEditorial() === $peditorial) {
            array_unshift($arregloLibros, $this->getTitulo());
        }
        return $arregloLibros;
    }

    // (c) Método __toString
    public function __toString()
    {
        return "";
    }
}