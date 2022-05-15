<?php

include "../Ejercicio1/Cliente.php";

require_once "../Ejercicio2/Cuenta.php";
require_once "../Ejercicio2/CajadeAhorro.php";
require_once "../Ejercicio2/CuentCorriente.php";

include "../Ejercicio3-4/Banco.php";

// 1. Crear un objeto de la clase Banco. // TODO | Listo
$banco = new Banco();

// 2. Crear dos nuevos clientes Cliente1 y Cliente2, y agregarlos al banco. // TODO | Listo

$ClienteA = new Cliente("Mirko", "Dinamarca", "DNI", 41609029, 1);
$ClienteB = new Cliente("Carlos", "Rodriguez", "DNI", 41508742, 2);

$clientes = [$ClienteA, $ClienteB];
$banco->setColeccionCliente($clientes);


// 3. Crear dos Cuentas Corrientes, una asociada al cliente A y otra al cliente B, y agregarlas al Banco. // TODO | Listo

$CuentaCorrienteA = new CuentCorriente($ClienteA->getNombre(), "1CC", $ClienteA->getDni(), 400, 600);
$CuentaCorrienteB = new CuentCorriente($ClienteB->getNombre(), "2CC", $ClienteB->getDni(), 300, 500);

$cuentasCorrientes = [$CuentaCorrienteA, $CuentaCorrienteB];

$banco->setColeccionCuentaCorriente($cuentasCorrientes);

// 4. Crear tres Cajas de Ahorro, dos asociadas al cliente A y una asociada al cliente B, y agregarlas al Banco. // TODO | Listo

$cajaDeAhorro1A = new CajadeAhorro($ClienteA->getNombre(), "ACA1", $ClienteA->getDni(), 3000); 
$cajaDeAhorro2A = new CajadeAhorro($ClienteA->getNombre(), "ACA2", $ClienteA->getDni(), 2000); 

$cajaDeAhorroB = new CajadeAhorro($ClienteB->getNombre(), "BCA", $ClienteB->getDni(), 2550); 

$cajasDeAhorros = [$cajaDeAhorro1A, $cajaDeAhorro2A, $cajaDeAhorroB];

$banco->setColeccionCajaAhorro($cajasDeAhorros);


// 5. Depositar $300 en cada una de las Cajas de Ahorro. // TODO | Listo

$banco->realizarDeposito("ACA1", 300);
$banco->realizarDeposito("ACA2", 300);
$banco->realizarDeposito("BCA", 300);

// 6. Transferir $150 de la Cuenta Corriente de Cliente1, a la Caja de Ahorro de Cliente2. // TODO | Listo

$banco->realizarRetiro("1CC", 150);
$banco->realizarDeposito("BCA", 150);

// 7. Mostrar los datos de todas las cuentas.

echo $banco

?>