<?php

include_once "Cuenta.php";

class CuentCorriente extends Cuenta {
    private $montoMaximo;

    public function __construct($nombreDuenio, $nroCuenta, $dniCliente, $saldoActual, $montoMaximo)
    {
        parent::__construct($nombreDuenio, $nroCuenta, $dniCliente, $saldoActual);
        $this->montoMaximo = $montoMaximo;
    }

    public function getMontoMaximo(){
        return $this->montoMaximo;
    }
    public function setMontoMaximo($montoMaximo){
        $this->montoMaximo = $montoMaximo;
    }

    /**
     * Método para realiza retiro (Polimorfismo)
     * @param int $monto
     */

    public function realizarRetiro($monto)
    {
        $montoMax = $this->getMontoMaximo() + parent::getSaldoActual();

        if ($montoMax > $monto) {
            parent::realizarRetiro($monto);
        }
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Monto Máximo: $" . $this->getMontoMaximo() . "\n";

        return $cadena;
    }
}

?>