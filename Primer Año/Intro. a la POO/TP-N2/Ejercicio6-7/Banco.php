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
     * @param string $unTramite
     * @return array
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

    /**
     * (f)
     * @param string $unTramite
     * @return array
     */

    public function mejorMostradorPara($unTramite) {
        $mostradoresQueAtiende = $this->mostradoresQueAtienden($unTramite);
        $mejorMostrador = [];
        $fila = 5;
        foreach ($mostradoresQueAtiende as $key => $mostrador) {
            
            if (count($mostrador->getFilaClientes()) < $fila) {
                if ($mostrador->getTipoTramite() == $unTramite) {
                    $fila = count($mostrador->getFilaClientes());
                    array_shift($mejorMostrador);
                    $mejorMostrador[] = $mostrador;
                }
            } 
        }
        return $mejorMostrador;
    }

    /**
     * (g)
     */

    public function atender($unTramite) {
        $mejorMostrador = $this->mejorMostradorPara($unTramite[1]);
        $filaClientes = $mejorMostrador[0]->getFilaClientes();
        // print_r($mejorMostrador);
        if (is_array($mejorMostrador)) {
            // TODO | Lo posiciona en la fila de trámites
            // print_r($mejorMostrador[0]->getFilaClientes());
            $filaClientes[] = $unTramite[0];
            $mejorMostrador[0]->setFilaClientes($filaClientes);
            // print_r($mejorMostrador[0]->getFilaClientes());
            $str = "Aguarde un momento, en instantes será atendido";
        } else {
            $str = "Será atendido en cuanto haya un lugar en el mostrador";
        }
        return $str;
    }

    public function __toString()
    {
        return "";
    }
}







?>