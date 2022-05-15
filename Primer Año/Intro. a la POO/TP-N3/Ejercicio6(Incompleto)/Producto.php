<?php

class Producto {
    private $codBarra;
    private $descripcion;
    private $stock;
    private $porcIva;
    private $precioCompra;
    private $rubroPertenece; // ? Referencia al rubro que pertenece

    public function __construct($codBarra, $descripcion, $stock, $porcIva, $precioCompra, $rubroPertenece)
    {
        $this->codBarra = $codBarra;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->porcIva = $porcIva;
        $this->precioCompra = $precioCompra;
        $this->rubroPertenece = $rubroPertenece;
    }
    
    public function getCodBarra(){
        return $this->codBarra;
    }
    public function setCodBarra($codBarra){
        $this->codBarra = $codBarra;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getStock(){
        return $this->stock;
    }
    public function setStock($stock){
        $this->stock = $stock;
    }

    public function getPorcIva(){
        return $this->porcIva;
    }
    public function setPorcIva($porcIva){
        $this->porcIva = $porcIva;
    }

    public function getPrecioCompra(){
        return $this->precioCompra;
    }
    public function setPrecioCompra($precioCompra){
        $this->precioCompra = $precioCompra;
    }

    public function getRubroPertenece(){
        return $this->rubroPertenece;
    }
    public function setRubroPertenece($rubroPertenece){
        $this->rubroPertenece = $rubroPertenece;
    }

    /**
     * Método que retorna el precio de venta de un producto
     */
    // TODO | Funciona, se le suma el % del rubro más el iva del producto (21%)
    public function darPrecioVenta() {
        $precioVenta = ($this->getPrecioCompra() * ($this->getRubroPertenece()->getPorcGanancia())) * ($this->getPorcIva());
        return $precioVenta;
    }

    public function __toString()
    {
        return "";
    }
}







?>