<?php

class Persona {
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto;

    public function __construct($nombre, $apellido, $dni, $direccion, $mail, $telefono, $neto)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
        $this->neto = $neto;
    }

    // Métodos de acceso

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function getDireccion()
    {
        return $this->direccion;
    } 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
 
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getNeto()
    {
        return $this->neto;
    }
    public function setNeto($neto)
    {
        $this->neto = $neto;
    }

    public function __toString()
    {
        return "------------------------\n";
                $this->getNombre() . " " . $this->getApellido() . "\n" .
                "Dirección: " . $this->getDireccion() . "\n" . 
                "E-Mail: " . $this->getMail() . "\n" .
                "Teléfono: " . $this->getTelefono() . "\n" .
                "Neto: $" . $this->getNeto();
    }
}










?>