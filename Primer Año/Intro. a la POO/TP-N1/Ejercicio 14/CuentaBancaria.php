<?php

class CuentaBancaria {
    // Atributos

    private $numeroCuenta;
    private $dniCliente;
    private $saldoActual;
    private $interesAnual;

    // (a) Método constructor
    public function __construct($numeroCuenta, $dniCliente, $saldoActual, $interesAnual)
    {
        $this->numeroCuenta = $numeroCuenta;
        $this->dniCliente = $dniCliente;
        $this->saldoActual = $saldoActual;
        $this->interesAnual = $interesAnual;
    }

    // (b) Métodos de acceso
    public function getNumCuenta() {
        return $this->numeroCuenta;
    }
    public function setNumCuenta($num) {
        return $this->numeroCuenta = $num;
    }

    public function getdniCliente() {
        return $this->dniCliente;
    }
    public function setdniCliente($num) {
        return $this->dniCliente = $num;
    }

    public function getSaldoActual() {
        return $this->saldoActual;
    }
    public function setSaldoActual($num) {
        return $this->saldoActual = $num;
    }

    public function getInteresAnual() {
        return $this->interesAnual;
    }
    public function setInteresAnual($num) {
        return $this->interesAnual = $num;
    }

    /**
     * (c) Método actualizarSaldo()
     * Va actualizar el saldo aplicando el interés diario
     * $interesAnual / 365 = interés diario
     */

     public function actualizarSaldo() {
        $interesDiario = $this->getInteresAnual() / 365;
        $saldoMasInteres = ($interesDiario * 365) + $this->getSaldoActual();
        return $saldoMasInteres;
     }


    /**
     * (d) Método depositar($cant)
     * Permite ingresar una cantidad de dinero a la cuenta
     * @param int $cant
     */

     public function depositar($cant) {
        $saldoDeposito = $this->getSaldoActual() + $cant;
        $this->setSaldoActual($saldoDeposito);
     }

    /**
     * (e) Método retirar($cant)
     * Permite retirar dinero si es que hay saldo
     * @param int $cant
     * @return int
     */

     public function retirar($cant) {
        $saldo = $this->getSaldoActual() - $cant;
        $this->setSaldoActual($saldo);
     }

    // (f) Método __toString
    public function __toString()
    {
        return "Probando";
    }
}