<?php 

class Planes {
    private $codigo;
    private $canales; // Será una colección de canales
    private $importe; 
    private $incluyeMG = 50;

    public function __construct($codigo, $canales, $importe, $incluyeMG)
    {
        $this->codigo = $codigo;
        $this->canales = $canales;
        $this->importe = $importe;
        $this->incluyeMG = $incluyeMG;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getCanales(){
        return $this->canales;
    }
    public function setCanales($canales){
        $this->canales = $canales;
    }

    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function getIncluyeMG(){
        return $this->incluyeMG;
    }
    public function setIncluyeMG($incluyeMG){
        $this->incluyeMG = $incluyeMG;
    }

    public function __toString()
    {
        return  "Código: " . $this->getCodigo() . "\n" .
                "Canales: " . $this->getCanales(). "\n" .
                "Importe: $" . $this->getImporte(). "\n" .
                "MG: " . $this->getIncluyeMG();
    }
}

?>