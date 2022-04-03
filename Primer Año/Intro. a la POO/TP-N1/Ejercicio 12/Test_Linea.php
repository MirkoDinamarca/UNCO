<?php

require_once "Linea.php";

$linea = new Linea(4,3,6,8);

echo $linea . "\n";

$lineaDerecha = $linea->mueveDerecha(10);
echo $linea . " Se movió a la derecha 10\n";

$lineaIzquierda = $linea->mueveIzquierda(5);
echo $linea . " Se movió a la izquierda 5\n";

$lineaArriba = $linea->mueveArriba(3);
echo $linea . " Se movió arriba 3\n";

$lineaAbajo = $linea->mueveAbajo(8);
echo $linea . " Se movió abajo 8\n";