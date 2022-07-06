<?php 

class Canal {
    private $tipoCanal; // noticias, interes general, musical, deportivo
    private $importe;
    private $hd;

    public function __construct($tipoCanal, $importe, $hd)
    {
        $this->tipoCanal = $tipoCanal;
        $this->importe = $importe;
        $this->hd = $hd;
    }

    public function getTipoCanal(){
        return $this->tipoCanal;
    }
    public function setTipoCanal($tipoCanal){
        $this->tipoCanal = $tipoCanal;
    }

    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function getHd(){
        return $this->hd;
    }
    public function setHd($hd){
        $this->hd = $hd;
    }

    public function __toString()
    {
        return  "Tipo Canal: " . $this->getTipoCanal() . "\n" .
                "Importe: $" . $this->getImporte(). "\n" .
                "Es HD: " . $this->getHd(). "\n";
    }
}


?>