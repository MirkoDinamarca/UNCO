<?php

include_once "Producto.php";

class ProductoRegional extends Producto {
    private $descuento = 0.1;

    public function getDescuento(){
        return $this->descuento;
    }
    public function setDescuento($descuento){
        $this->descuento = $descuento;
    }
    
    // TODO | Funciona
    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta(); 
        $descuento = $precioVenta * $this->getDescuento();
        $precioVenta = $precioVenta - $descuento;
        return $precioVenta;
    }
}
?>