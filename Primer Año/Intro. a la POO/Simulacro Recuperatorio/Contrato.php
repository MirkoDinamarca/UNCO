<?php 

class Contrato {
    private $fechaInicio;
    private $fechaVencimiento;
    private $plan; // Referencia al plan
    private $estado = "suspendido"; // al dia, moroso, suspendido
    private $costo;
    private $renovacion;
    private $cliente; // Referencia al cliente

    public function __construct($fechaInicio, $fechaVencimiento, $plan, $cliente)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->plan = $plan;
        $this->cliente = $cliente;
    }

    public function getFechaInicio(){
        return $this->fechaInicio;
    }
    public function setFechaInicio($fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }

    public function getFechaVencimiento(){
        return $this->fechaVencimiento;
    }
    public function setFechaVencimiento($fechaVencimiento){
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function getPlan(){
        return $this->plan;
    }
    public function setPlan($plan){
        $this->plan = $plan;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getCosto(){
        return $this->costo;
    }
    public function setCosto($costo){
        $this->costo = $costo;
    }

    public function getRenovacion(){
        return $this->renovacion;
    }
    public function setRenovacion($renovacion){
        $this->renovacion = $renovacion;
    }

    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    /**
     * Actualiza el estado del contrato según corresponda según lo descripto
     */
    // ? No sé si está bien hecho
    public function actualizarEstadoContrato() {
        $fechaVencimiento = $this->getFechaVencimiento();
        $dias = $this->diasContratoVencido();

        if ($this->getFechaVencimiento() < $fechaVencimiento->add(new DateInterval("P . $dias . D"))) {
            $this->setEstado("moroso");
        } else if ($this->getFechaVencimiento() >= $fechaVencimiento->add(new DateInterval("P . $dias . D"))) {
            $this->setEstado("suspendido");
        } else {
            $this->setEstado("dia");
        }
    }

    /**
     * Calcula los días vencidos y lo retorna
     */

    public function diasContratoVencido() {
        $dias = date_diff($this->getFechaInicio(), $this->getFechaVencimiento());
        $dias = $dias->format('%a');
        $dias = $dias - 30;
        return $dias;
    }

    /**
     * Retorna el importe final correspondiente al importe del contrato
     * (Importe plan + importe parcial de cada canal q lo conforma)
     */

    public function calcularImporte() {
        $plan = $this->getPlan();
        $importePlan = $plan->getImporte();
        $importeCanales = 0;

        foreach ($plan->getCanales() as $canal) {
            $importeCanales = $importeCanales + $canal->getImporte();
        }

        $importeFinal = $importePlan + $importeCanales;

        return $importeFinal;
    }

    public function __toString()
    {
        return "Fecha de Inicio: " . $this->getFechaInicio() . "\n" .
                "Fecha de Vencimiento: " . $this->getFechaVencimiento() . "\n" .
                "Plan: " . $this->getPlan() . "\n" .
                "Estado: " . $this->getEstado() . "\n" .
                "Costo: $" . $this->getCosto() . "\n" .
                "Renovación: " . $this->getRenovacion() . "\n" .
                "Cliente: " . $this->getCliente() . "\n";
    }
}

?>