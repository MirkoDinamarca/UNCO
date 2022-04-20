<?php

class Teatro {
    // Atributos
    private $nombre_teatro;
    private $direccion_teatro;
    private $funciones; // TODO Varían en cantidad y horario (Array)

    public function __construct($nombre_teatro, $direccion_teatro)
    {
        $this->nombre_teatro = $nombre_teatro;
        $this->direccion_teatro = $direccion_teatro;
        $this->funciones = []; // ? Se permite crear los arreglos en los atributos?
    }

    // Métodos de Acceso

    private function getNombre_teatro() {
        return $this->nombre_teatro;
    }
    private function setNombre_teatro($nombre_teatro) {
        return $this->nombre_teatro = $nombre_teatro;
    }

    private function getDireccion_teatro() {
        return $this->direccion_teatro;
    }
    private function setDireccion_teatro($direccion_teatro) {
        return $this->direccion_teatro = $direccion_teatro;
    }

    public function getFunciones() {
        return $this->funciones;
    }
    public function setFunciones($funciones) {
        return $this->funciones = $funciones;
    }

    // Método para cambiar nombre y dirección del teatro
    public function cambiarTeatro($newName, $newDirection) {
        // ? Estaba bien antes | No lo solicita ahora? 
    }

    // Método para cambiar nombre y precio de la función
    public function cambiarFuncion($numFuncion, $newName, $newPrice) {
        $funciones = $this->getFunciones();

        foreach ($funciones as $key => $funcion) {
            if ($funcion->getNumFuncion() == $numFuncion) {
                $funcion->setNombre($newName);
                $funcion->setObra_precio($newPrice);

                $str = "Función Modificada Correctamente\n";
            } else {
                $str = "Error Inesperado\n";
            }
        }
        return $str;
    }

    /**
     * Método para crear funciones en un teatro
     * Crea una función y se registra en el teatro solo no se repite
     * en el mismo horario que otra
     * @param object $funcionParam
     * @param int $hora_inicio
     * @return boolean
     */

    public function crearFuncion($funcionParam, $hora_inicio) {
        $funciones = $this->getFunciones();
        $validacion = true;
        if (empty($funciones)) {

            $funciones[] = $funcionParam;
            $this->setFunciones($funciones);
            $str = "Función Creada Correctamente\n";

        } else if (!empty($funciones)) {

            foreach ($funciones as $key => $funcion) {
                if ($funcion->getHorario_inicio() != $hora_inicio) {
                    $funciones[] = $funcionParam;
                    $this->setFunciones($funciones);
                    $str = "Función Creada Correctamente\n";
                } else {
                    $str = "Error Inesperado\n";
                }
            }
        }
        return $str;
    }

    /**
     * Método stringFunciones()
     * Me recorre cada objeto función del arreglo de funciones para mostrarlo
     * en el __toString
     */

    public function stringFunciones() {
        $stringFunciones = "";

        foreach ($this->getFunciones() as $key => $funcion) {
            $stringFunciones .= $funcion;
        }
        return $stringFunciones;
    }

    public function __toString()
    {
        return $this->getNombre_teatro() . "\n" . 
                "Dirección: " . $this->getDireccion_teatro() . "\n" .
                "Funciones: \n" . $this->stringFunciones();
    }
}

