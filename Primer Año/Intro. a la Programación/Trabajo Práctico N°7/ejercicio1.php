<?php

/**
 * (a)
 * Solicita al usuario diversas temperaturas y las almacena en un array
 * @param float $n
 * @return float
 */

function leerTemperaturas($n) {
    /* int $i 
        float $temperaturas*/
    $temperaturas = [];
    for ($i=0; $i < $n; $i++) { 
        echo "Ingrese la temperatura: ";
        $temperaturas[$i] = trim(fgets(STDIN));
    }
    echo "La cantidad de temperaturas ingresadas son: " . count($temperaturas) . "\n";
    return $temperaturas;
}

// echo "¿Cuántas temperaturas desea ingresar?: ";
// $numeros = trim(fgets(STDIN));
// $valor = leerTemperaturas($numeros);

/* El tipo de datos que almacena la colección es de tipo float */

/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/**
 * (b)
 * Lista todas las temperaturas de un array como parámetro
 * @param int
 * @return 
 */

function listarTemperaturas($tempParam) {
    for ($i = 0; $i < count($tempParam); $i++) {
        echo "Temperatura N°" . $i . ": " . $tempParam[$i] . "°C" . "\n";
    }
    return;
}

// echo listarTemperaturas($valor);
/* Realiza un recorrido exahustivo ya que accedemos a todos los elementos dentro del arreglo. */

/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/**
 * (c)
 * Dado como parámetro un arreglo de temperaturas, retorna el promedio de temperaturas
 * @param int $
 * @return float
 */

function promTemperaturas($tempParam) {
    /* float $sumaTemp, $promedio */
    $sumaTemp = 0;
    for($i = 0; $i < count($tempParam); $i++) {
        $sumaTemp = $sumaTemp + $tempParam[$i];
    }
    $promedio = $sumaTemp / count($tempParam);
    return $promedio;
}

// echo promTemperaturas($valor);

/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/**
 * (d)
 * Dado un arreglo como parámetro, si tenemos una temperatura determinada, debemos
 * obtener el porcentaje que supere a esa temperatura determinada
 * @param int
 * @return float
 */

function porcTemperaturasSuperiores($tempParam) {
    /* int $tempDeterminada, $tempSuperiores */
    /* float $porcentaje */
    $tempDeterminada = 25;
    $tempSuperiores = 0;
    for($i = 0; $i < count($tempParam); $i++) {
        if ($tempParam[$i] > $tempDeterminada) {
            $tempSuperiores++;
        }
    }
    $porcentaje = ($tempSuperiores * 100) / count($tempParam);
    return $porcentaje;
}

// echo porcTemperaturasSuperiores($valor);

/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/**
 * (e)
 * Dado como parámetro un arreglo de varias temperaturas, esta función retorna
 * la mínima temperatura.
 * @param int
 * @return int
 */

function minTemperatura($tempParam) {
    /* int $tempMenor */
    $tempMenor = 999;
    for($i = 0; $i < count($tempParam); $i++) {
        if ($tempParam[$i] < $tempMenor) {
            $tempMenor = $tempParam[$i];
        }
    }
    return $tempMenor;
}

// echo minTemperatura($valor);

/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/**
 * (f)
 * Dado como parámetro un arreglo de varias temperaturas, esta función retorna
 * la máxima temperatura.
 * @param int
 * @return int
 */

function maxTemperatura($tempParam) {
    /* int $tempMayor */
    $tempMayor = 0;
    for($i = 0; $i < count($tempParam); $i++) {
        if ($tempParam[$i] > $tempMayor) {
            $tempMayor = $tempParam[$i];
        }
    }
    return $tempMayor;
}

// echo maxTemperatura($valor) . "\n";

/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/**
 * (g)
 * Dado como parámetro una colección de temperaturas, retorna un arreglo asociativo
 * que en la clave "min" va la menor temperatura y en la clave "max" la mayor
 * @param int
 * @return int
 */

function extremosTemperaturas($tempParam) {
    /* */
    $tempMaxima = maxTemperatura($tempParam);
    $tempMinima = minTemperatura($tempParam);
    $variasTemps = [];
    $variasTemps = [
        "max" => $tempMaxima,
        "min" => $tempMinima
    ];
    return $variasTemps;
}

// $temperaturas = extremosTemperaturas($valor);

// print_r($temperaturas["max"]);
// print_r($temperaturas["min"]);

/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* PROGRAMA Principal */
/* Se probarán los algoritmos creados anteriormente para verificar si los resultados que retornan son correctos */
/*  */

echo "¿Cuántas temperaturas desea ingresar?: ";
$cantTemps = trim(fgets(STDIN));
echo "---- Inciso (a) ----\n";
$temperaturas = leerTemperaturas($cantTemps);

echo "---- Inciso (b) ----\n";
$listaTemps = listarTemperaturas($temperaturas);

echo "---- Inciso (c) ----\n";
$promTemps = promTemperaturas($temperaturas);
echo "El promedio de las temperaturas es: " . $promTemps . "\n";

echo "---- Inciso (d) ----\n";
$porcTemps = porcTemperaturasSuperiores($temperaturas);
echo "El porcentaje de las temperaturas superiores a los 25°C es de: " . $porcTemps . "%\n";

echo "---- Inciso (e) ----\n";
$minTemp = minTemperatura($temperaturas);
echo "La mínima temperatura de las ingresadas por el usuario es: " . $minTemp . "°C\n";

echo "---- Inciso (f) ----\n";
$maxTemp = maxTemperatura($temperaturas);
echo "La máxima temperatura de las ingresadas por el usuario es: " . $maxTemp . "°C\n";

echo "---- Inciso (g) ----\n";
$extremasTemps = extremosTemperaturas($temperaturas);
$maximaTemp = print_r($extremasTemps["max"]);
$minimaTemp = print_r($extremasTemps["min"]);
echo 'La temperatura mínima en la clave "min" es ' . $minimaTemp . "°C";
echo 'La temperatura máxima en la clave "max" es ' . $maximaTemp . "°C";

?>