<?php

class Torneo {
    private $coleccionPartidos;
    private $premio;

    public function __construct($coleccionPartidos, $premio)
    {
        $this->coleccionPartidos = $coleccionPartidos;
        $this->premio = $premio;
    }

    public function getColeccionPartidos(){
        return $this->coleccionPartidos;
    }
    public function setColeccionPartidos($coleccionPartidos){
        $this->coleccionPartidos = $coleccionPartidos;
    }

    public function getPremio(){
        return $this->premio;
    }
    public function setPremio($premio){
        $this->premio = $premio;
    }

    /**
     * @param object $OBJEquipo1
     * @param object $OBJEquipo2
     * @param string $fecha
     * @param string $tipo
     * @return object
     */
    // TODO | Funciona
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipo) {
        $partidos = $this->getColeccionPartidos();
        $partido = "No se puede ingresar el partido ya que son diferentes categorías\n";
        if ($tipo == "basquetbol" && $OBJEquipo1->getCategoria()->getDescripcion() == $OBJEquipo2->getCategoria()->getDescripcion()) {
            $partido = new Basquet(1, $OBJEquipo1, $OBJEquipo2, $fecha, 0, 0, 0);
            $partidos[] = $partido;
            $this->setColeccionPartidos($partidos);
        } else if ($tipo == "futbol" && $OBJEquipo1->getCategoria()->getDescripcion() == $OBJEquipo2->getCategoria()->getDescripcion()) {
            $partido = new Futbol(1, $OBJEquipo1, $OBJEquipo2, $fecha, 0, 0);
            $partidos[] = $partido;
            $this->setColeccionPartidos($partidos);
        }

        return $partido;
    }

    /**
     * @param string $deporte
     * @return array
     */

    // TODO | Funciona
    public function darGanadores($deporte) {
        $equiposGanadores = [];

        foreach ($this->getColeccionPartidos() as $key => $partido) {

            if (is_a($partido, $deporte)) {
                $equiposGanadores[] = $partido->campeon();
            }
        }

        return $equiposGanadores;
    }

    /**
     * @param object $OBJPartido
     * @return array
     */
    // TODO | Probar si funciona
    public function calcularPremioPartido($OBJPartido) {
        if ($OBJPartido->getCantGolesE1() > $OBJPartido->getCantGolesE2()) {
            $equipoGanador = $OBJPartido->getPrimerEquipo();
            $coeficiente = $OBJPartido->coeficientePartido();
            $coeficiente = $coeficiente * $this->getPremio();
        } else {
            $equipoGanador = $OBJPartido->getSegundoEquipo();
            $coeficiente = $OBJPartido->coeficientePartido();
            $coeficiente = $coeficiente * $this->getPremio();
        }

        $equipoCampeon = [
            "equipoGanador" => $equipoGanador,
            "premioPartido" => $coeficiente
        ];

        return $equipoCampeon;
    }

    /**
     * Método para recorrer la colección de partidos y retornarlos
     */

    public function stringPartidos() {
        $str = "";

        foreach ($this->getColeccionPartidos() as $key => $partido) {
            $str .= $partido;
        }

        return $str;
    }


    public function __toString()
    {
        return  "Partidos: " . "\n" . 
                $this->stringPartidos() . "\n" . 
                "Premio: $" . $this->getPremio() . "\n";
    }
}

?>