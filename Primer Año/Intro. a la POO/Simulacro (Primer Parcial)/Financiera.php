<?php

class Financiera {
    private $denominacion;
    private $direccion;
    private $coleccionPrestamos = [];

    public function __construct($denominacion, $direccion)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
    }

    public function getDenominacion()
    {
        return $this->denominacion;
    } 
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getColeccionPrestamos()
    {
        return $this->coleccionPrestamos;
    }
    public function setColeccionPrestamos($coleccionPrestamos)
    {
        $this->coleccionPrestamos = $coleccionPrestamos;
    }

    /**
     * Método incorporarPrestamo($newPrestamo)
     */

    public function incorporarPrestamo($newPrestamo) {
        $coleccionPrestamos = $this->getColeccionPrestamos();
        array_push($coleccionPrestamos, $newPrestamo);

        $this->setColeccionPrestamos($coleccionPrestamos);
    }

     /**
     * Método otorgarPrestamoSiCalifica()
     */

    public function otorgarPrestamoSiCalifica() {
        foreach ($this->getColeccionPrestamos() as $key => $prestamo) {
            $netoPersona = $prestamo->getPersona()->getNeto() * 0.40;

            if ( !(($prestamo->getMonto() / count($prestamo->getCant_cuotas()) ) > $netoPersona) ) {
                $prestamo->otorgarPrestamo();
            }
        }
    }
     /**
     * Método informarCuotaPagar($idPrestamo)
     * @param string $idPrestamo
     */

    public function informarCuotaPagar($idPrestamo) {
        // $prestamoId = $this->getColeccionPrestamos()[$idPrestamo];

        foreach ($this->getColeccionPrestamos() as $key => $prestamo) {

            $prestamoId = "";

            if ($prestamo->getIdentificacion() == $idPrestamo) {
                $prestamoId = $prestamo->darSiguienteCuotaPagar();
                break;
            } else {
                $prestamoId = null;
            }
        }  
        return $prestamoId;
    }

    /**
     * Método para recorrer la colección de prestamos
     */

    public function stringPrestamos() {
        $stringPrestamos = "";

        foreach ($this->getColeccionPrestamos() as $key => $prestamo) {
            $stringPrestamos .= $prestamo;
        }
        return $stringPrestamos;
    }

    public function __toString()
    {
        return  "*****************\n" .
                "Denominación: " . $this->getDenominacion() . "\n" .
                "Dirección: " . $this->getDireccion() . "\n" .
                "Prestamos:\n" . $this->stringPrestamos();
    }
}














?>