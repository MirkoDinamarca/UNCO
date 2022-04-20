<?php

class Prestamo {
    private $identificacion;
    private $codElectrodomestico;
    private $fechaOtorgamiento;
    private $monto;
    private $cant_cuotas;
    private $tazaInteres;
    private $coleccionCuotas;
    private $persona; // REFERENCIA A LA PERSONA QUE SOLICITA EL PRESTAMO

    public function __construct($identificacion, $monto, $cant_cuotas, $tazaInteres, $persona)
    {
        $this->identificacion = $identificacion;
        $this->monto = $monto;
        $this->cant_cuotas = $cant_cuotas;
        $this->tazaInteres = $tazaInteres;
        $this->persona = $persona;
    }
 
    public function getIdentificacion()
    {
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function getCodElectrodomestico()
    {
        return $this->codElectrodomestico;
    }
    public function setCodElectrodomestico($codElectrodomestico)
    {
        $this->codElectrodomestico = $codElectrodomestico;
    }

    public function getMonto()
    {
        return $this->monto;
    }
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    public function getFechaOtorgamiento()
    {
        return $this->fechaOtorgamiento;
    }
    public function setFechaOtorgamiento($fechaOtorgamiento)
    {
        $this->fechaOtorgamiento = $fechaOtorgamiento;
    }
     
    public function getCant_cuotas()
    {
        return $this->cant_cuotas;
    }
    public function setCant_cuotas($cant_cuotas)
    {
        $this->cant_cuotas = $cant_cuotas;
    }

    public function getTazaInteres()
    {
        return $this->tazaInteres;
    }
    public function setTazaInteres($tazaInteres)
    {
        $this->tazaInteres = $tazaInteres;
    }

    public function getColeccionCuotas()
    {
        return $this->coleccionCuotas;
    }
    public function setColeccionCuotas($coleccionCuotas)
    {
        $this->coleccionCuotas = $coleccionCuotas;
    }

    public function getPersona()
    {
        return $this->persona;
    }
    public function setPersona($persona)
    {
        $this->persona = $persona;
    }

    /**
     * Método calcularInteresPrestamo($numCuota)
     * @param int $numCuota
     */

    private function calcularInteresPrestamo($numCuota) { // Cambiar a PRIVATE
        $tazaInteres = $this->getTazaInteres();
        $monto = $this->getMonto();
        $interesTotal = 0;

        foreach ($this->getCant_cuotas() as $key => $cuota) {
            $montoInteres = ( $monto - ( ($monto / $numCuota) * ($cuota->getNumero() - 1)) ) * $tazaInteres;
            $cuota->setMonto_interes($montoInteres);
            // print_r($cuota->getMonto_interes() . "\n");
        }
    }

    /**
     * Método otorgarPrestamo()
     */

    public function otorgarPrestamo() {
        $this->setFechaOtorgamiento(getdate());

        foreach ($this->getCant_cuotas() as $key => $cuota) {
            $this->calcularInteresPrestamo(count($this->getCant_cuotas()));

            $montoCuota = $this->getMonto() / count($this->getCant_cuotas()); // ? 10000
            
            $cuota->setMonto_cuota($montoCuota);

            // print_r($cuota->getMonto_cuota());
        }
    }

    /**
     * Método darSiguienteCuotaPagar()
     */

    public function darSiguienteCuotaPagar() {

        foreach ($this->getCant_cuotas() as $key => $cuota) {

            if (!$cuota->getCancelada() == 1) {
                // $validacion = "La cuota N°" . $cuota->getNumero() . " no ha sido pagada"; // ACORDATE QUE NO VA echo EN LAS CLASES
                $validacion = $cuota;
                break;
            } else {
                $validacion = null;
            }
        }
        return $validacion;
    }

    public function __toString()
    {
        return "------------------\n" . 
                "ID: " . $this->getIdentificacion() . "\n" .
                "Monto: $" . $this->getMonto() . "\n" .
                "Cantidad de cuotas: " . count($this->getCant_cuotas()) . "\n" .
                "Taza de interés: " . $this->getTazaInteres() . "%\n";
    }

    
}














?>