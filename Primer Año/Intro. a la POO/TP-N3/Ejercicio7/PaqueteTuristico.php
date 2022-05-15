<?php

class PaqueteTuristico {
    private $fecha;
    private $cantDias;
    private $destino;
    private $cantPlazas;

    // $cantDisponiblePlazas debe ser un valor que se setea con el valor 
    // recibido para la cantidad total de plazas del
    // paquete.
    private $cantDisponiblePlazas;

    public function __construct($fecha, $cantDias, $destino, $cantPlazas)
    {
        $this->fecha = $fecha;
        $this->cantDias = $cantDias;
        $this->destino = $destino;
        $this->cantPlazas = $cantPlazas;
    }
}




?>