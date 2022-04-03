<?php

include "Lectura.php";


// Instancias objetos de la Clase lIBRO
/*
$libro1 = new Libro(20, "LA TREGUA", 1960, "Flores", 300, "Narra la vida de Martín Santomé, un hombre viudo y cercano a jubilarse, que se enamora perdidamente de su compañera de trabajo.");
$libro2 = new Libro(20, "FARHENEIT", 1960, "Arenal", 300, "Se queman todos los librooooooooos.");
$libro3 = new Libro(20, "EL SEPTIMO SELLO", 1960, "Santa Rosa", 300, "Algo del fin del mundo xd.");
$libro4 = new Libro(20, "FINISTERRE", 1960, "Misterio", 300, "Ni idea, nunca lo leí.");
$libro5 = new Libro(20, "REVIVAL", 1960, "Lojo", 300, "Re aburrido jaja.");
*/

$lectura = new Lectura(60);


do {
    echo "(1) ¿Desea almacenar un libro?\n";
    echo "(2) ¿Desea consulta algún libro leído?\n";
    echo "Respuesta: ";
    $respuesta = trim(fgets(STDIN));

    switch ($respuesta) {
        case 1:
            $lectura->almacenandoLibros();
            echo "Libro almacenado correctamente\n";
            // var_dump($lectura->getBackupLibros()[0]->getTitulo());
            break;
        
        case 2:

            // echo "Ingrese el título del libro: ";
            // $respuesta = trim(fgets(STDIN));
            $lectura->libroLeido();

            /*
            if ($libroLeido) {
                echo "¡Ya leíste este libro!\n";
            } else {
                echo "¡No has leído este libro aún!\n";
            }
            */
            break;
    }
} while ($respuesta != 2);


?>