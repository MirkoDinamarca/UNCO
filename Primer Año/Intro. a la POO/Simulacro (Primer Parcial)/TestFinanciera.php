<?php

include "Cuota.php";
include "Financiera.php";
include "Persona.php";
include "Prestamo.php";

/* CUOTAS */

$cincoCuotas = [
    new Cuota(1, 0, 0),
    new Cuota(2, 0, 0),
    new Cuota(3, 0, 0),
    new Cuota(4, 0, 0),
    new Cuota(5, 0, 0)
];

$cuatroCuotas = [
    new Cuota(1, 0, 0),
    new Cuota(2, 0, 0),
    new Cuota(3, 0, 0),
    new Cuota(4, 0, 0)
];

$dosCuotas = [
    new Cuota(1, 0, 0),
    new Cuota(2, 0, 0)
];

// TODO (1) Se crea el objeto Financiera
$objFinanciera = new Financiera("Money", "Av.Arg1234");

// TODO (2) Se crean 3 objetos Prestamos
$objPrestamo1 = new Prestamo(0, 50000, $cincoCuotas, 0.1, new Persona("Pepe", "Florez", "", "Bs As 12", "dir@mail.com", 299444567, 40000));
$objPrestamo2 = new Prestamo(1, 10000, $cuatroCuotas, 0.1, new Persona("Luis", "Suarez", "", "Bs As 123", "dir@mail.com", 29944455, 4000));
$objPrestamo3 = new Prestamo(2, 10000, $dosCuotas, 0.1, new Persona("Pepe", "Florez", "", "Bs As 12", "dir@mail.com", 299444567, 4000));

// TODO (3) Se invoca al Método incorporarPrestamo() con cada objPrestamo
$objFinanciera->incorporarPrestamo($objPrestamo1);
$objFinanciera->incorporarPrestamo($objPrestamo2);
$objFinanciera->incorporarPrestamo($objPrestamo3);

// TODO (4) echo al $objFinanciera creado en (1)
echo $objFinanciera;

// TODO (5) Invocar al método otorgarPrestamoSiCalifica() de la clase Financiera
$objFinanciera->otorgarPrestamoSiCalifica();

// TODO (6) echo al $objFinanciera creado en (1)
echo $objFinanciera;

// TODO (7) Invocar al Método informarCuotaPagar(2) y almacenarlo en $objCuota
$objCuota = $objFinanciera->informarCuotaPagar(0);

// TODO (8) Realizar un echo de la variable obtenida del inciso anterior
echo $objCuota . "\n"; 

// TODO (9) Invocar al método darMontoFinalCuota() con la variable del inciso anterior

// Si es distinto de NULL entonces se ejecuta
if ($objCuota != null) {
    echo "El monto final es: $" .$objCuota->darMontoFinalCuota() . "\n"; // Testing

    // TODO (10) Invocar al método setCancelada(true) con el objeto obtenido en el inciso 7
    $objCuota->setCancelada(true);
    
    // TODO (11) Invocar al método darMontoFinalCuota() con la variable $objCuota
    $objCuota = $objFinanciera->informarCuotaPagar(0);

    // TODO (12) Realizar un echo de la variable obtenida del inciso anterior
    echo $objCuota . "\n"; 

    echo "El monto final es: $" .$objCuota->darMontoFinalCuota() . "\n"; // Testing
} else {
    echo "a mimir";
}




?>