<?php

include_once "Viaje.php";

class ViajeAereo extends Viaje {
    private $nroVuelo;
    private $categoriaAsiento = false; // Primera clase o no
    private $nombreAerolinea;
    private $cantEscalas; // En caso de tenerlas

    public function __construct($codigo, $destino, $cantMaxPasajeros, $importe, $viajeIda, $viajeVuelta, $nroVuelo, $categoriaAsiento, $nombreAerolinea, $cantEscalas)
    {
        parent::__construct($codigo, $destino, $cantMaxPasajeros, $importe, $viajeIda, $viajeVuelta);
        $this->nroVuelo = $nroVuelo;
        $this->categoriaAsiento = $categoriaAsiento;
        $this->nombreAerolinea = $nombreAerolinea;
        $this->cantEscalas = $cantEscalas;
    }

    public function getNroVuelo(){
        return $this->nroVuelo;
    }
    public function setNroVuelo($nroVuelo){
        $this->nroVuelo = $nroVuelo;
    }

    public function getCategoriaAsiento(){
        return $this->categoriaAsiento;
    }
    public function setCategoriaAsiento($categoriaAsiento){
        $this->categoriaAsiento = $categoriaAsiento;
    }

    public function getNombreAerolinea(){
        return $this->nombreAerolinea;
    }
    public function setNombreAerolinea($nombreAerolinea){
        $this->nombreAerolinea = $nombreAerolinea;
    }

    public function getCantEscalas(){
        return $this->cantEscalas;
    }
    public function setCantEscalas($cantEscalas){
        $this->cantEscalas = $cantEscalas;
    }

    /**
     * Redefiniendo método venderPasaje para viajeAereo
     */
    // TODO | Funciona
    public function venderPasaje($pasajero)
    {
        if ($this->getCategoriaAsiento() && $this->cantEscalas == 0) {
            $nuevoImporte = parent::venderPasaje($pasajero);
            $nuevoImporte = $nuevoImporte * 1.4;   
            $this->setImporte($nuevoImporte);    
        } else if ($this->getCategoriaAsiento() && $this->cantEscalas > 0) {
            $nuevoImporte = parent::venderPasaje($pasajero);
            $nuevoImporte = $nuevoImporte * 1.6;
            $this->setImporte($nuevoImporte);
        }
        return $nuevoImporte;
    }
}





?>