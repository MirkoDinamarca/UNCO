<?php

class Local {
    private $coleccionProductos;
    private $coleccionVentasAgencia;

    public function __construct($coleccionProductos)
    {
        $this->coleccionProductos = $coleccionProductos;
    }

    public function getColeccionProductos(){
        return $this->coleccionProductos;
    }
    public function setColeccionProductos($coleccionProductos){
        $this->coleccionProductos = $coleccionProductos;
    }

    public function getColeccionVentasAgencia(){
        return $this->coleccionVentasAgencia;
    }
    public function setColeccionVentasAgencia($coleccionVentasAgencia){
        $this->coleccionVentasAgencia = $coleccionVentasAgencia;
    }

    /**
     * @param object $objProducto
     */

    // TODO | Funciona
    public function incorporarProductoTienda($objProducto) {
        $coleccionProductos = $this->getColeccionProductos();
        $validacion = true;
        $i = 0;

        while ($validacion == true && $i < count($coleccionProductos)) {
            if ($coleccionProductos[$i]->getCodBarra() === $objProducto->getCodBarra()) {
                $validacion = false;
            } 
            $i++;
        }

        if ($validacion) {
            $coleccionProductos[] = $objProducto;
            $this->setColeccionProductos($coleccionProductos);
        }
        return $validacion;
    }

    /**
     * Método que recibe por parámetro el código de un producto y retorna el precio de venta.
     */

    // TODO | Funciona, llamo al método darPrecioVenta()
    public function retornarImporteProducto($codProducto) {
        $validacion = false;
        $precioProducto = 0;
        $i = 0;
        $coleccionProductos = $this->getColeccionProductos();

        while ($validacion != true) {
            if ($i <= count($coleccionProductos) && $coleccionProductos[$i]->getCodBarra() == $codProducto) {
                $producto = $coleccionProductos[$i];
                $precioProducto = $producto->darPrecioVenta();
                $validacion = true;
            }
            $i++;
        }
        return $precioProducto;
    }

    /**
     * Recorre todos los productos de la tienda y retorna la suma de los costos de 
     * cada producto teniendo en cuenta el stock de cada uno.
     */
    // TODO | Funciona, nuevamente llamo al método darPrecioVenta()
    public function retornarCostoProductoTienda() {
        $costoTotal = 0;

        foreach ($this->getColeccionProductos() as $key => $producto) {
            $costoProductoStock = $producto->getStock() * $producto->darPrecioVenta();
            $costoTotal = $costoTotal + $costoProductoStock;
        }

        return $costoTotal;
    }

    /**
     * Método que retorna el producto más económico de un rubro.
     */
    // TODO | Funciona
    public function productoMasEconomico($rubro) {
        $minimo = 99999;
        foreach ($this->getColeccionProductos() as $key => $producto) {
            if ($producto->getRubroPertenece() == $rubro) {
                if ($producto->darPrecioVenta() < $minimo) {
                    $minimo = $producto->darPrecioVenta();
                    $productoMinimo = $producto;
                }
            }
        }
        return $productoMinimo;
    }

    /**
     * Retorna los n productos más vendidos en el año recibido por parámetro. n se refiere a la cantidad
     */

    public function informarProductosMasVendidos($anio, $n) {
        // ? Ta dificil
    }

    /**
     * Método que retorna el promedio de ventas de productos importados realizadas.
     */

    public function promedioVentasImportados() {
        $productoVendido = 0;
        foreach ($this->getColeccionVentasAgencia() as $key => $venta) {
            if (is_a($venta->getProductos(), "ProductoImportado")) {
                $productoVendido++;
            }
        }
        $this->getColeccionVentasAgencia();
        // ? Falta terminar este método

    }

    /**
     * Método que retorna todos los productos que fueron 
     * comprados por la persona identificada con el tipoDoc y 
     * numDoc recibidos por parámetro.
     */

    public function informarConsumoCliente($tipoDoc, $numDoc) {
        // ? Terminar Método
    }

    public function __toString()
    {
        return "";
    }
 
}

?>