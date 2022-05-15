<?php

include_once "Cuenta.php";

class CajadeAhorro extends Cuenta {

    public function __construct($nombreDuenio, $nroCuenta, $dniCliente, $saldoActual)
    {
        parent::__construct($nombreDuenio, $nroCuenta, $dniCliente, $saldoActual);
    }

    /**
     * Realizar retiro de dinero (Polimorfismo)
     */

    public function realizarRetiro($monto)
    {
        $validacion = false;
        if (parent::saldoCuenta() > $monto) {
            parent::realizarRetiro($monto);
            $validacion = true;
        }
        return $validacion;
    }



    public function __toString()
    {
        $cadena = parent::__toString();
        return $cadena;
    }
}





?>