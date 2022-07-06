<?php

class Ventas {
    private $fecha;
    private $paquete;
    private $cantPersonas;
    // private $cliente; // Referencia al cliente? O sólo el tipo y num del DNI
    private $tipoDocCliente;
    private $tipoNumDoc;

    public function __construct($fecha, $paquete, $cantPersonas, $tipoDocCliente, $tipoNumDoc)
    {
        $this->fecha = $fecha;
        $this->paquete = $paquete;
        $this->cantPersonas = $cantPersonas;
        $this->tipoDocCliente = $tipoDocCliente;
        $this->tipoNumDoc = $tipoNumDoc;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getPaquete(){
        return $this->paquete;
    }
    public function setPaquete($paquete){
        $this->paquete = $paquete;
    }

    public function getCantPersonas(){
        return $this->cantPersonas;
    }
    public function setCantPersonas($cantPersonas){
        $this->cantPersonas = $cantPersonas;
    }

    public function getTipoDocCliente(){
        return $this->tipoDocCliente;
    }
    public function setTipoDocCliente($tipoDocCliente){
        $this->tipoDocCliente = $tipoDocCliente;
    }

    public function getTipoNumDoc(){
        return $this->tipoNumDoc;
    }
    public function setTipoNumDoc($tipoNumDoc){
        $this->tipoNumDoc = $tipoNumDoc;
    }

    // public function getCliente(){
    //     return $this->cliente;
    // }
    // public function setCliente($cliente){
    //     $this->cliente = $cliente;
    // }


    /**
     * Retorna el valor que debe ser abonado por el cliente
     */
    // TODO | Probar si funciona  
    public function darImporteVenta() {
        // Cantidad de días * el importe del dia * la cantidad de personas de la venta
        echo "hola";
        $importeFinal = ($this->getPaquete()->getCantDias() * $this->getPaquete()->getDestino()->getValorxPasajeroxDia()) * $this->getCantPersonas();
        return $importeFinal;
    }
    
}




?>