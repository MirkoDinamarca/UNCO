<?php

require_once "Cuadrado.php";

$coordenadaA = ["x" => 7, "y" => 11];
$coordenadaB = ["x" => 13, "y" => 11];
$coordenadaC = ["x" => 13, "y" => 5];
$coordenadaD = ["x" => 7, "y" => 5];

$cuadrado = new Cuadrado($coordenadaA, $coordenadaB, $coordenadaC, $coordenadaD);
echo $cuadrado;
$areaPrimerCuadrado = $cuadrado->area();
echo "El área del primer cuadrado es " . $areaPrimerCuadrado . "mt²\n";
$aumentarTamanio = $cuadrado->aumentarTamanio(2);
$areaSegundoCuadrado = $cuadrado->area();
echo "Si le aumentamos cada lado 2mt más, entonces su área es " . $areaSegundoCuadrado . "mt²";