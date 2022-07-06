<?php 

class Terminal {
    private $denominacion;
    private $direccion;
    private $coleccionEmpresas;

    public function __construct($denominacion, $direccion, $coleccionEmpresas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionEmpresas = $coleccionEmpresas;
    }

    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getColeccionEmpresas()
    {
        return $this->coleccionEmpresas;
    }
    public function setColeccionEmpresas($coleccionEmpresas)
    {
        $this->coleccionEmpresas = $coleccionEmpresas;

        return $this;
    }

    /**
     * Recorre cada una de las empresas vinculadas a la terminal
     * y retorna una colección de objetos viaje. Cada viaje es 
     * el de menor valor dentro de la colección de viajes
     * de esa empresa.
     * @return array
     */

    public function darViajeMenorValor() {
        $viajesEconomicos = [
            "empresa" => "",
            "viajeNacional" => "",
            "viajeInternacional" => ""
        ];

        $coleccionViajesEconomicos = [];

        foreach ($this->getColeccionEmpresas() as $key => $empresa) {
            $minimoNacional = 99999;
            $minimoInternacional = 99999;

            foreach ($empresa->getColeccionViajes() as $key => $viaje) {

                if (is_a($viaje, "ViajeNacional") && $viaje->getImporte() < $minimoNacional) {
                    $viajesEconomicos["empresa"] = $empresa->getNombreEmpresa();
                    $viajesEconomicos["viajeNacional"] = $viaje;
                    $minimoNacional = $viaje->getImporte();
                } else if (is_a($viaje, "ViajeInternacional") && $viaje->getImporte() < $minimoInternacional) {
                    $viajesEconomicos["empresa"] = $empresa->getNombreEmpresa();
                    $viajesEconomicos["viajeInternacional"] = $viaje;
                    $minimoInternacional = $viaje->getImporte();
                }

            }
            $coleccionViajesEconomicos[] = $viajesEconomicos;
        }

        return $coleccionViajesEconomicos;
    }

    /**
     * Realizo un recorrido de la coleccion de empresas para mostrar
     */

    public function stringColeccionEmpresas() {
        $stringEmpresas = "";

        foreach ($this->getColeccionEmpresas() as $key => $empresa) {
            $stringEmpresas.= $empresa;
        }

        return $stringEmpresas;
    }

    public function __toString()
    {
        return  "*****************\n" .
                "Denominación: " . $this->getDenominacion() . "\n" .
                "Dirección Terminal: " . $this->getDireccion() . "\n" .
                "Empresas: " . "\n" . $this->stringColeccionEmpresas() . "\n";
    }
 

}

?>