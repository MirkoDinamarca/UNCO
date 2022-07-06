<?php 

class Cliente {
    private $nombre;
    private $apellido;
    private $tipoDoc;
    private $nroDoc;

    public function __construct($nombre, $apellido, $tipoDni, $nroDoc)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDni = $tipoDni;
        $this->nroDoc = $nroDoc;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getTipoDoc(){
        return $this->tipoDoc;
    }
    public function setTipoDoc($tipoDoc){
        $this->tipoDoc = $tipoDoc;
    }

    public function getNroDoc(){
        return $this->nroDoc;
    }
    public function setNroDoc($nroDoc){
        $this->nroDoc = $nroDoc;
    }

    public function __toString()
    {
        return  "Nombre: " . $this->getNombre() . "\n" .
                "Apellido: " . $this->getApellido() . "\n" .
                "Tipo DOC: " . $this->getTipoDoc() . "\n" .
                "N° DOC: " . $this->getNroDoc();
    }
}

?>