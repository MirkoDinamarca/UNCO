<?php

/* PROGRAMA contemporaneidad */
/* Determina quienes tienen la misma edad entre los tres */
/* int $juan, $mario, $pedro */

echo "Ingrese la edad para Juan: ";
$juan = trim(fgets(STDIN));
echo "Ingrese la edad para Mario: ";
$mario = trim(fgets(STDIN));
echo "Ingrese la edad para Pedro: ";
$pedro = trim(fgets(STDIN));

if ($juan == $mario && $mario == $pedro) {
    echo "Son contemporáneos";
} else if ($juan == $mario) {
    echo "Juan y Mario son contemporáneos";
} else if ($juan == $pedro) { 
    echo "Juan y Pedro son contemporáneos";
} else if ($mario == $pedro) {
    echo "Mario y Pedro son contemporáneos";
} else if ($juan != $mario && $mario != $pedro) {
    echo "Ninguno es contemporáneo";
} 















?>