<?php

class Venta {
    private $fecha;
    private $productos; // ? Referencia al producto o los productos
    private $cliente; // ? Referencia al cliente al que se le realizó la venta
    private $importeFinal; // Se calcula cantida de productos * importe del producto

    public function __construct($fecha, $productos, $cliente)
    {
        $this->fecha = $fecha;
        $this->productos = $productos;
        $this->cliente = $cliente;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getProductos(){
        return $this->productos;
    }
    public function setProducto($productos){
        $this->productos = $productos;
    }

    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getImporteFinal(){
        return $this->importeFinal;
    }
    public function setImporteFinal($importeFinal){
        $this->importeFinal = $importeFinal;
    }

    /**
     * Retorna el valor que debe ser abonado por el cliente.
     */

    public function darImporteVenta() {

    } 

    public function __toString()
    {
        return "";
    }
}





?>