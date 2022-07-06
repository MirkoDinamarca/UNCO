<?php 

class Empresa {
    private $identificacion;
    private $nombreEmpresa;
    private $coleccionViajes;

    public function __construct($identificacion, $nombreEmpresa)
    {
        $this->identificacion = $identificacion;
        $this->nombreEmpresa = $nombreEmpresa;
    }

    public function getIdentificacion()
    {
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
    }
    public function setNombreEmpresa($nombreEmpresa)
    {
        $this->nombreEmpresa = $nombreEmpresa;

        return $this;
    }

    public function getColeccionViajes()
    {
        return $this->coleccionViajes;
    }
    public function setColeccionViajes($coleccionViajes)
    {
        $this->coleccionViajes = $coleccionViajes;

        return $this;
    }

    /**
     * Dado un código de viaje que se recibe por parámetro,
     * retorna el objeto viaje correspondiente a ese código.
     */

    // Probar si funciona
    public function buscarViaje($codViaje) {

        // Se puede hacer con un while?
        foreach ($this->getColeccionViajes() as $key => $viaje) {
            if($viaje->getNumero() == $codViaje) {
                $viajeRetornar = $viaje;
            }
        }

        return $viajeRetornar;
    }

    /**
     * Dado un código de viaje retorna el importe
     * correspondiente a ese viaje.
     * @param int
     * @return int
     */

    // Probar si funciona
    public function darCostoViaje($codViaje) {
        $importeViaje = 0;
        foreach ($this->getColeccionViajes() as $key => $viaje) {

            if(is_a($viaje, "ViajeInternacional") && $viaje->getNumero() == $codViaje) {
                $importeViaje = $viaje->calcularImporteViaje();
            } else if (is_a($viaje, "ViajeNacional") && $viaje->getNumero() == $codViaje) {
                $importeViaje = $viaje->calcularImporteViaje();
            }
        }
        return $importeViaje;
    }

    /**
     * Realizo un recorrido de la coleccion de viajes para mostrar
     */

    public function stringColeccionViajes() {
        $stringViajes = "";

        foreach ($this->getColeccionViajes() as $key => $viaje) {
            $stringViajes.= $viaje;
        }

        return $stringViajes;
    }

    public function __toString()
    {
        return  "-------------------------------\n" .
                "Identificacion: " . $this->getIdentificacion() . "\n" .
                "Nombre Empresa: " . $this->getNombreEmpresa() . "\n" .
                "-------------------------------\n" .
                "Viajes: " . "\n" . $this->stringColeccionViajes() . "\n";
    }


}

?>