<?php 

include_once "Viaje.php";

class ViajeInternacional extends Viaje {
    private $documentacionAdicional;
    private $porcImpuesto = 0.45;

    public function __construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $personaResponsable, $documentacionAdicional)
    {
        parent::__construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $personaResponsable);
        $this->documentacionAdicional = $documentacionAdicional;
    }

    public function getDocumentacionAdicional()
    {
        return $this->documentacionAdicional;
    }
    public function setDocumentacionAdicional($documentacionAdicional)
    {
        $this->documentacionAdicional = $documentacionAdicional;

        return $this;
    }
    
    public function getPorcImpuesto(){
        return $this->porcImpuesto;
    }
    public function setPorcImpuesto($porcImpuesto){
        $this->porcImpuesto = $porcImpuesto;
    }

    /**
     * @return int
     */

    public function calcularImporteViaje() {
        $importe = parent::calcularImporteViaje();

        $impuesto = $importe * $this->getPorcImpuesto();
        $importe = $importe + $impuesto;

        return $importe;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.=   "Porcentaje Impuesto: " . $this->getPorcImpuesto() . "%" . "\n" .
                    "Documentación: " . $this->getDocumentacionAdicional() . "\n\n";
        return $cadena;
    }

   
}


?>