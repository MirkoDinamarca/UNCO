<?php

class EmpresaCable
{
    private $coleccionPlanes;
    private $coleccionContratos;

    public function __construct(){}

    public function getColeccionPlanes()
    {
        return $this->coleccionPlanes;
    }
    public function setColeccionPlanes($coleccionPlanes)
    {
        $this->coleccionPlanes = $coleccionPlanes;
    }

    public function getColeccionContratos()
    {
        return $this->coleccionContratos;
    }
    public function setColeccionContratos($coleccionContratos)
    {
        $this->coleccionContratos = $coleccionContratos;
    }

    /**
     * Incorpora a la colección de planes un nuevo plan 
     * siempre y cuando no haya un
     * plan con los mismos canales y 
     * los mismos MG (en caso de que el plan incluyera).
     */

    // TODO | Funciona
    public function incorporarPlan($planIncorporar)
    {
        $planes = $this->getColeccionPlanes();
        $verificacion = true;
        $i = 0;

        do {
            if ($planes == []) {
                $planes[] = $planIncorporar;
                $this->setColeccionPlanes($planes);
                $verificacion = false;
            } else if ($planes[$i]->getCanales()[$i] == $planIncorporar->getCanales()[$i] && $planes[$i]->getIncluyeMG() == $planIncorporar->getIncluyeMG()) {
                $verificacion = false;
            }
            $i++;
        } while ($verificacion == true && $i < count($planes));

        if ($verificacion && count($planes) != 0) {
            $planes[] = $planIncorporar;
            $this->setColeccionPlanes($planes);
        }
    }

    /**
     * 
     */
    // TODO | Funciona
    public function incorporarContrato($plan, $cliente, $fechaInicio, $fechaVencimiento, $contratoBool)
    {
        $contratos = $this->getColeccionContratos();

        if ($contratoBool) {
            $contrato = new ContratoWeb($fechaInicio, $fechaVencimiento, $plan, $cliente);
        } else {
            $contrato = new Contrato($fechaInicio, $fechaVencimiento, $plan, $cliente);
        }

        $contratos[] = $contrato;
        $this->setColeccionContratos($contratos);
    }

    /**
     * Método que recibe por parámetro el código de un plan y retorna 
     * la suma de los importes de los contratos realizados usando ese plan.
     */
    // TODO | Funciona
    public function retornarImporteContratos($codigoPlan)
    {
        $contratos = $this->getColeccionContratos();
        $importeTotal = 0;

        foreach ($contratos as $contrato) {
            if ($contrato->getPlan()->getCodigo() == $codigoPlan) {
                $importeTotal = $importeTotal + $contrato->calcularImporte();
            }
        }

        return $importeTotal;
    }

    /**
     * Método recibe como parámetro un contrato, actualiza su estado y retorna el importe
     * final que debe ser abonado por el cliente.
     */

    // TODO | Funciona
    public function pagarContrato($contrato)
    {
        if ($contrato->getEstado() == "dia") {
            $contrato->setFechaVencimiento($contrato->getFechaVencimiento()->add(new DateInterval("P30D")));
            $totalPagar = $contrato->calcularImporte();
        } else if ($contrato->getEstado() == "moroso") {

            $dias = $contrato->diasContratoVencido();
            $multa = (0.1 * $contrato->calcularImporte()) * $dias;
            $totalPagar = $contrato->calcularImporte() + $multa;
            $contrato->setEstado("dia");
            $contrato->setFechaVencimiento($contrato->getFechaVencimiento()->add(new DateInterval("P30D")));
        } else if ($contrato->getEstado() == "suspendido") {

            $dias = $contrato->diasContratoVencido();
            $multa = (0.1 * $contrato->calcularImporte()) * $dias;
            $totalPagar = $contrato->calcularImporte() + $multa;
        }

        return $totalPagar;
    }

    public function __toString()
    {
    }
}
