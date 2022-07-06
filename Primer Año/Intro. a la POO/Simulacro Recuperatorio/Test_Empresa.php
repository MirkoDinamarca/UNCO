<?php 

include "Canal.php";
include "Cliente.php";
include "Contrato.php";
include "ContratoWeb.php";
include "EmpresaCable.php";
include "Planes.php";

/** (A) **/
// Se crea 1 instancia de la clase Empresa_Cable.

$empresa = new EmpresaCable();

/** (B) **/
// Se crean 3 instancias de la clase Canal.

$canal1 = new Canal("noticias", 3000, false);
$canal2 = new Canal("musical", 5000, true);
$canal3 = new Canal("deportivo", 2000, true);

$canales = [$canal1, $canal2, $canal3];

/** (C) **/
// Se crean 2 instancias de la clase Planes, 
// cada una de ellas con su código propio que hacen referencia a los 
// canales creados anteriormente (uno de los códigos de plan debe ser 111).

$plan1 = new Planes(111, $canales, 7000, 100);
$plan2 = new Planes(115, $canales, 3000, 50);

/** (D) **/
// Crear una instancia de la clase Cliente

$cliente = new Cliente("Mirko", "Dinamarca", "DNI", 41609029);

/** (E) **/
// Se crean 3 instancias de Contratos, 1 correspondiente a un contrato realizado en la empresa y 2 realizados via web.

$fecha_actual = new DateTime(date("d-m-Y"));
$fecha_vencimiento = new DateTime(date("d-m-Y"));
$fecha_vencimiento->add(new DateInterval("P35D"));

$contrato1 = new Contrato($fecha_actual, $fecha_vencimiento, $plan1, $cliente);
$contrato2 = new ContratoWeb($fecha_actual, $fecha_vencimiento, $plan2, $cliente);
$contrato3 = new ContratoWeb($fecha_actual, $fecha_vencimiento, $plan2, $cliente);

/** (F) **/
// Invocar con cada instancia del inciso anterior al método calcularImporte y visualizar el resultado.
echo "$" . $contrato1->calcularImporte() . "\n";
echo "$" . $contrato2->calcularImporte() . "\n";
echo "$" . $contrato3->calcularImporte() . "\n";

/** (G) **/
// Invocar al método incorporaPlan con uno de los planes creados en c).

$empresa->incorporarPlan($plan1);


/** (H) **/
// Invocar nuevamente al método incorporaPlan de la empresa con el plan creado en c).
$empresa->incorporarPlan($plan1);

/** (I) **/
// Invocar al método incorporarContrato con los siguientes parámetros: uno de los planes creado en
// c), el cliente creado en e), la fecha de hoy para indicar el inicio del contrato, la fecha de hoy más 30 días
// para indicar el vencimiento del mismo y false como último parámetro.

$fecha_actual = new DateTime(date("d-m-Y"));
$fecha_vencimiento = new DateTime(date("d-m-Y"));

$fecha_vencimiento->add(new DateInterval("P30D"));


$empresa->incorporarContrato($plan1, $cliente, $fecha_actual, $fecha_vencimiento, false);

/** (J) **/
// Invocar al método incorporarContrato con los siguientes parámetros: uno de los planes creado en
// c), el cliente creado en e), la fecha de hoy para indicar el inicio del contrato, la fecha de hoy más 30 días
// para indicar el vencimiento del mismo y true como último parámetro.
$empresa->incorporarContrato($plan1, $cliente, $fecha_actual, $fecha_vencimiento, true);
// print_r($empresa->getColeccionContratos());

/** (K) **/
// Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d)
// y que haya sido contratado en la empresa.
// echo $empresa->pagarContrato($contrato1);
// print_r($contrato1);


/** (L) **/
// Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d)
// y que haya sido contratado vía web.

// echo $empresa->pagarContrato($contrato2);
// print_r($contrato2);

/** (M) **/
// Invoca al método retornarImporteContratos con el código 111
echo "Importe total del contrato con el plan1: $" . $empresa->retornarImporteContratos(111);


?>