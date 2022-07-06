<?php

class Equipo {
    private $nombre;
    private $nombreCapitan;
    private $cantJugadores;
    private $categoria;
    
    public function __construct($nombre, $nombreCapitan, $cantJugadores, $categoria)
    {
        $this->nombre = $nombre;
        $this->nombreCapitan = $nombreCapitan;
        $this->cantJugadores = $cantJugadores;
        $this->categoria = $categoria;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombreCapitan(){
        return $this->nombreCapitan;
    }
    public function setNombreCapitan($nombreCapitan){
        $this->nombreCapitan = $nombreCapitan;
    }

    public function getCantJugadores(){
        return $this->cantJugadores;
    }
    public function setCantJugadores($cantJugadores){
        $this->cantJugadores = $cantJugadores;
    }

    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function __toString()
    {
        return  "Nombre: " . $this->getNombre() . "\n" .
                "Capitán: " . $this->getNombreCapitan() . "\n" .
                "Cantidad Jugadores: " . $this->getCantJugadores() . "\n" .
                "Categoria: " . $this->getCategoria();
    }
}

?>