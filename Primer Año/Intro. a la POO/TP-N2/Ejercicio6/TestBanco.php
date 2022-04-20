<?php

include "Banco.php";
include "Mostrador.php";

$extraccion = new Mostrador("extraccion", ["primero", "segundo"]);
$deposito = new Mostrador("deposito", ["primero", "segundo"]);
$transaccion = new Mostrador("transaccion", ["primero", "segundo"]);
$extraccion2 = new Mostrador("extraccion", ["primero", "segundo", "tercero"]);
$deposito2 = new Mostrador("deposito", ["primero", "segundo"]);
$transaccion2 = new Mostrador("transaccion", ["primero", "segundo"]);

$mostradores = [$extraccion, $deposito, $transaccion, $extraccion2, $deposito2, $transaccion2];

$banco = new Banco($mostradores);

do {
    echo "(1) Consultar si un mostrador atiende un trámite\n";
    echo "(2) Mejores mostradores para un trámite\n";
    echo "Respuesta: ";
    $respuesta = trim(fgets(STDIN));
    
    switch ($respuesta) {
        case 1:
            echo "Ingrese el trámite: ";
            $tramite = trim(fgets(STDIN));
            
            foreach ($mostradores as $key => $mostrador) {
                $mostrador->atiende($tramite);
            }
            break;
        
        case 2:
            echo "Ingrese el trámite: ";
            $tramite = trim(fgets(STDIN)); 

            $coleccionMostradores = $banco->mostradoresQueAtienden($tramite);
            
            echo "Los mejores mostradores para el trámite " . $tramite . " son:\n";
            foreach ($coleccionMostradores as $key => $mostrador) {
                print_r($mostrador); // ? SE PUEDE MEJORAR | HACERLO MAS PROLIJO 
            }
            break;
    }
} while ($respuesta <= 10);










?>