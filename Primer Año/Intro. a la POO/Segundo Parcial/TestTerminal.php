<?php

include "Empresa.php";
include "Responsable.php";
include "Terminal.php";
include "Viaje.php";
include "ViajeInternacional.php";
include "ViajeNacional.php";

/** Se crea una colección con un mínimo de 2 empresas, ejemplo Metrovías y Tren Patagónico. **/

$metrovias = new Empresa(1, "Metrovias");
$trenPatagonico = new Empresa(2, "Tren Patagonico");

// Creo dos responsables
$primerResponsable = new Responsable("Rodrigo", "Capo", 41567824, "Av.Argentina 230", "correo@correo.com", 2995674876);
$segundoResponsable = new Responsable("Maximiliano", "Osvaldo", 40927568, "Av.Olascoaga 230", "correo2@correo.com", 2997587234);

/** A cada empresa se le incorporan 2 instancias de la clase viaje Nacionales y 3 instancias de la clase Viaje Internacionales. **/

/** Viajes de la Empresa Metrovias **/

$viajeNacional1 = new ViajeNacional("Bariloche", "12:00", "15:00", "FF234", 5000, "10/12/2022", 50, 20, $primerResponsable);
$viajeNacional2 = new ViajeNacional("San Martin", "10:00", "12:00", "JJ567", 2600, "24/09/2022", 50, 40, $primerResponsable);
$viajeInternacional1 = new ViajeInternacional("Inglaterra", "03:00", "22:00", "HH563", 25000, "02/12/2022", 50, 5, $segundoResponsable, "pasaporte1");
$viajeInternacional2 = new ViajeInternacional("Brasil", "00:00", "04:00", "JJ231", 10000, "25/12/2022", 50, 45, $segundoResponsable, "pasaporte2");
$viajeInternacional3 = new ViajeInternacional("España", "02:00", "23:00", "FF687", 12000, "05/08/2022", 50, 2, $segundoResponsable, "pasaporte3");

$coleccionViajeMetrovias = [$viajeNacional1, $viajeNacional2, $viajeInternacional1, $viajeInternacional2, $viajeInternacional3];
$metrovias->setColeccionViajes($coleccionViajeMetrovias);

/** Viajes de la Empresa Tren Patagonico **/

$viajeNacional1 = new ViajeNacional("Neuquen", "12:00", "15:00", "FF213", 3000, "10/12/2022", 50, 20, $primerResponsable);
$viajeNacional2 = new ViajeNacional("Buenos Aires", "10:00", "12:00", "JJ867", 2100, "24/09/2022", 50, 40, $primerResponsable);
$viajeInternacional1 = new ViajeInternacional("Miami", "03:00", "22:00", "HH945", 40000, "02/12/2022", 50, 5, $segundoResponsable, "pasaporte1");
$viajeInternacional2 = new ViajeInternacional("Uruguay", "00:00", "04:00", "JJ340", 14000, "25/12/2022", 50, 45, $segundoResponsable, "pasaporte2");
$viajeInternacional3 = new ViajeInternacional("Qatar", "02:00", "23:00", "FF284", 25000, "05/08/2022", 50, 2, $segundoResponsable, "pasaporte3");

$coleccionViajeTrenPatagonico = [$viajeNacional1, $viajeNacional2, $viajeInternacional1, $viajeInternacional2, $viajeInternacional3];

$trenPatagonico->setColeccionViajes($coleccionViajeTrenPatagonico);

$coleccionEmpresas = [$metrovias, $trenPatagonico]; // Hago la colección de empresas ya con los viajes seteados solicitado del punto 1

/** Se crea un objeto Terminal con la colección de empresas creadas en el punto1. **/

$terminal = new Terminal("ViajeGenial", "San Martin 88", $coleccionEmpresas);

/** Invocar y visualizar el resultado obtenido de invocar al método darViajeMenorValor() a partir de la instancia Aeropuerto creada en el punto 3. **/

print_r($terminal->darViajeMenorValor());
// echo $terminal;



/** TESTING método buscarViaje() **/
// print_r($metrovias->buscarViaje("HH563"));
// print_r($trenPatagonico->buscarViaje("HH945"));

/** TESTING método buscarViaje() y calcularImporteViaje() **/

// echo "Costo del viaje HH563: $" . $metrovias->darCostoViaje("HH563") . "\n";
// echo "Costo del viaje FF213: $" . $trenPatagonico->darCostoViaje("FF213") . "\n";

?>