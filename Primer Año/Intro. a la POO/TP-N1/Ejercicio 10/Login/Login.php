<?php

class Login {
    private $nombreUsuario;
    private $password;
    private $frase;
    private $backupPasswords = [];

    public function __construct($nombreUsuario, $password, $frase)
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->password = $password;
        $this->frase = $frase;
    }

    public function getUsuario() {
        return $this->nombreUsuario;
    }
    public function setUsuario($nombre) {
        return $this->nombreUsuario = $nombre;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        return $this->password = $password;
    }
    public function getFrase() {
        return $this->frase;
    }
    public function setFrase($frase) {
        return $this->frase = $frase;
    }

    // Método para recordar frase
    public function remember() {
        return $this->getFrase();
    }

    public function validarPassword($validatePassword) {
        $validacion = true;
        if ($this->getPassword() === $validatePassword) {
            $validacion = true;
        } else {
            $validacion = false;
        }
        return $validacion;
    }

    public function cambiarPassword($newPassword) {
        $validacion = true;
        if ( !in_array($newPassword, $this->backupPasswords) ) {
            $this->password = $newPassword;
            array_unshift($this->backupPasswords, $this->password);

            if(count($this->backupPasswords) > 4) {
                array_pop($this->backupPasswords);
            }
            $validacion = true;
        } else {
            $validacion = false;
        }

        return $validacion;
    }

    public function __toString()
    {
        return "El usuario es " . $this->getUsuario() . " su password es " . $this->getPassword() . " y su frase de recuperación " . $this->getFrase() . "\n";
    }
}
