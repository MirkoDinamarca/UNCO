<?php 

include_once "Contrato.php";

class ContratoWeb extends Contrato {
    private $descuento = 0.1;

    public function __construct($fechaInicio, $fechaVencimiento, $plan, $cliente,)
    {
        parent::__construct($fechaInicio, $fechaVencimiento, $plan, $cliente);
    }

    public function getDescuento(){
        return $this->descuento;
    }
    public function setDescuento($descuento){
        $this->descuento = $descuento;
    }

    /**
     * Retorna el importe final correspondiente al importe del contrato
     * (Importe plan + importe parcial de cada canal q lo conforma)
     * (Se aplica el 10% de descuento por ser un contrato web)
     */

    public function calcularImporte() {
        $importeFinal = parent::calcularImporte();

        $descuento = $importeFinal * $this->getDescuento();
        $importeFinal = $importeFinal - $descuento;

        return $importeFinal;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Descuento: " . $this->getDescuento() . "%";
        return $cadena;
    }
}

?>