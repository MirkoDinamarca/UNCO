<?php

class Cuenta {
    private $nombreDuenio;
    private $nroCuenta;
    private $dniCliente;
    private $saldoActual;

    public function __construct($nombreDuenio, $nroCuenta, $dniCliente, $saldoActual)
    {
        $this->nombreDuenio = $nombreDuenio;
        $this->nroCuenta = $nroCuenta;
        $this->dniCliente = $dniCliente;
        $this->saldoActual = $saldoActual;
    }

    public function getNombreDuenio(){
        return $this->nombreDuenio;
    }
    public function setNombreDuenio($nombreDuenio){
        $this->nombreDuenio = $nombreDuenio;
    }

    public function getNroCuenta(){
        return $this->nroCuenta;
    }
    public function setNroCuenta($nroCuenta){
        $this->nroCuenta = $nroCuenta;
    }

    public function getDniCliente(){
        return $this->dniCliente;
    }
    public function setDniCliente($dniCliente){
        $this->dniCliente = $dniCliente;
    }

    public function getSaldoActual(){
        return $this->saldoActual;
    }
    public function setSaldoActual($saldoActual){
        $this->saldoActual = $saldoActual;
    }

    /**
     * Retorna el saldo de la cuenta.
     */

    public function saldoCuenta() {
        return $this->getSaldoActual();
    }

    /**
     * Permite realizar un depósito a la cuenta una cantidad “monto” de dinero.
     */

    public function realizarDeposito($monto) {
        $saldoActual = $this->saldoCuenta();

        $saldoActual = $saldoActual + $monto;

        $this->setSaldoActual($saldoActual);
    }

    /**
     *  Permite realizar un retiro de la cuenta por una cantidad “monto” de dinero.
     */

    public function realizarRetiro($monto) {
        $saldoActual = $this->saldoCuenta();

        $saldoActual = $saldoActual - $monto;

        $this->setSaldoActual($saldoActual);
    }

    public function __toString()
    {
        return  "\nDueño: " . $this->getNombreDuenio() . "\n" .
                "N°Cuenta: " . $this->getNroCuenta() . "\n" .
                "DNI Cliente: " . $this->getDniCliente(). "\n" .
                "Saldo: $" . $this->getSaldoActual() . "\n";
    }

    
}





?>