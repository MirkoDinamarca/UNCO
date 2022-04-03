<?php

/**
 * Selecciona el número de 4 dígitos y lo encripta
 * @param int $numeroIngresado
 * @return int
 */

function encriptar($numeroIngresado) {
    /* $numero1, $numero2, $numero3, $numero4, $residuo, $digitosEncriptados */
    $numero1 = (int)($numeroIngresado / 1000);
    $residuo = $numeroIngresado % 1000;
    $numero2 = (int)($residuo / 100);
    $residuo = $residuo % 100;
    $numero3 = (int)($residuo / 10);
    $residuo = $residuo % 10;
    $numero4 = $residuo;
    $numero1 = ($numero1 + 7) % 10;
    $numero2 = ($numero2 + 7) % 10;
    $numero3 = ($numero3 + 7) % 10;
    $numero4 = ($numero4 + 7) % 10;
    $digitosEncriptados = ($numero3 * 1000) + ($numero4 * 100) + ($numero1 * 10) + $numero2;
    return $digitosEncriptados;
}

/**
 * Selecciona los 4 números encriptados y los desencripta
 * @param int $numeroEncriptado
 * @return int
 */

function desencriptar($numeroEncriptado) {
    /* $numero1, $numero2, $numero3, $numero4, $residuo, $digitosDesencriptados */
    $numero1 = (int)($numeroEncriptado / 1000);
    $residuo = $numeroEncriptado % 1000;
    $numero2 = (int)($residuo / 100);
    $residuo = $residuo % 100;
    $numero3 = (int)($residuo / 10);
    $residuo = $residuo % 10;
    $numero4 = $residuo;
    $numero1 = ($numero1 + 3) % 10;
    $numero2 = ($numero2 + 3) % 10;
    $numero3 = ($numero3 + 3) % 10;
    $numero4 = ($numero4 + 3) % 10;
    $digitosDesencriptados = ($numero3 * 1000) + ($numero4 * 100) + ($numero1 * 10) + $numero2;
    return $digitosDesencriptados;
}

/* PROGRAMA mensajeUsuario */
/* Selecciona los números que ingresa el usuario para luego encriptarlos y desencriptarlos */
/* int $numeroUsuario, $cifrado, $descifrado */

echo "Por favor, ingrese cuatro dígitos: ";
$numeroUsuario = trim(fgets(STDIN));

if ($numeroUsuario < 999) {
    echo "¡ERROR! El número debe ser de cuatro dígitos";
} else {
    $cifrado = encriptar($numeroUsuario);
    echo "El mensaje se ha encriptado, es el siguiente: " . $cifrado . "\n";
    $descifrado = desencriptar($cifrado);
    echo "El mensaje se ha desencriptado, es el siguiente: " . $descifrado;
}

?>