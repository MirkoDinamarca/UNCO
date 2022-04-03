<?php

/* PROGRAMA censoEncuestas */
/* Realiza una petición al usuario de cuantas encuestas desea realizar
   y en base a eso comienza la encuesta */
/* int $viviendas, $suma, $menores, $casaMenor, $encuestas, $i, $habitantes, $menor18 */
/* string $jefe, $nombre */
/* float $prom */

$viviendas = 0; // Contador
$suma = 0; // Sumatoria
$menores = 0; // Contador
$casaMenor = 0; // Contador

echo "¿Cuántas encuestas desea realizar?: ";
$encuestas = trim(fgets(STDIN));

if ($encuestas == 0) {
    echo "No se realizarán encuestas";
} else {
    for ($i = 1; $i <= $encuestas ; $i++) { 
        echo "Ingrese el nombre del jefe de hogar: ";
        $jefe = trim(fgets(STDIN));
        echo "¿Cuántos habitantes viven en la vivienda?: ";
        $habitantes = trim(fgets(STDIN));
        $suma = $suma + $habitantes; // Sumatoria
        echo "¿Cuántos menores a 18 años?: ";
        $menor18 = trim(fgets(STDIN));
    
        // Calcula si $menor18 es mayor a 0 y también cual de todos tiene mayor número de menores en su vivienda
        if ($menor18 > 0) {
            if ($menor18 >= $menores) {
                $nombre = $jefe;
                $menores = $menor18; 
            }
            $casaMenor++;
        }
        /*
        if ($menor18 > 0) {
            if ($encuestas == 1) {
                $menores = $menor18;
            } else if ($menor18 >= $menores) {
                $nombre = $jefe;
                $menores = $menor18;  
            } 
            $casaMenor++;
        }
        */
        $viviendas++;
    }

    // Calcula el prom de habitantes por vivienda
    $prom = $suma / $viviendas;

    echo "Se realizaron un total de: " . $encuestas . " encuestas\n";
    echo "La cantidad de viviendas que tienen menores a 18 años son: " . $casaMenor . "\n";
    echo "Quien tiene mayor cantidad de menores es: " . $nombre . "\n";
    echo "El promedio de cantidad de personas por vivienda es: " . $prom;
}

















?>