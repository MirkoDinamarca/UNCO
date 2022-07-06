<?php

include "Categoria.php";
include "Equipo.php";
include "MinisterioDeporte.php";
include "Partido.php";
include "Torneo.php";
include "TorneoNacional.php";
include "TorneoProvincial.php";

/* (1) */

$categoria = new Categoria(1, "mayores");

$objE1 = new Equipo("equipo1", "capitan1", 11, $categoria);
$objE2 = new Equipo("equipo2", "capitan2", 11, $categoria);
$objE3 = new Equipo("equipo3", "capitan3", 11, $categoria);
$objE4 = new Equipo("equipo4", "capitan4", 11, $categoria);
$objE5 = new Equipo("equipo5", "capitan5", 11, $categoria);
$objE6 = new Equipo("equipo6", "capitan6", 11, $categoria);
$objE7 = new Equipo("equipo7", "capitan7", 11, $categoria);
$objE8 = new Equipo("equipo8", "capitan8", 11, $categoria);
$objE9 = new Equipo("equipo9", "capitan9", 11, $categoria);
$objE10 = new Equipo("equipo10", "capitan10", 11, $categoria);
$objE11 = new Equipo("equipo11", "capitan11", 11, $categoria);
$objE12 = new Equipo("equipo12", "capitan12", 11, $categoria);

$objPart1 = new Partido(1, "2022-10-12", 80, 120, $objE7, $objE8); // Gana el equipo 8
$objPart2 = new Partido(2, "2022-10-12", 81, 110, $objE9, $objE10); // Gana el equipo 10
$objPart3 = new Partido(3, "2022-10-12", 115, 85, $objE11, $objE12); // Gana el equipo 11
$objPart4 = new Partido(4, "2022-10-12", 3, 2, $objE1, $objE2); // Gana el equipo 1
$objPart5 = new Partido(5, "2022-10-12", 0, 1, $objE3, $objE4); // Gana el equipo 4
$objPart6 = new Partido(6, "2022-10-12", 2, 3, $objE5, $objE6); // Gana el equipo 6

/* (2) */
$partidosProvinciales = [$objPart1, $objPart1, $objPart1];

/* (3) */
$partidosNacionales = [$objPart4, $objPart5, $objPart6];

/* (4) */
$ministerioDeporte = new MinisterioDeporte("2022");

/* (5) */

$array = [
    "idTorneo" => 1, // Registra los torneos con solo 1 ID
    "montoPremio" => 100000,
    "localidad" => "Centenario",
    "provincia" => "Neuquén"
];

$ministerioDeporte->registrarTorneo($partidosProvinciales, "provinciales", $array);

/* (6) */
$ministerioDeporte->registrarTorneo($partidosNacionales, "nacionales", $array);

// print_r($ministerioDeporte->getColeccionTorneos());

/* TEST Probando el método dar ganador */ // TODO | Esto anda pero todavía me falta implementarlo en la otra clase
foreach ($ministerioDeporte->getColeccionTorneos() as $key => $torneo) {

    // $partidos = $torneo->getColeccionPartidos();

    // foreach ($partidos as $key => $partido) {
    //     if ($partido->getCantGolesE2() > $partido->getCantGolesE1()) {
    //         print_r($partido);
    //     } else {
    //         print_r($partido);
    //     }
    // }

    $ganadores = $torneo->obtenerEquipoGanadorTorneo();
    
}

print_r($ganadores);
?>