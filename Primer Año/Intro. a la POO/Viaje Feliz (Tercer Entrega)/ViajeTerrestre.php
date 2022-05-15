<?php

include_once "Viaje.php";

class ViajeTerrestre extends Viaje {
    private $comodidadAsiento; // Si es semicama o cama

    public function __construct($codigo, $destino, $cantMaxPasajeros, $importe, $viajeIda, $viajeVuelta, $comodidadAsiento)
    {
        parent::__construct($codigo, $destino, $cantMaxPasajeros, $importe, $viajeIda, $viajeVuelta);
        $this->comodidadAsiento = $comodidadAsiento;
    }

    public function getComodidadAsiento(){
        return $this->comodidadAsiento;
    }
    public function setComodidadAsiento($comodidadAsiento){
        $this->comodidadAsiento = $comodidadAsiento;
    }

    /**
     * Redefiniendo método venderPasaje para ViajeTerrestre
     */

    // TODO | Funciona
    public function venderPasaje($pasajero)
    {
        if ($this->getComodidadAsiento() == "cama") {
            $nuevoImporte = parent::venderPasaje($pasajero);
            $nuevoImporte = $nuevoImporte * 1.25;
            $this->setImporte($nuevoImporte);
        } else {
            $nuevoImporte = parent::venderPasaje($pasajero);
        }
        return $nuevoImporte;
        
    }
}





?>