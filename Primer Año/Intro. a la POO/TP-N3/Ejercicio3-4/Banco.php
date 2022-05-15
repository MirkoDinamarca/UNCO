<?php

class Banco {
    private $coleccionCuentaCorriente; // ? Referencia a la clase CuentaCorriente (ejercicio2)
    private $coleccionCajaAhorro; // ? Referencia a la clase CajadeAhorro (ejercicio2)
    private $ultimoValorCuentaAsignado; // ? Referencia al saldo de la clase Cuenta (ejercicio2)
    private $coleccionCliente; // ? Referencia a la clase Cliente (ejercicio1)

    public function __construct(/*$coleccionCuentaCorriente, $coleccionCajaAhorro, $ultimoValorCuentaAsignado, $coleccionCliente*/)
    {
        // $this->coleccionCuentaCorriente = $coleccionCuentaCorriente;
        // $this->coleccionCajaAhorro = $coleccionCajaAhorro;
        // $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
        // $this->coleccionCliente = $coleccionCliente;
    }

    public function getColeccionCuentaCorriente(){
        return $this->coleccionCuentaCorriente;
    }
    public function setColeccionCuentaCorriente($coleccionCuentaCorriente){
        $this->coleccionCuentaCorriente = $coleccionCuentaCorriente;
    }

    public function getColeccionCajaAhorro(){
        return $this->coleccionCajaAhorro;
    }
    public function setColeccionCajaAhorro($coleccionCajaAhorro){
        $this->coleccionCajaAhorro = $coleccionCajaAhorro;
    }

    public function getUltimoValorCuentaAsignado(){
        return $this->ultimoValorCuentaAsignado;
    }
    public function setUltimoValorCuentaAsignado($ultimoValorCuentaAsignado){
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
    }

    public function getColeccionCliente(){
        return $this->coleccionCliente;
    }
    public function setColeccionCliente($coleccionCliente){
        $this->coleccionCliente = $coleccionCliente;
    }

    /**
     * Permite agregar un nuevo cliente al Banco
     * @param object
     */

     // TODO | Probar si anda
    public function incorporarCliente($objCliente) {
        $clientesBanco = $this->getColeccionCliente();

        array_push($clientesBanco, $objCliente);

        $this->setColeccionCliente($clientesBanco);
    }

    /**
     * Agregar una nueva Cuenta a la colección de 
     * cuentas, verificando que el cliente dueño de la cuenta es cliente del Banco.
     */
    // TODO | Probar si anda
    public function incorporarCuentaCorriente($numeroCliente) {
        $cuentasCorrientes = $this->getColeccionCuentaCorriente();

        foreach ($this->getColeccionCliente() as $key => $cliente) {
            if ($numeroCliente->getNombreDuenio() == $cliente->getNombreDuenio()) {
                array_push($cuentasCorrientes, $numeroCliente);
                $this->setColeccionCuentaCorriente($cuentasCorrientes);
            }
        }
    }

    /**
     * Agregar una nueva Caja de Ahorro a la colección de cajas de ahorro, 
     * verificando que el cliente dueño de la cuenta es cliente del Banco.
     */
    // TODO | Probar si anda
    public function incorporarCajaAhorro($numeroCliente) {
        $cajasDeAhorros = $this->getColeccionCajaAhorro();

        foreach ($this->getColeccionCliente() as $key => $cliente) {
            if ($numeroCliente->getNombreDuenio() == $cliente->getNombreDuenio()) {
                array_push($cajasDeAhorros, $numeroCliente);
                $this->setColeccionCuentaCorriente($cajasDeAhorros);
            }
        }
    }

    /**
     * Dado un número de Cuenta y un monto, realizar depósito.
     */
    // TODO | Probar si anda, me hace ruido como lo hice :p
    public function realizarDeposito($numCuenta, $monto) {
        $break = true;
        $i = 0;
        $cuentaCorriente = $this->getColeccionCuentaCorriente();
        $cajaAHorro = $this->getColeccionCajaAhorro();

        while ($break == true) {
            if ($i < count($cuentaCorriente) && $cuentaCorriente[$i]->getNroCuenta() == $numCuenta) {
                $cuentaCorriente[$i]->realizarDeposito($monto);
                $break = false;
            } else if ($i < count($cajaAHorro) && $cajaAHorro[$i]->getNroCuenta() == $numCuenta) {
                $cajaAHorro[$i]->realizarDeposito($monto);
                $break = false;
            }
            $i++;
        }

    }

    /**
     *  Dado un número de Cuenta y un monto, realizar retiro.
     */
    // TODO | Probar si anda, me hace ruido como lo hice
    public function realizarRetiro($numCuenta, $monto) {
        $break = true;
        $i = 0;
        $cuentaCorriente = $this->getColeccionCuentaCorriente();
        $cajaAHorro = $this->getColeccionCajaAhorro();

        while ($break == true) {
            if ($i < count($cuentaCorriente) && $cuentaCorriente[$i]->getNroCuenta() == $numCuenta) {
                $cuentaCorriente[$i]->realizarRetiro($monto);
                $break = false;
            } else if ($i < count($cajaAHorro) && $cajaAHorro[$i]->getNroCuenta() == $numCuenta) {
                $cajaAHorro[$i]->realizarRetiro($monto);
                $break = false;
            }
            $i++;
        }
    }

    // Recorre la colección de cuentas corrientes y los retorna dentro de un string
    public function stringCuentasCorrientes() {
        $stringCuentasCorrientes = "";

        foreach ($this->getColeccionCuentaCorriente() as $key => $cuentaCorriente) {
            $stringCuentasCorrientes.= $cuentaCorriente; 
        }

        return $stringCuentasCorrientes;
    }

    // Recorre la colección de cajas de ahorros y los retorna dentro de un string
    public function stringCajasDeAhorros() {
        $stringCajasDeAhorros = "";

        foreach ($this->getColeccionCajaAhorro() as $key => $cajaAhorro) {
            $stringCajasDeAhorros.= $cajaAhorro; 
        }

        return $stringCajasDeAhorros;
    }

    // Recorre la colección de clientes y los retorna dentro de un string
    public function stringClientes() {
        $stringClientes = "";

        foreach ($this->getColeccionCliente() as $key => $cliente) {
            $stringClientes.= $cliente; 
        }

        return $stringClientes;
    }

    public function __toString()
    {
        return  "Cuentas corrientes: " . $this->stringCuentasCorrientes() . "\n" .
                "Cajas de ahorro: " . $this->stringCajasDeAhorros() . "\n" .
                "Clientes: " . $this->stringClientes() . "\n" .
                "Último valor de cuenta asignado: " . $this->getUltimoValorCuentaAsignado();
    }
}


?>