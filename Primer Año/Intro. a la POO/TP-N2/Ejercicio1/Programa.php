<?php

include "CuentaBancaria.php";
include "Persona.php";

// Creo una nueva instancia del objeto CuentaBancaria
$personaCuenta = new CuentaBancaria(10, 80000, 1000);

// Creo una nueva instancia del objeto Persona
$persona = new Persona("Mirko", "Dinamarca", "DNI", 41609029);

// Le paso por parámetro el dni de la persona a la cuenta bancaria
$personaCuenta->setdniCliente($persona->getDni());

echo $personaCuenta;

