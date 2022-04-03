<?php

class Disquera {
    // Atributos
    private $hora_desde;
    private $hora_hasta;

    private $estado = [
        "abierta" => false,
        "cerrada" => false
    ];

    private $direccion;
    private $duenio;

    /* El DUEÑO debe hacer referencia a la clase PERSONA */

    // (a) Método Constructor
    public function __construct($hora_desde, $hora_hasta, $direccion)
    {
        $this->hora_desde = $hora_desde;
        $this->hora_hasta = $hora_hasta;

        // $this->estado = $estado;
        $this->direccion = $direccion;
    }

    // (b) Métodos de Acceso
    public function getHoraDesde() {
        return $this->hora_desde;
    }
    public function setHoraDesde($newHour) {
        $this->hora_desde = $newHour;
    }

    public function getHoraHasta() {
        return $this->hora_hasta;
    }
    public function setHoraHasta($newHour) {
        $this->hora_hasta = $newHour;
    }

    public function getEstadoAbierta() {
        return $this->estado["abierta"];
    }
    public function setEstadoAbierta($newEstado) {
        $this->estado["abierta"] = $newEstado;
    }

    public function getEstadoCerrada() {
        return $this->estado["cerrada"];
    }
    public function setEstadoCerrada($newEstado) {
        $this->estado["cerrada"] = $newEstado;
    }


    public function getDireccion() {
        return $this->direccion;
    }
    public function setDireccion($newDireccion) {
        return $this->direccion = $newDireccion;
    }

    public function getDuenio() {
        return $this->duenio;
    }
    public function setDuenio($newDuenio) {
        return $this->duenio = $newDuenio;
    }

    /**
     * (c) Método dentroHorarioAtencion($hora, $minutos)
     * @param int $hora
     * @param int $minutos
     * @return boolean
     */

    public function dentroHorarioAtencion($hora, $minutos) {
        if ($hora <= 9 && $minutos >= 30) {
            $horario = true;
        } else {
            $horario = false;
        }
        return $horario;
    }

    /**
     * (d) Método abrirDisquera($hora, $minutos)
     * @param int $hora
     * @param int $minutos
     */

    public function abrirDisquera($hora, $minutos) {
        if ($hora >= 9 && $minutos >= 30) {
            $this->setEstadoAbierta(true);
            $this->setEstadoCerrada(false);
        }
    }

    /**
     * (e) Método cerrarDisquera($hora, $minutos)
     * @param int $hora
     * @param int $minutos
     */

    public function cerrarDisquera($hora, $minutos) {
        if ($hora >= 20 && $minutos >= 30) {
            $this->setEstadoAbierta(false);
            $this->setEstadoCerrada(true);
        }
    }

    // (f) Método __toString
    public function __toString()
    {
        return "La tienda está abierta a las " . $this->getHoraDesde() . "hs" . "\n" . 
                "Y cierra a las " . $this->getHoraHasta() . "hs" . "\n" .
                "Direccion: " . $this->getDireccion() . " | Dueño: " . $this->getDuenio();
    }
}