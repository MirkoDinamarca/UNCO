<?php
/*

Dada una estructura de arreglos asociativos
Calcular:

a)  Dada una materia obtener la cantidad de alumnos que rindieron esa materia.
b)  Por cada materia el porcentaje de alumnos que rindieron.
c)  Obtener toda la información del alumno que mayor nota obtuvo por cada materia. 
d)  Si una materia se aprueba con una nota >=7, retornar la cantidad de alumnos aprobados por materia.
e)  Dada una materia retornar un arreglo con los alumnos que aprobaron esa materia. 
f)  Obtener el o los números de legajo de los alumnos que aprobaron más de cuatro materias. 
g)  Dado un número de legajo, obtener un arreglo con las materias aprobadas por ese alumno. 
*/

$arregloFavorito[0] = ["nroLegajo" => 4453, "codigoMateria" => "matematica", "notaObtenida" => 8];
$arregloFavorito[1] = ["nroLegajo" => 3423, "codigoMateria" => "literatura", "notaObtenida" => 6];
$arregloFavorito[2] = ["nroLegajo" => 4453, "codigoMateria" => "literatura", "notaObtenida" => 8];
$arregloFavorito[3] = ["nroLegajo" => 1275, "codigoMateria" => "matematica", "notaObtenida" => 7];
$arregloFavorito[4] = ["nroLegajo" => 5533, "codigoMateria" => "matematica", "notaObtenida" => 10];
$arregloFavorito[5] = ["nroLegajo" => 5687, "codigoMateria" => "ingles", "notaObtenida" => 8];
$arregloFavorito[6] = ["nroLegajo" => 2376, "codigoMateria" => "matematica", "notaObtenida" => 4];
$arregloFavorito[7] = ["nroLegajo" => 3423, "codigoMateria" => "ingles", "notaObtenida" => 8];
$arregloFavorito[8] = ["nroLegajo" => 3421, "codigoMateria" => "matematica", "notaObtenida" => 4];

function incisoA($arregloFavorito, $materia) {
    $contador = 0;
    for ($i=0; $i < count($arregloFavorito); $i++) { 
        if($arregloFavorito[$i]["codigoMateria"] === $materia) {
            $contador++;
        }
    }

    return $contador;
}
$cantidadAlumnos = incisoA($arregloFavorito, "matematica");
echo "La cantidad de alumnos que rindieron esa materia son de " . $cantidadAlumnos . " chicos\n";

/* ------------------------------------------------------------------------------------------------------------ */

function incisoB($arregloFavorito, $materia) {
    $cantRindieron = incisoA($arregloFavorito, $materia);
    $porcentaje = ($cantRindieron * 100) / count($arregloFavorito);
    
    return $porcentaje;
}

$porcentajeAlumnos = incisoB($arregloFavorito, "matematica");
echo "El porcentaje de alumnos que rindieron la materia matemática es de %" . $porcentajeAlumnos;

/* ------------------------------------------------------------------------------------------------------------ */

function incisoC($arregloFavorito) {
    for ($i=0; $i < count($arregloFavorito); $i++) { 
        $notaMenor = 0;
        $notaMateria = $arregloFavorito[$i]["notaObtenida"]; 
    }
}
/* ------------------------------------------------------------------------------------------------------------ */