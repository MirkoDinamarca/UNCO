<?php

/**
 * Registrando Encuestas
 * @return array
 */

function registrarEncuestas() {
    $registros = [];
    $contador = 0;
    do {
        echo "Nombre?: ";
        $nombre = trim(fgets(STDIN));
        echo " ¿Cantidad aproximada de dinero que piensa invertir en sus próximas vacaciones?:  ";
        $dineroAproximado = trim(fgets(STDIN));
        echo "¿Cuántas veces viajó a San Martin?: ";
        $cantSanMartin = trim(fgets(STDIN));
        echo "¿Cuántas veces viajó a Bariloche?: ";
        $cantBariloche = trim(fgets(STDIN));
        echo "¿Cuál es medio de transporte por excelencia que utiliza para sus vacaciones? (Auto o Colectivo): ";
        $transporte = trim(fgets(STDIN));
        echo "¿Desea realizar otra encuesta?(s/n)";
        $respuesta = trim(fgets(STDIN));
        $contador++;
        $registros[$contador] = [
            "nombre" => $nombre,
            "dinero" => $dineroAproximado,
            "cantsanmartin" => $cantSanMartin,
            "cantbariloche" => $cantBariloche,
            "mediotransporte" => $transporte,
        ];
    } while ($respuesta != "n");

    return $registros;
}