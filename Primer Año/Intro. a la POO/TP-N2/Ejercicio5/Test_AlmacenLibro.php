<?php
include "Lectura.php";
include "../Ejercicio3/Libro.php";


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
    echo "-----------------------------------\n";
    echo "(1) ¿Desea almacenar un libro?\n";
    echo "(2) ¿Desea consultar algún libro leído?\n";
    echo "(3) ¿Desea consultar la sinópsis del libro?\n";
    echo "(4) Consultar libros leídos del mismo año de edición\n";
    echo "(5) Consultar libros leídos por el mismo autor\n";
    echo "(6) Salir\n";
    echo "Respuesta: ";
    $respuesta = trim(fgets(STDIN));

    switch ($respuesta) {
        case 1:
            echo "Ingrese el ISBN del libro: ";
            $isbn = trim(fgets(STDIN));
            echo "Ingrese el título: ";
            $titulo = strtoupper(trim(fgets(STDIN)));
            echo "Ingrese el nombre del Autor: ";
            $nombre = strtoupper(trim(fgets(STDIN)));
            echo "Ingrese el apellido del Autor: ";
            $apellido = strtoupper(trim(fgets(STDIN)));
            echo "Ingrese el año de edición: ";
            $anio = trim(fgets(STDIN));
            echo "Ingrese la editorial: ";
            $editorial = trim(fgets(STDIN));
            echo "¿Cuántas páginas tiene?: ";
            $paginas = trim(fgets(STDIN));
            echo "Dé una breve sinópsis del libro: ";
            $sinopsis = trim(fgets(STDIN));

            $libro = new Libro($isbn, $titulo, $anio, $editorial, $paginas, $sinopsis);
            $libro->setNombreAutor($nombre);
            $libro->setApellidoAutor($apellido);

            $lectura->almacenandoLibros($libro);
            echo "Libro almacenado correctamente\n";
            break;
        
        case 2:
            echo "Ingrese el título del libro: ";
            $respuesta = strtoupper(trim(fgets(STDIN)));
            $lectura->libroLeido($respuesta);

            if ($respuesta) {
                echo "¡Ya leíste este libro!\n";
            } else {
                echo "¡No has leído este libro aún!\n";
            }
            break;
        case 3: 
            echo "¿De que libro desea saber su sinópsis?: ";
            $libro = strtoupper(trim(fgets(STDIN)));
            echo $lectura->darSinopsis($libro) . "\n";
            break;
        case 4:
            echo "Ingrese el año de edición: ";
            $anios = trim(fgets(STDIN));
            $librosAnios = $lectura->leidosAnioEdicion($anios);
            echo "Los libros leídos en el año " . $anios . " son: \n";
            
            foreach ($librosAnios as $libro) {
                echo "- " . $libro . "\n";
            }
            break;
        case 5:
            echo "Ingrese el nombre del autor: ";
            $autor = strtoupper(trim(fgets(STDIN)));
            $librosAutor = $lectura->darLibrosPorAutor($autor);
            echo "Los libros leídos del autor " . $autor . " son: \n";
            
            foreach ($librosAutor as $libro) {
                echo "- " . $libro . "\n";
            }
            break;
        case 6:
            echo "¡Que tenga buen día!";
            break;
    }
} while ($respuesta != 6);


?>