<?php 

class Viaje {
    private $destino;
    private $horaPartida;
    private $horaLlegada;
    private $numero;
    private $importe;
    private $fecha;
    private $cantAsientosTotales;
    private $cantAsientosDisponibles;
    private $personaResponsable; // Referencia a Responsable

    public function __construct($destino, $horaPartida, $horaLlegada, $numero, $importe, $fecha, $cantAsientosTotales, $cantAsientosDisponibles, $personaResponsable)
    {
        $this->destino = $destino;
        $this->horaPartida = $horaPartida;
        $this->horaLlegada = $horaLlegada;
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->cantAsientosTotales = $cantAsientosTotales;
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
        $this->personaResponsable = $personaResponsable;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function getHoraPartida(){
        return $this->horaPartida;
    }
    public function setHoraPartida($horaPartida){
        $this->horaPartida = $horaPartida;
    }

    public function getHoraLlegada(){
        return $this->horaLlegada;
    }
    public function setHoraLlegada($horaLlegada){
        $this->horaLlegada = $horaLlegada;
    }

    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getCantAsientosTotales(){
        return $this->cantAsientosTotales;
    }
    public function setCantAsientosTotales($cantAsientosTotales){
        $this->cantAsientosTotales = $cantAsientosTotales;
    }

    public function getCantAsientosDisponibles(){
        return $this->cantAsientosDisponibles;
    }
    public function setCantAsientosDisponibles($cantAsientosDisponibles){
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
    }

    public function getPersonaResponsable(){
        return $this->personaResponsable;
    }
    public function setPersonaResponsable($personaResponsable){
        $this->personaResponsable = $personaResponsable;
    }

    /**
     * @return int
     */

    public function calcularImporteViaje() {

        $asientosVendidos = $this->getCantAsientosTotales() - $this->getCantAsientosDisponibles();

        $importe = $this->getImporte() + ($this->getImporte() * $asientosVendidos/$this->getCantAsientosTotales());
        return $importe;
    }

    public function __toString()
    {
        return  "Destino: " . $this->getDestino() . "\n" .
                "Hora Partida: " . $this->getHoraPartida() . "\n" .
                "Hora Llegada: " . $this->getHoraLlegada() . "\n" .
                "Numero: " . $this->getNumero() . "\n" .
                "Importe: $" . $this->getImporte() . "\n" .
                "Fecha: " . $this->getFecha() . "\n" .
                "Asientos totales: " . $this->getCantAsientosTotales() . "\n" .
                "Asientos disponibles: " . $this->getCantAsientosDisponibles() . "\n" .
                "Persona responsable: " . $this->getPersonaResponsable() . "\n";
    }
}

?>