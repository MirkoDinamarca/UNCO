<?php

include "Destino.php";
include "../Ejercicio1/Cliente.php";
include "Agencia.php";
include "PaqueteTuristico.php";
include "Ventas.php";
include "VentaWeb.php";

/* Se crea una instancia de la clase Destino con los siguientes valores: lugar =“Bariloche”, valorDia =250. */

$destino = new Destino(1, "Bariloche", 250);

/* Se crea una instancia de la clase PaqueteTuristico referenciando al destino creado en (a) con los
siguientes valores: fdesde = 23/05/2014 cantDias= 3, totalPlazas = 25. */

$paqueteTuristico = new PaqueteTuristico(date("d-m-Y"), 3, $destino, 25);

/* Se crea instancia de la clase Agencia. */

$primerCliente = new Cliente("Mirko", "Dinamarca", "DNI", 27898654, 1);
$segundoCliente = new Cliente("Alejandro", "Martinez", "DNI", 41576872, 2);

$clientes = [$primerCliente, $segundoCliente];

$agencia = new Agencia($clientes);

/* Se invoca al método incorporarPaquete de la agencia con el paquete creado en (b). */
$agencia->incorporarPaquete($paqueteTuristico); // TODO | Funciona

/* Se invoca nuevamente al método incorporarPaquete de la agencia con el paquete creado en (b). */
$agencia->incorporarPaquete($paqueteTuristico); // TODO | Funciona

/*
Se invoca al método incorporarVenta con los siguientes parámetros: el paquete creado en (b), con los
siguientes datos del cliente: número de documento 27898654, y tipo de documento DNI, cantidad de
personas que viaja: 5, y no es una venta online.
*/

$agencia->incorporarVenta($paqueteTuristico, "DNI", 27898654, 5, false);
print_r($agencia->getVentasAgencia());

/*
Se invoca al método incorporarVenta con los siguientes parámetros: el paquete creado en (b), con un
cliente con número de documento 27898654, tipo de documento DNI, cantidad de personas que viaja:
4, y es una venta online.
*/

$agencia->incorporarVenta($paqueteTuristico, "DNI", 27898654, 4, true);

/*
Se invoca al método incorporarVenta con los siguientes parámetros: el paquete creado en (b), con un
cliente con número de documento 27898654, tipo de documento DNI, cantidad de personas que viaja:
15, y es una venta online.
*/

$agencia->incorporarVenta($paqueteTuristico, "DNI", 27898654, 15, true);
// print_r($agencia->getVentasWebs());

/** TESTING OTROS MÉTODOS **/

// $paquetes = $agencia->informarPaquetesTuristicos(date("d-m-Y"), $destino); // TODO | Funciona

// $paquetesEconomicos = $agencia->paqueteMasEconomico(date("d-m-Y"), $destino); // TODO | Funciona

// $paquetesConsumidos = $agencia->informarConsumoCliente("DNI", 27898654); // TODO | Funciona, me trae 1 venta agencia y 2 webs
// print_r($paquetesConsumidos);

// $paquetesVendidos = $agencia->informarPaquetesMasVendido(date("d-m-Y"), 2); // TODO | No funciona

$paquetesPromedio = $agencia->promedioVentasOnLine(); // Retorna 0 q pasó?
echo $paquetesPromedio;
?>