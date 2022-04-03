<?php

/**
 * (1)
 * Dada una estructura de arreglos asociativos, donde cada posición almacena un arreglo con la cantidad 
 * recaudada (en pesos) y costo total (en pesos), en el que cada mes del año se corresponde con la posición del 
 * arreglo dentro del otro arreglo; implementar un algoritmo que calcule cuál fue el mes que arrojó mayor 
 * ganancia. 
 */

$capital = [
    ["ganancia" => 5000, "costoTotal" => 3000,"mes" => "Agosto"],
    ["ganacia" => 5000, "costoTotal" => 3000,"mes" => "Agosto"]
];

function mayorGanancia() {
 // ?
}

/**
 * (2)
 * Se calcula a partir de un arreglo de empleados el sueldo de cada empleado
 * respecto de su antiguedad
 * @param array $empleados
 * @return array
 */

$empleados = [
    [
        "nombre" => "Mirko",
        "sueldo" => 50000,
        "antiguedad" => 10
    ],
    [
        "nombre" => "Lautaro",
        "sueldo" => 60000,
        "antiguedad" => 14
    ],
    [
        "nombre" => "Gabriela",
        "sueldo" => 100000,
        "antiguedad" => 20
    ],
    [
        "nombre" => "Francisco",
        "sueldo" => 30000,
        "antiguedad" => 3
    ]
];

function sueldoEmpleado($empleados) {

    for($i = 0; $i < count($empleados); $i++) {
        if($empleados[$i]["antiguedad"] >= 10) {
            $sueldoCompleto = $empleados[$i]["sueldo"] * 1.5;
            $empleadosACobrar[$i] = [
                "nombre" => $empleados[$i]["nombre"],
                "sueldoCobrar" => $sueldoCompleto
            ];
        } else {
            $sueldoCompleto = $empleados[$i]["sueldo"] * 1.25;
            $empleadosACobrar[$i] = [
                "nombre" => $empleados[$i]["nombre"],
                "sueldoCobrar" => $sueldoCompleto
            ];
        }
    }
    return $empleadosACobrar;
}

var_dump(sueldoEmpleado($empleados));