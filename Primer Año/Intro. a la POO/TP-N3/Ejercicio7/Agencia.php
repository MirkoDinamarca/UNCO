<?php

class Agencia {
    private $coleccionPaquetes = [];
    private $ventasAgencia = [];
    private $ventasWebs = [];
    private $coleccionCliente = [];

    public function __construct($coleccionCliente)
    {
        $this->coleccionCliente = $coleccionCliente;
    }

    public function getColeccionPaquetes(){
        return $this->coleccionPaquetes;
    }
    public function setColeccionPaquetes($coleccionPaquetes){
        $this->coleccionPaquetes = $coleccionPaquetes;
    }

    public function getVentasAgencia(){
        return $this->ventasAgencia;
    }
    public function setVentasAgencia($ventasAgencia){
        $this->ventasAgencia = $ventasAgencia;
    }

    public function getVentasWebs(){
        return $this->ventasWebs;
    }
    public function setVentasWebs($ventasWebs){
        $this->ventasWebs = $ventasWebs;
    }

    public function getColeccionClientes(){
        return $this->coleccionCliente;
    }
    public function setColeccionClientes($coleccionCliente){
        $this->coleccionCliente = $coleccionCliente;
    }

    /**
     * @param object $objPaqueteTuristico
     */

     // TODO | Funciona
    public function incorporarPaquete($objPaqueteTuristico) {
        $validacion = true;
        $paquetes = $this->getColeccionPaquetes();
        $i = 0;
        while ($validacion == true && $i < count($paquetes)) {
            if ($paquetes[$i]->getFecha() == $objPaqueteTuristico->getFecha() && $paquetes[$i]->getDestino() == $objPaqueteTuristico->getDestino()) {
                $validacion = false;
            }
            $i++;
        }

        if ($validacion) {
            array_push($paquetes, $objPaqueteTuristico);
            $this->setColeccionPaquetes($paquetes);
        }
        return $validacion;
    }

    /**
     * 
     */
    // TODO | Funciona   
    public function incorporarVenta($objPaquete, $tipoDoc, $numDoc, $cantPer, $esOnLine) {
        $ventasAgencia = $this->getVentasAgencia();
        $ventasWebs = $this->getVentasWebs();
        $clientes = $this->getColeccionClientes();

        $importeFinal = false;
        $i = 0;

        while ($importeFinal == false && $i < count($clientes)) {
            if ($esOnLine && $clientes[$i]->getTipoDNI() == $tipoDoc && $clientes[$i]->getDni() == $numDoc) {

                $venta = new VentaWeb(date("d-m-Y"), $objPaquete, $cantPer, $tipoDoc, $numDoc);
                $importeFinal = $venta->darImporteVenta();
                array_push($ventasWebs, $venta);
                $this->setVentasWebs($ventasWebs);

            } else if ((!$esOnLine) && $clientes[$i]->getTipoDNI() == $tipoDoc && $clientes[$i]->getDni() == $numDoc) {

                $venta = new Ventas(date("d-m-Y"), $objPaquete, $cantPer, $tipoDoc, $numDoc);
                $importeFinal = $venta->darImporteVenta();
                array_push($ventasAgencia, $venta);
                $this->setVentasAgencia($ventasAgencia);
            }
            $i++;
        }

        return $importeFinal;
    }

    /**
     * Método que retorna una colección con todos los paquetes que se realizan en una fecha y a un destino.
     */
    // TODO | Funciona
    public function informarPaquetesTuristicos($fecha, $destino) {
        $paquetesTuristicos = [];
        foreach ($this->getColeccionPaquetes() as $key => $paquete) {
            if ($paquete->getFecha() == $fecha && $paquete->getDestino() == $destino) {
                $paquetesTuristicos[] = $paquete;
            }
        }
        return $paquetesTuristicos;
    }

    /**
     * Método que retorna el paquete turístico mas económico para una fecha y un destino.
     */
    // TODO | Funciona
    public function paqueteMasEconomico($fecha, $destino) {
        $precioEconomico = 99999;
        $paqueteEconomico = "";

        foreach ($this->getColeccionPaquetes() as $key => $paquete) {
            if ($paquete->getFecha() == $fecha && $paquete->getDestino() == $destino) {
                if ($paquete->getDestino()->getValorxPasajeroxDia() < $precioEconomico) {
                    $precioEconomico = $paquete->getDestino()->getValorxPasajeroxDia();
                    $paqueteEconomico = $paquete;
                }
            }
        }
        return $paqueteEconomico;
    }

    /**
     * Método que retorna todos los paquetes que fueron utilizados por la persona identificada 
     * con el tipoDoc y numDoc recibidos por parámetro.
     */
    // TODO | Funciona
    public function informarConsumoCliente($tipoDoc, $numDoc) {
        $paquetesUtilizados = [];

        foreach ($this->getVentasAgencia() as $key => $ventaAgencia) {
            if ($ventaAgencia->getTipoDocCliente() == $tipoDoc && $ventaAgencia->getTipoNumDoc() == $numDoc) {
                $paquetesUtilizados[] = $ventaAgencia;
            }
        }
        foreach ($this->getVentasWebs() as $key => $ventaWeb) {
            if ($ventaWeb->getTipoDocCliente() == $tipoDoc && $ventaWeb->getTipoNumDoc() == $numDoc) {
                $paquetesUtilizados[] = $ventaWeb;
            }
        }
        return $paquetesUtilizados;
    }

    /**
     * Retorna los n paquetes turísticos mas vendido en el año recibido por parámetro.
     */
    // TODO | Probar si funciona PROBLEMAS
    public function informarPaquetesMasVendido($anio, $n) {
        $paquetes = $this->getColeccionPaquetes();
        $paquetesTuristicos = [];

        for ($i=0; $i < count($paquetes); $i++) { 
            $fecha = $paquetes[$i]->getFecha();
            $dato = explode("/", $fecha);
            $fe = $dato[$n];

            $paquete = $paquetes[$i];

            if ($fe == $anio) {
                $paquetesTuristicos[] = $paquete;
            }
        }

        return $paquetesTuristicos;
        // ? Que acabo de hacer?
    }

    /**
     * Método que retorna el promedio de ventas on-line realizadas por la agencia.
     */
    // TODO | Probar si funciona
    public function promedioVentasOnLine() {
        $totalVenta = 0;
        $cantVentas = count($this->getVentasWebs());

        foreach ($this->getVentasWebs() as $key => $ventasWebs) {
            $precioVenta = $ventasWebs->darImporteVenta();
            $totalVenta = $totalVenta + $precioVenta;
        }

        $promedio = $totalVenta / $cantVentas;

        return $promedio;
    }

    /**
     * Método que retorna el promedio de ventas realizadas por la agencia.
     */
    // TODO | Probar si funciona
    public function promedioVentasAgencia() {
        $totalVenta = 0;
        $cantVentas = count($this->getVentasAgencia());

        foreach ($this->getVentasAgencia() as $key => $ventasWebs) {
            $precioVenta = $ventasWebs->darImporteVenta();
            $totalVenta = $totalVenta + $precioVenta;
        }

        $promedio = $totalVenta / $cantVentas;
        
        return $promedio;
    }
}





?>