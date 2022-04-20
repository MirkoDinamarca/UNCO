<?php

class Cuota {
    private $numero;
    private $monto_cuota;
    private $monto_interes;
    private $cancelada = false; // BOOLEAN | Generada false como por defecto

    public function __construct($numero, $monto_cuota, $monto_interes)
    {
        $this->numero = $numero;
        $this->monto_cuota = $monto_cuota;
        $this->monto_interes = $monto_interes;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getMonto_cuota()
    {
        return $this->monto_cuota;
    }
    public function setMonto_cuota($monto_cuota)
    {
        $this->monto_cuota = $monto_cuota;
    }

    public function getMonto_interes()
    {
        return $this->monto_interes;
    }
    public function setMonto_interes($monto_interes)
    {
        $this->monto_interes = $monto_interes;
    }

    public function getCancelada()
    {
        return $this->cancelada;
    }
    public function setCancelada($cancelada)
    {
        $this->cancelada = $cancelada;
    }

    /**
     * Método darMontoFinalCuota()
     */

    public function darMontoFinalCuota() {
        $sumTotal = $this->getMonto_cuota() + $this->getMonto_interes();
        return $sumTotal;
    }

    /**
     * Método para ver el estao de la cuota
     */

    public function estadoCuota() {
        if ($this->getCancelada() == 1) {
            $validacion = "Pagada";
        } else {
            $validacion = "No Pagada";
        }
        return $validacion;
    }

    public function __toString()
    {
        return  "----------------\n" .
                "Cuota N°" . $this->getNumero() . "\n" .
                "Monto cuota $" . $this->getMonto_cuota() . "\n" . 
                "Monto interes $" . $this->getMonto_interes() . "\n" .
                "Estado: " . $this->estadoCuota(); // ? Me retorna el monto total con interés, ¿Por qué?
    }


}
















?>