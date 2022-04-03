<?php

// 2. Dado un número N retornar verdadero si el número es par y falso en caso contrario.

function esPar($num) {
    if($num % 2 === 0) {
        echo "El número " . $num . " es par";
    } else {
        echo "El número " . $num . " es impar";
    }
}

esPar(5);