<?php

include_once "BaseDatos.php";

class Responsable {
    private $rnumeroempleado;
    private $rnumerolicencia;
    private $rnombre;
    private $rapellido;
    private $msjOperacion;

    // Método __construct
    public function __construct()
    {
        $this->rnumeroempleado = "";
        $this->rnumerolicencia = "";
        $this->rnombre = "";
        $this->rapellido = "";
    }

    /**
     * Método encargado de cargar los datos del responsable a la BD
     */
    public function cargarResponsable($rnumeroempleado, $rnumerolicencia, $rnombre, $rapellido) {
        $this->setRnumeroempleado($rnumeroempleado);
        $this->setRnumerolicencia($rnumerolicencia);
        $this->setRnombre($rnombre);
        $this->setRapellido($rapellido);
    }

    // Métodos GET y SET
    public function getRnumeroempleado(){
        return $this->rnumeroempleado;
    }
    public function setRnumeroempleado($rnumeroempleado){
        $this->rnumeroempleado = $rnumeroempleado;
    }

    public function getRnumerolicencia(){
        return $this->rnumerolicencia;
    }
    public function setRnumerolicencia($rnumerolicencia){
        $this->rnumerolicencia = $rnumerolicencia;
    }

    public function getRnombre(){
        return $this->rnombre;
    }
    public function setRnombre($rnombre){
        $this->rnombre = $rnombre;
    }

    public function getRapellido(){
        return $this->rapellido;
    }
    public function setRapellido($rapellido){
        $this->rapellido = $rapellido;
    }

    public function getMsjOperacion(){
        return $this->msjOperacion;
    }
    public function setMsjOperacion($msjOperacion){
        $this->msjOperacion = $msjOperacion;
    }

    /**
     * Inserta un responsable a la BD
     */

    public function Insertar() {
        $bd = new BaseDatos();
        $rta = false;
        $query = "INSERT INTO responsable(rnumerolicencia, rnombre, rapellido)
                  VALUES ('".$this->getRnumerolicencia()."','".$this->getRnombre()."','".$this->getRapellido()."')";
        
        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                $rta = true;
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }

        return $rta;

    }

    /**
     * Método para modificar un responsable de la BD
     */

    public function Modificar() {
        $bd = new BaseDatos();
        $rta = false;
        $query = "UPDATE responsable SET rnumeroempleado='".$this->getRnumeroempleado()."',rnumerolicencia='".$this->getRnumerolicencia()."',rnombre='".$this->getRnombre()."'
                 ,rapellido='".$this->getRapellido()."' WHERE rnumeroempleado=". $this->getRnumeroempleado();

        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                $rta = true;
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }

        return $rta;
    }

    /**
     * Método para eliminar el responsable de la BD
     */

    public function Eliminar() {
        $bd = new BaseDatos();
        $rta = false;

        $query = "DELETE FROM responsable WHERE rnumerolicencia=".$this->getRnumerolicencia();

        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                $rta = true;
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }

        return $rta;
    }

    /**
     * Método para buscar un registro a partir de su rnumerolicencia
     */

    public function Buscar($nroEmpleado) {
        $bd = new BaseDatos();
        $rta = false;
        $query = "SELECT * FROM responsable WHERE rnumeroempleado=".$nroEmpleado;

        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                if ($registro = $bd->Registro()) {
                    $this->setRnumeroempleado($nroEmpleado);
                    $this->setRnumerolicencia($registro["rnumerolicencia"]);
                    $this->setRnombre($registro["rnombre"]);
                    $this->setRapellido($registro["rapellido"]);
                    $rta = true;
                }
            } else {
                $this->setMsjOperacion($bd->getError());
            }
            $this->setMsjOperacion($bd->getError());
        }
        
        return $rta;
    }

        /**
     * Método para listar las personas responsables de viajes
     */
    public function Listar($condicion=""){
	    $arregloResponsables = null;
		$bd = new BaseDatos();
		$query="SELECT * FROM responsable ";
		if ($condicion!=""){
		    $query = $query.' WHERE '.$condicion;
		}
		$query.=" ORDER BY rnumeroempleado ";
        
		if($bd->Iniciar()){
			if($bd->Ejecutar($query)){				
				$arregloResponsables= [];
				while($fila = $bd->Registro()){
					
					$rnumeroempleado = $fila['rnumeroempleado'];
					$rnumerolicencia = $fila['rnumerolicencia'];
					$rnombre = $fila['rnombre'];
					$rapellido = $fila['rapellido'];
				
					$responsable = new Responsable();
					$responsable->cargarResponsable($rnumeroempleado, $rnumerolicencia, $rnombre, $rapellido);
					$arregloResponsables[] = $responsable;
				}	
		 	}	else {
                $this->setMsjOperacion($bd->getError());
		 		
			}
		 }	else {
            $this->setMsjOperacion($bd->getError());
		 	
		 }	
		 return $arregloResponsables;
	}

    public function __toString()
    {
        return  "Nombre y Apellido: " . $this->getRnombre() . " " . $this->getRapellido() . "\n" .
                "N° ID: " . $this->getRnumeroempleado() . "\n" .
                "N° Licencia: " . $this->getRnumerolicencia();
    }
    




    
}








?> 