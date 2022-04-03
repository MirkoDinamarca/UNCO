<?php
require_once "Libro.php";

$libro1 = new Libro(1234 ,"La Tregua", 1992, "La Flor", "Mario", "Benedetti");
$libro2 = new Libro(4523 ,"El Séptimo Sello", 1950, "La Flor", "José Rodriguez", "Dos Santos");
$libro3 = new Libro(5923 ,"1984", 1947, "Arenal", "George", "Orwell");

$biblioteca = ["La Tregua", "Revival", "La Guerra de los Mundos", "Finisterre"];

$arregloLibros = [$libro1, $libro2, $libro3];

    var_dump($libro1);


    echo $libro1->perteneceEditorial("La Flor") . "\n";;
    echo $libro1->aniosdesdeEdicion() . "\n";
    echo $libro1->iguales($libro1->getTitulo(), $biblioteca) . "\n";

    echo $libro2->perteneceEditorial("La Flor") . "\n";;
    echo $libro2->aniosdesdeEdicion() . "\n";
    echo $libro2->iguales($libro2->getTitulo(), $biblioteca) . "\n";

    echo $libro3->perteneceEditorial("La Flor") . "\n";;
    echo $libro3->aniosdesdeEdicion() . "\n";
    echo $libro3->iguales($libro3->getTitulo(), $biblioteca) . "\n";

// print_r($arregloLibros[1]->getEditorial());

/*
do {
    echo "¿Que desea hacer?\n";
    echo "(1) Saber si el libro pertenece a una editorial\n";
    echo "(2) ¿Cuáles son los años desde su impresión?\n";
    echo "(3) Saber si ya se encuentra en la biblioteca\n";
    echo "(4) Saber cuáles libros pertenecen a una misma editorial\n";
    echo "(5) Salir\n";
    echo "Opción: ";

    switch ($opcion) {
        case 1:
            $editorialLibro = $libro
            break;

        case 2:
            
            break;
        case 3:
            
            break;
        case 4:
            
            break;
        case 5:
            echo "¡Que tengas un buen día!";
            break;
    }
} while ($opcion != 5);
*/