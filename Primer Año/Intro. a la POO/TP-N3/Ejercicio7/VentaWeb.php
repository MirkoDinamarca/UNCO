<?php

include_once "Ventas.php";

class VentaWeb extends Ventas {
    private $porcDescuento = 20;

    public function __construct($fecha, $paquete, $cantPersonas, $tipoDocCliente, $tipoNumDoc)
    {
        parent::__construct($fecha, $paquete, $cantPersonas, $tipoDocCliente, $tipoNumDoc);
        // $this->porcDescuento = $porcDescuento;
    }

    public function getPorcDescuento(){
        return $this->porcDescuento;
    }
    public function setPorcDescuento($porcDescuento){
        $this->porcDescuento = $porcDescuento;
    }

    /**
     * Retorna el valor que debe ser abonado por el cliente
     * Redefinida
     */
    // TODO | Probar si funciona  
    public function darImporteVenta() {
        // Cantidad de días * el importe del dia * la cantidad de personas de la venta
        // Aplicar el descuento
        $importeFinalPadre = parent::darImporteVenta();
        $descuento = ($importeFinalPadre * $this->getPorcDescuento()) / 100;
        $importeFinalPadre = $importeFinalPadre - $descuento;
        return $importeFinalPadre;
    }
}



?>