<?php

/* PROGRAMA adivinaAdivinador */
/* El usuario indica cual es la palabra a adivianr más la cantidad de palabras
 permitidas. Cuando finaliza el programa, va a mostrar la cantidad de palabras que
 coinciden con la palabra que se debía adivinar 
*/

/* string $palabraX, $palabraAcertada   */
/* int $aciertos, $cantPalabras, $intentos, $i  */

$aciertos = 0;

echo "Ingrese la palabra X a adivinar: ";
$palabraX = trim(fgets(STDIN));
echo "¿Cuántas palabras desea que ingrese el jugador?: ";
$cantPalabras = trim(fgets(STDIN));
$intentos = $cantPalabras;

if ($cantPalabras > 0) {
    for ($i = 0; $i < $cantPalabras; $i++) {
        echo "Ingrese la palabra a adivinar, tenés " . $intentos .  " intentos: ";
        $palabraAcertada = trim(fgets(STDIN));
        if ($palabraAcertada == $palabraX) {
            $aciertos++;
        }
        $intentos--;
    }
    echo "Se acertaron un total de " . $aciertos . " palabras";
} else {
    echo "No hay secuencia de Palabras para analizar";
}


?>