<?php

class Banco {
    private $mostradores = [];

    public function __construct($mostradores)
    {
        $this->mostradores = $mostradores;
    }

    public function getMostradores(){
        return $this->mostradores;
    }
    public function setMostradores($mostradores){
        $this->mostradores = $mostradores;
    }

    /**
     * (e)
     */

    public function mostradoresQueAtienden($unTramite) {
        $coleccionMostradores = [];
        foreach ($this->getMostradores() as $key => $mostrador) {
            if ($mostrador->getTipoTramite() == $unTramite) {
                $coleccionMostradores[] = $mostrador;
            }
        }
        return $coleccionMostradores;
    } 

    public function __toString()
    {
        return "";
    }
}







?>