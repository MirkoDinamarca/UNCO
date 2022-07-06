<?php

include "Partido.php";
include "Equipo.php";
include "Torneo.php";
include "Categoria.php";
include "Basquet.php";
include "Futbol.php";


/*

(1) Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000 y la colección de
partidos tiene los siguientes objetos:

$objPart1 = new Basquet($objE7 ,$objE8,'2020-10-10',80,120,75);
$objPart2 = new Basquet($objE9 ,$objE10,'2020-10-25',81,110,70);
$objPart3 = new Basquet($objE11 ,$objE12,'2020-11-25',115,85,110);
$objPart4 = new Futbol($objE1 ,$objE2,'2020-10-25',3,2);
$objPart5 = new Futbol($objE3 ,$objE4,'2020-11-13',0,1);
$objPart6 = new Futbol($objE5 ,$objE6,'2020-11-30',2,3);

*/

// Instancias de Categoría
$menores = new Categoria(1, "Menores");
$juveniles = new Categoria(2, "Juveniles");
$mayores = new Categoria(3, "Mayores");

// Futbol
$objE1 = new Equipo("objE1", "capitan1", 11, $menores);
$objE2 = new Equipo("objE2", "capitan2", 11, $menores);
$objE3 = new Equipo("objE3", "capitan3", 11, $juveniles);
$objE4 = new Equipo("objE4", "capitan4", 11, $juveniles);
$objE5 = new Equipo("objE5", "capitan5", 11, $mayores);
$objE6 = new Equipo("objE6", "capitan6", 11, $mayores);

// Basquet
$objE7 = new Equipo("objE7", "capitan7", 5, $menores);
$objE8 = new Equipo("objE8", "capitan8", 5, $menores);
$objE9 = new Equipo("objE9", "capitan9", 5, $juveniles);
$objE10 = new Equipo("objE10", "capitan10", 5, $juveniles);
$objE11 = new Equipo("objE11", "capitan11", 5, $mayores);
$objE12 = new Equipo("objE12", "capitan12", 5, $mayores);

// Equipos de Basquet
$objPart1 = new Basquet(1, $objE7, $objE8, "2020-10-10", 80, 120, 75);
$objPart2 = new Basquet(2, $objE9, $objE10, "2020-10-25", 81, 110, 70);
$objPart3 = new Basquet(3, $objE11, $objE12, "2020-11-25", 115, 85, 110);

// Equipos de Futbol
$objPart4 = new Futbol(4, $objE1, $objE2, "2020-10-25", 3, 2);
$objPart5 = new Futbol(5, $objE3, $objE4, "2020-11-13", 0, 1);
$objPart6 = new Futbol(6, $objE5, $objE6, "2020-11-30", 2, 3);

$coleccionPartidos = [
    $objPart1,
    $objPart2,
    $objPart3,
    $objPart4,
    $objPart5,
    $objPart6,
];


$torneo = new Torneo($coleccionPartidos, 100000);

/*

Invocar al método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipo) donde OBJEquipo1 y
OBJEquipo2 son objE7 y objE11 respectivamente. La fecha es 10-11-20 y el tipo de partido es
basquetbol. Visualice el resultado. 

*/

// print_r($torneo->getColeccionPartidos());
print_r($torneo->ingresarPartido($objE7,$objE11, "10-11-20", "basquetbol")); // Retorna error porque son diferentes categorías
// print_r($torneo->getColeccionPartidos());

/*
Invocar al método darGanadores(‘basquet’) y visualizar el resultado.
*/

$ganadoresBasquet = $torneo->darGanadores("Basquet");
// print_r($ganadoresBasquet);

/*
Invocar al método darGanadores(‘futbol’) y visualizar el resultado.
*/

$ganadoresFutbol = $torneo->darGanadores("futbol");
// print_r($ganadoresFutbol);

/*
Invocar al método calcularPremioPartido con cada uno de los partidos creados en el punto 1
*/

print_r($torneo->calcularPremioPartido($objPart1));

echo $torneo;
?>