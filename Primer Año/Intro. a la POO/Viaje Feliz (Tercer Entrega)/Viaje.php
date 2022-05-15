<?php

/*

(Primer Entrega)
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha 
clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. 
Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar 
la información del viaje, modificar y ver sus datos.

(Segunda Entrega)
- Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, 
numero de documento y teléfono. 
- El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. 
- También se desea guardar la información de la persona responsable de realizar el viaje, 
para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido.  
- La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
- Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. 
- Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. 
- Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. 
- De la misma forma cargue la información del responsable del viaje. 

(Tercer Entrega)
La empresa de transporte desea gestionar la información correspondiente a los Viajes que pueden ser: Terrestres o Aéreos, 
guardar su importe e indicar si el viaje es de ida y vuelta. // TODO | Listo

De los viajes aéreos se conoce el número del vuelo, la categoría del asiento (primera clase o no), 
nombre de la aerolínea, y la cantidad de escalas del vuelo en caso de tenerlas.  // TODO | Listo

De los viajes terrestres se conoce la comodidad del asiento, si es semicama o cama. // TODO | Listo

La empresa ahora necesita implementar la venta de un pasaje, para ello debe realizar la función venderPasaje(pasajero) 
que registra la venta de un viaje al pasajero que es recibido por parámetro. La venta se realiza solo si hayPasajesDisponible. 
Si el viaje es terrestre y el asiento es cama, se incrementa el importe un 25%. // TODO | Listo
Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%, // TODO | Listo
si el viaje además de ser un asiento de primera clase, el vuelo tiene escalas se incrementa el importe del viaje un 60%. // TODO | Listo
Tanto para viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%.  // TODO | Listo

El método retorna el importe del pasaje si se pudo realizar la venta.

Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es 
menor a la cantidad máxima de pasajeros y falso caso contrario. // TODO | Listo
*/

class Viaje {

    // Atributos
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $empleadoResponsable;
    private $pasajeros = [];
    private $importe;
    private $viajeIda; // Si es de Ida
    private $viajeVuelta; // Si es de Vuelta

    // Método __construct
    public function __construct($codigo, $destino, $cantMaxPasajeros, $importe, $viajeIda, $viajeVuelta)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->importe = $importe;
        $this->viajeIda = $viajeIda;
        $this->viajeVuelta = $viajeVuelta;
    }

    // Métodos de acceso
    public function getCodigo() {
        return $this->codigo;
    }
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDestino() {
        return $this->destino;
    }
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($maxPasajeros) {
        $this->cantMaxPasajeros = $maxPasajeros;
    }

    public function getEmpleadoResponsable(){
        return $this->empleadoResponsable;
    }
    public function setEmpleadoResponsable($empleadoResponsable){
        $this->empleadoResponsable = $empleadoResponsable;
    }

    public function getPasajeros() {
        return $this->pasajeros;
    }
    public function setPasajeros($pasajero) {
        $this->pasajeros = $pasajero;
    }

    public function getImporte() {
        return $this->importe;
    }
    public function setImporte($importe) {
        return $this->importe = $importe;
    }

    public function getViajeIda() {
        return $this->viajeIda;
    }
    public function setViajeIda($viajeIda) {
        return $this->viajeIda = $viajeIda;
    }

    public function getViajeVuelta() {
        return $this->viajeVuelta;
    }
    public function setViajeVuelta($viajeVuelta) {
        return $this->viajeVuelta = $viajeVuelta;
    }

    /**
     * Método para agregar a pasajero
     * @param array $pasajero
     */

    public function agregarPasajeros($pasajero) {
        $arrayPasajeros = $this->getPasajeros();
        array_push($arrayPasajeros, $pasajero);
        $this->setPasajeros($arrayPasajeros);
    }

    /**
     * Método para modificar el pasajero
     * @param int $indice
     * @param string $change
     * @param int $key
     */

    public function modificarPasajero($indice, $change, $numero) {

        $arrayPasajeros = $this->getPasajeros();
    
        switch ($numero) {
            case 1:
                $arrayPasajeros[$indice]->setNombre($change);
                $this->setPasajeros($arrayPasajeros);
                break;
            case 2:
                $arrayPasajeros[$indice]->setApellido($change);
                $this->setPasajeros($arrayPasajeros);
                break;
            case 3:
                $arrayPasajeros[$indice]->setDni($change);
                $this->setPasajeros($arrayPasajeros);
                break;
            case 4:
                $arrayPasajeros[$indice]->setTelefono($change);
                $this->setPasajeros($arrayPasajeros);
                break;
        }
    }

    /**
     * Método para verificar que el DNI no es el mismo
     * 
     */

    public function verificarDni($dni) {
        $valido = false;

        foreach($this->getPasajeros() as $key => $pasajero) {
            if ($pasajero->getDni() == $dni) {
                $valido = true;
                break;
            } else {
                $valido = false;
            }
        }
        return $valido;
    }

    /**
     * Método eliminar pasajero
     * @param int $numero
     */

    public function eliminarPasajero($numero) {
        $arrayPasajeros = $this->getPasajeros();
        $pasajeroEliminar = $this->getPasajeros()[$numero];

        if (in_array($pasajeroEliminar, $arrayPasajeros)) {
            array_splice($arrayPasajeros, $numero, 1);
            $this->setPasajeros($arrayPasajeros);
        }
    }

    /**
     * Método modificar responsable del viaje
     * 
     */

    public function modificarResponsable($numero, $change) {
        $empleadoResponsable = $this->getEmpleadoResponsable();

        switch ($numero) {
            case 1:
                $empleadoResponsable->setNombre($change);
                $this->setEmpleadoResponsable($empleadoResponsable);
                break;
            case 2:
                $empleadoResponsable->setApellido($change);
                $this->setEmpleadoResponsable($empleadoResponsable);
                break;
            case 3:
                $empleadoResponsable->setNumLicencia($change);
                $this->setEmpleadoResponsable($empleadoResponsable);
                break;
            case 4:
                $empleadoResponsable->setNumEmpleado($change);
                $this->setEmpleadoResponsable($empleadoResponsable);
                break;
        }
    }

    /**
     * Retorna verdadero si la cantidad de pasajeros del viaje es 
     * menor a la cantidad máxima de pasajeros y falso caso contrario.
     */
    // TODO | Funciona
    public function hayPasajesDisponible() {
        $validacion = false;
        if (count($this->getPasajeros()) <= $this->getCantMaxPasajeros()) {
            $validacion = true;
        }
        return $validacion;
    }

    /**
     * Vender pasaje a un pasajero que se le pasa por parámetro
     */
    // TODO | Funciona
    public function venderPasaje($pasajero) {

        if ($this->hayPasajesDisponible()) {
            if ($this->getViajeIda() == "ida" && $this->getViajeVuelta() == "vuelta") {
                $nuevoImporte = $this->getImporte() * 1.50;
                $this->setImporte($nuevoImporte);
                $this->agregarPasajeros($pasajero); // ? ESTO ESTÁ BIEN?
            } else {
                $nuevoImporte = $this->getImporte();
                $this->agregarPasajeros($pasajero); // ? ESTO ESTÁ BIEN?
            }

            return $nuevoImporte;
        } 
    }

    /**
     * Método mostrar pasajeros
     */

    public function stringPasajeros() {
        $stringPasajeros = "";

        foreach ($this->getPasajeros() as $key => $pasajero) {
            $stringPasajeros .= $pasajero;
        }
        return $stringPasajeros;
    }

    /**
     * Método para mostrar al Empleado
     */

    public function stringEmpleado() {
        $stringEmpleado = "";
        $stringEmpleado .= $this->getEmpleadoResponsable();
        return $stringEmpleado;
    }

    // Método __toString()
    public function __toString()
    {
        return  $this->stringEmpleado() . "\n" .
                "----------------------------\n" .
                "El código del viaje es: " . $this->getCodigo() . "\n" .
                "El destino del viaje es: " . $this->getDestino() . "\n" .
                "La capacidad máxima de pasajeros es: " . $this->getCantMaxPasajeros() . "\n" .
                "Los pasajeros son los siguientes: " . $this->stringPasajeros();
    }

    
}

?>