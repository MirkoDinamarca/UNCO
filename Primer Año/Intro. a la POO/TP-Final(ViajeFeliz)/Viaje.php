<?php

class Viaje {

    // Atributos
    private $idviaje;
    private $vdestino;
    private $vcantMaxPasajeros;
    private $objEmpresa; // Referencia al objeto Empresa
    private $objResponsable; // Referencia al objeto Responsable
    private $vimporte;
    private $tipoAsiento;
    private $idayvuelta;
    private $pasajeros;
    private $msjOperacion;

    // Método __construct
    public function __construct()
    {
        $this->idviaje = "";
        $this->vdestino = "";
        $this->vcantMaxPasajeros = "";
        $this->rdocumento = "";
        $this->vimporte = "";
        $this->tipoAsiento = "";
        $this->idayvuelta = "";
        $this->pasajeros = [];
    }

    /**
     * Método encargado de cargar los datos del viaje a la BD
     */
    public function cargarViaje($idviaje, $vdestino, $vcantMaxPasajeros, $objEmpresa, $objResponsable, $vimporte, $tipoAsiento, $idayvuelta) {
        $this->setIdviaje($idviaje);
        $this->setVdestino($vdestino);
        $this->setVcantMaxPasajeros($vcantMaxPasajeros);
        $this->setObjEmpresa($objEmpresa);
        $this->setObjResponsable($objResponsable);
        $this->setVimporte($vimporte);
        $this->setTipoAsiento($tipoAsiento);
        $this->setIdayvuelta($idayvuelta);
    }

    // Métodos de acceso
    public function getIdviaje(){
        return $this->idviaje;
    }
    public function setIdviaje($idviaje){
        $this->idviaje = $idviaje;
    }

    public function getVdestino(){
        return $this->vdestino;
    }
    public function setVdestino($vdestino){
        $this->vdestino = $vdestino;
    }

    public function getVcantMaxPasajeros(){
        return $this->vcantMaxPasajeros;
    }
    public function setVcantMaxPasajeros($vcantMaxPasajeros){
        $this->vcantMaxPasajeros = $vcantMaxPasajeros;
    }

    public function getObjEmpresa(){
        return $this->objEmpresa;
    }
    public function setObjEmpresa($objEmpresa){
        $this->objEmpresa = $objEmpresa;
    }

    public function getObjResponsable(){
        return $this->objResponsable;
    }
    public function setObjResponsable($objResponsable){
        $this->objResponsable = $objResponsable;
    }

    public function getVimporte(){
        return $this->vimporte;
    }
    public function setVimporte($vimporte){
        $this->vimporte = $vimporte;
    }

    public function getTipoAsiento(){
        return $this->tipoAsiento;
    }
    public function setTipoAsiento($tipoAsiento){
        $this->tipoAsiento = $tipoAsiento;
    }

    public function getIdayvuelta(){
        return $this->idayvuelta;
    }
    public function setIdayvuelta($idayvuelta){
        $this->idayvuelta = $idayvuelta;
    }

    public function getPasajeros(){
        return $this->pasajeros;
    }
    public function setPasajeros($pasajeros){
        $this->pasajeros = $pasajeros;
    }

    public function getMsjOperacion(){
        return $this->msjOperacion;
    }
    public function setMsjOperacion($msjOperacion){
        $this->msjOperacion = $msjOperacion;
    }

     /**
     * Inserta un viaje a la BD
     */

    public function Insertar() {
        $bd = new BaseDatos();
        $rta = false;
        $query = "INSERT INTO viaje(vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte, tipoAsiento, idayvuelta)
                  VALUES ('".$this->getVdestino()."','".$this->getVcantMaxPasajeros()."','".$this->getObjEmpresa()->getIdempresa()."',
                  '".$this->getObjResponsable()->getRnumeroempleado()."','".$this->getVimporte()."','".$this->getTipoAsiento()."','".$this->getIdayvuelta()."')";
        
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
     * Método para modificar un viaje de la BD
     */

    public function Modificar() {
        $bd = new BaseDatos();
        $rta = false;
        $query = "UPDATE viaje SET vdestino='".$this->getVdestino()."',vcantmaxpasajeros='".$this->getVcantMaxPasajeros()."',
                 idempresa='".$this->getObjEmpresa()->getIdempresa()."',rnumeroempleado='".$this->getObjResponsable()->getRnumeroempleado()."',vimporte='".$this->getVimporte()."',
                 tipoAsiento='".$this->getTipoAsiento()."',idayvuelta='".$this->getIdayvuelta()."' WHERE idviaje=". $this->getIdviaje();

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
     * Método para eliminar un viaje de la BD
     */

    public function Eliminar() {
        $bd = new BaseDatos();
        $rta = false;

        $query = "DELETE FROM viaje WHERE idviaje=".$this->getIdviaje();

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
     * Método para listar los viajes
     */
    public function Listar($condicion=""){
	    $arregloViaje = null;
		$bd = new BaseDatos();
		$query="SELECT * FROM viaje ";
		if ($condicion!=""){
		    $query = $query.' WHERE '.$condicion;
		}
		$query.=" ORDER BY idviaje ";
        
		if($bd->Iniciar()){
			if($bd->Ejecutar($query)){				
				$arregloViaje= [];
				while($fila = $bd->Registro()){
					
                    $objViaje = new Viaje();
                    $objViaje->Buscar($fila["idviaje"]);
                    $arregloViaje[] = $objViaje;
					// $idviaje = $fila['idviaje'];
					// $vdestino = $fila['vdestino'];
					// $vcantMaxPasajeros = $fila['vcantmaxpasajeros'];
					// $idempresa = $fila['idempresa'];
					// $rnumeroresponsable = $fila['rnumeroempleado'];
					// $vimporte = $fila['vimporte'];
					// $tipoAsiento = $fila['tipoAsiento'];
					// $idayvuelta = $fila['idayvuelta'];
				
					// $viaje = new Viaje();
					// $viaje->cargarViaje($idviaje, $vdestino, $vcantMaxPasajeros, $idempresa, $rnumeroresponsable, $vimporte, $tipoAsiento, $idayvuelta);
					// $arregloViaje[] = $viaje;
				}
		 	}	else {
                $this->setMsjOperacion($bd->getError());
			}
		 }	else {
            $this->setMsjOperacion($bd->getError());
		 	
		 }	
		 return $arregloViaje;
	}

    /**
	 * Recupera los datos de un viaje por destino
	 * @param int $id
	 */		
    public function Buscar($idviaje){
		$bd = new BaseDatos();

		$query="SELECT * FROM viaje WHERE idviaje =" . $idviaje;

		$rta= false;

		if($bd->Iniciar()){
			if($bd->Ejecutar($query)){
				if($fila = $bd->Registro()){
                    $objResponsable = new Responsable();					
                    $objEmpresa = new Empresa();
                    
                    $objResponsable->Buscar($fila['rnumeroempleado']);
                    $objEmpresa->Buscar($fila['idempresa']);

				    $this->setIdviaje($idviaje);
					$this->setVdestino($fila["vdestino"]);
					$this->setVcantMaxPasajeros($fila['vcantmaxpasajeros']);
					$this->setObjEmpresa($objEmpresa);
					$this->setObjResponsable($objResponsable);
					$this->setVimporte($fila['vimporte']);
					$this->setTipoAsiento($fila['tipoAsiento']);
					$this->setIdayvuelta($fila['idayvuelta']);
					$rta= true;
				}				
			
		 	}	else {
		 			$this->setMsjOperacion($bd->getError());
		 		
			}
		 }	else {
		 		$this->setMsjOperacion($bd->getError());
		 	
		 }		
		 return $rta;
	}

    /**
     * Verifica si la cantidad de pasajeros actual no exceden la cantidad máxima permitida
     */

    public function pasajeDisponible() {
        $bd = new BaseDatos();
        $obj_pasajero = new Pasajero();

        $rta = false;
        if ($bd->Iniciar()) {
            $pasajeros = $obj_pasajero->Listar("idviaje =" . $this->getIdviaje());

            if (is_array($pasajeros)) {
                $this->setPasajeros($pasajeros);
    
                if (count($this->getPasajeros()) < $this->getVcantMaxPasajeros()) {
                    $rta = true;
                } else {
                    $this->setMsjOperacion($bd->getError());
                }
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }
        
        return $rta;
    }


    // Método __toString()
    public function __toString()
    {
           return "-------------------------------------------------------" . "\n" .
                  "Viaje N°ID: " . $this->getIdviaje() . "\n" .
                  "Destino: " . $this->getVdestino() . "\n" .
                  "La capacidad máxima de pasajeros es: " . $this->getVcantMaxPasajeros() . "\n" .
                  "== Empresa == \n" . $this->getObjEmpresa() . "\n" .
                  "------" . "\n" .
                  "== Responsable == \n" . $this->getObjResponsable() . "\n" .
                  "------" . "\n" .
                  "Importe: $" . $this->getVimporte() . "\n" .
                  "Tipo de asiento: " . $this->getTipoAsiento() . "\n" .
                  "Tipo de vuelo: " . $this->getIdayvuelta() . "\n";
    }



    


}

?> 