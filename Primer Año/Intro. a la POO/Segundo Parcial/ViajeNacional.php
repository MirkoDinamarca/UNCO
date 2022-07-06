<?php 

include_once "Viaje.php";

class ViajeNacional extends Viaje {
    private $porcDescuento = 0.1;

    public function __construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $personaResponsable)
    {
        parent::__construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $personaResponsable);
    }
    
    public function getPorcDescuento(){
        return $this->porcDescuento;
    }
    public function setPorcDescuento($porcDescuento){
        $this->porcDescuento = $porcDescuento;
    }

    /**
     * 
     * @param
     * @return int
     */

    public function calcularImporteViaje() {
        $importe = parent::calcularImporteViaje();

        $descuento = $importe * $this->getPorcDescuento();
        $importe = $importe - $descuento;

        return $importe;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Porcentaje Descuento: " . $this->getPorcDescuento() . "%\n\n";
        return $cadena;    
    }
}


?>