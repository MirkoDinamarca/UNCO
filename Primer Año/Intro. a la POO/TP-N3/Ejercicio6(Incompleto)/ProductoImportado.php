<?php

include_once "Producto.php";

class ProductoImportado extends Producto {

    // TODO | Funciona
    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        $precioVenta = $precioVenta * 1.60;
        return $precioVenta;
    }
}

?>