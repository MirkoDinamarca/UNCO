<?php

include_once "BaseDatos.php";

class Pasajero {
    // Atributos
    private $rdocumento;
    private $pnombre;
    private $papellido;
    private $ptelefono;
    private $objViaje; // Referencia al objeto Viaje
    private $msjOperacion;

    // Método __construct
    public function __construct()
    {
        $this->rdocumento = "";
        $this->pnombre = "";
        $this->papellido = "";
        $this->ptelefono = "";
    }

    /**
     * Método encargado de cargar los datos del pasajero a la BD
     */
    public function cargarPasajero($rdocumento, $pnombre, $papellido, $ptelefono, $objViaje) {
        $this->setRdocumento($rdocumento);
        $this->setPnombre($pnombre);
        $this->setPapellido($papellido);
        $this->setPtelefono($ptelefono);
        $this->setObjViaje($objViaje);
    }

    // Métodos de Acceso

    public function getRdocumento(){
        return $this->rdocumento;
    }
    public function setRdocumento($rdocumento){
        $this->rdocumento = $rdocumento;
    }

    public function getPnombre(){
        return $this->pnombre;
    }
    public function setPnombre($pnombre){
        $this->pnombre = $pnombre;
    }
    
    public function getPapellido(){
        return $this->papellido;
    }
    public function setPapellido($papellido){
        $this->papellido = $papellido;
    }

    public function getPtelefono(){
        return $this->ptelefono;
    }
    public function setPtelefono($ptelefono){
        $this->ptelefono = $ptelefono;
    }

    public function getObjViaje(){
        return $this->objViaje;
    }
    public function setObjViaje($objViaje){
        $this->objViaje = $objViaje;
    }

    public function getMsjOperacion(){
        return $this->msjOperacion;
    }
    public function setMsjOperacion($msjOperacion){
        $this->msjOperacion = $msjOperacion;
    }

    /**
     * Inserta un pasajero a la BD
     */

    public function Insertar() {
        $bd = new BaseDatos();
        $rta = false;
        $query = "INSERT INTO pasajero(rdocumento, pnombre, papellido, ptelefono, idviaje)
                  VALUES (".$this->getRdocumento().",'".$this->getPnombre()."','".$this->getPapellido()."','".$this->getPtelefono()."','".$this->getObjViaje()->getIdviaje()."')";
        
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
     * Método para modificar un pasajero de la BD
     */

    public function Modificar() {
        $bd = new BaseDatos();
        $rta = false;
        $query = "UPDATE pasajero SET rdocumento='".$this->getRdocumento()."',pnombre='".$this->getPnombre()."',papellido='".$this->getPapellido()."'
                 ,ptelefono='".$this->getPtelefono()."',idviaje='".$this->getObjViaje()->getIdviaje()."' WHERE rdocumento=". $this->getRdocumento();

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
     * Método para eliminar el pasajero de la BD
     */

    public function Eliminar() {
        $bd = new BaseDatos();
        $rta = false;

        $query = "DELETE FROM pasajero WHERE rdocumento=".$this->getRdocumento();

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
     * Método para listar los pasajeros perteneciente a un viaje
     */
    public function Listar($condicion=""){
	    $arregloPasajero = null;
		$bd = new BaseDatos();
		$query="SELECT * FROM pasajero ";
		if ($condicion!=""){
		    $query = $query.' WHERE '.$condicion;
		}
		$query.=" ORDER BY rdocumento ";
        
		if($bd->Iniciar()){
			if($bd->Ejecutar($query)){				
				$arregloPasajero= [];
				while($fila = $bd->Registro()){
                    $objPasajero = new Pasajero();
                    $objPasajero->Buscar($fila["rdocumento"]);
					// $rdocumento = $fila['rdocumento'];
					// $pnombre = $fila['pnombre'];
					// $papellido = $fila['papellido'];
					// $ptelefono = $fila['ptelefono'];
					// $idviaje = $fila['idviaje'];
				
					// $pasajero = new Pasajero();
					// $pasajero->cargarPasajero($rdocumento, $pnombre, $papellido, $ptelefono, $idviaje);
					$arregloPasajero[] = $objPasajero;
				}
			
		 	}	else {
                $this->setMsjOperacion($bd->getError());
		 		
			}
		 }	else {
            $this->setMsjOperacion($bd->getError());
		 	
		 }	
		 return $arregloPasajero;
	}

    /**
     * Busca un pasajero por su DNI
     */

    public function Buscar($nroDoc) {
        $bd = new BaseDatos();
        $query = "SELECT * FROM pasajero WHERE rdocumento=" . $nroDoc;
        $rta = false;
        
        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                if ($fila = $bd->Registro()) {
                    $objViaje = new Viaje();
                    $objViaje->Buscar($fila['idviaje']);

                    $this->setRdocumento($nroDoc);
                    $this->setPnombre($fila["pnombre"]);
                    $this->setPapellido($fila["papellido"]);
                    $this->setPtelefono($fila["ptelefono"]);
                    $this->setObjViaje($objViaje);
                    $rta = true;
                }
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }
        return $rta;
    }

    public function __toString()
    {
        return  "\n=====================\n" .
                "Nombre y apellido: " . $this->getPnombre() . " " . $this->getPapellido() . "\n" .
                "DNI: " . $this->getRdocumento() . "\n" .
                "Teléfono: " . $this->getPtelefono() . "\n" .
                "N°Viaje: " . $this->getObjViaje()->getIdviaje();
    }

}