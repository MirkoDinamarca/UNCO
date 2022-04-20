<?php

class Mostrador {
    private $tipoTramite;
    private $filaClientes;
    private $tramites = [];

    public function __construct($tipoTramite, $filaClientes, /*$tramite*/)
    {
        $this->tipoTramite = $tipoTramite;
        $this->filaClientes = $filaClientes;
        // $this->tramites = $tramite;
    }

    public function getTipoTramite(){
        return $this->tipoTramite;
    }
    public function setTipoTramite($tipoTramite){
        $this->tipoTramite = $tipoTramite;
    }

    public function getFilaClientes(){
        return $this->filaClientes;
    }
    public function setFilaClientes($filaClientes){
        $this->filaClientes = $filaClientes;
    }

    public function getTramites(){
        return $this->tramites;
    }
    public function setTramites($tramite){
        $this->tramites = $tramite;
    }

    /**
     * (d)
     */

    public function atiende($unTramite) {
        $boolean = true;
        if ($this->getTipoTramite() == $unTramite) {
            $boolean = true;
        } else {
            $boolean = false;
        }
        return $boolean;
    }

    public function __toString()
    {
        return "";
    }
}








?>