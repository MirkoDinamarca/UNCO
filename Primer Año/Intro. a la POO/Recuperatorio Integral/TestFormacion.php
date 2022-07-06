<?php

include "Formacion.php";
include "Locomotora.php";
include "Vagon.php";
include "VagonCarga.php";
include "VagonPasajeros.php";

/** (1) **/

$locomotora = new Locomotora(188, 140);

/** (2) **/
$vagon1 = new VagonPasajeros(1992, 50, 3, 15000, 30, 25);
$vagonCarga = new VagonCarga(1980, 50, 3, 15000, 150000, 55000); // Le agregué el peso max ya que el enunciado no lo mostraba
$vagon = new VagonPasajeros(1990, 50, 3, 15000, 50, 50);

/** (3) **/
$formacion = new Formacion($locomotora, 10);

$formacion->incorporarVagonFormacion($vagon1);
$formacion->incorporarVagonFormacion($vagonCarga);
$formacion->incorporarVagonFormacion($vagon);

/** (4) **/

$formacion->incorporarPasajeroFormacion(6);

/** (5) **/
print_r($vagon1);
print_r($vagonCarga);
print_r($vagon);

/** (6) **/
$formacion->incorporarPasajeroFormacion(14);
// print_r($formacion->coleccionVagon);

/** (7) **/
print_r($locomotora);

/** (8) **/
echo "El promedio de pasajeros en la formación es de: " . $formacion->promedioPasajeroFormacion() . "%\n";

/** (9) **/
echo "El peso total de la formación es de: " . $formacion->pesoFormacion() . " toneladas\n";

/** (10) **/
print_r($vagon1);
print_r($vagonCarga);
print_r($vagon);
?>