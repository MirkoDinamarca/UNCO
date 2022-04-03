<?php

include "Lectura.php";
include "../Ejercicio3/Libro.php";

$libro = new Libro(20, "La Tregua", 1960, "Flores", 300, "Narra la vida de Martín Santomé, un hombre viudo y cercano a jubilarse, que se enamora perdidamente de su compañera de trabajo.");

$lectura = new Lectura(60);

$lectura->setLibro($libro->getTitulo());
echo $lectura . "\n";

$lectura->siguientePagina();
echo $lectura . "\n";

$lectura->retrocederPagina();
echo $lectura . "\n";

$lectura->irPagina(250);
echo $lectura . "\n";

$lectura->retrocederPagina();
echo $lectura . "\n";


?>