<?php

include_once "BaseDatos.php";

class Empresa
{
    private $idempresa;
    private $enombre;
    private $edireccion;
    private $msjOperacion;

    public function __construct()
    {
        $this->idempresa = "";
        $this->enombre = "";
        $this->edireccion = "";
    }

    /**
     * Método encargado de cargar los datos de la empresa a la BD
     */
    public function cargarEmpresa($idempresa, $enombre, $edireccion)
    {
        $this->setIdempresa($idempresa);
        $this->setEnombre($enombre);
        $this->setEdireccion($edireccion);
    }

    public function getIdempresa()
    {
        return $this->idempresa;
    }
    public function setIdempresa($idempresa)
    {
        $this->idempresa = $idempresa;
    }

    public function getEnombre()
    {
        return $this->enombre;
    }
    public function setEnombre($enombre)
    {
        $this->enombre = $enombre;
    }

    public function getEdireccion()
    {
        return $this->edireccion;
    }
    public function setEdireccion($edireccion)
    {
        $this->edireccion = $edireccion;
    }

    public function getMsjOperacion()
    {
        return $this->msjOperacion;
    }
    public function setMsjOperacion($msjOperacion)
    {
        $this->msjOperacion = $msjOperacion;
    }

    /**
     * Inserta una empresa a la BD
     */

    public function Insertar()
    {
        $bd = new BaseDatos();
        $rta = false;
        $query = "INSERT INTO empresa(enombre, edireccion)
                  VALUES ('". $this->getEnombre() . "','" . $this->getEdireccion() . "')";

        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                $rta = true;
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }

        return $rta;
    }

    /**
     * Método para modificar una empresa de la BD
     */

    public function Modificar()
    {
        $bd = new BaseDatos();
        $rta = false;
        $query = "UPDATE empresa SET idempresa='".$this->getIdempresa()."',enombre='".$this->getEnombre()."',edireccion='".$this->getEdireccion()."'
                 WHERE idempresa=". $this->getIdempresa();

        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                $rta = true;
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }

        return $rta;
    }

    /**
     * Método para eliminar la empresa de la BD
     */

    public function Eliminar()
    {
        $bd = new BaseDatos();
        $rta = false;

        $query = "DELETE FROM empresa WHERE idempresa=" . $this->getIdempresa();

        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                $rta = true;
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }

        return $rta;
    }

    /**
     * Método para listar las empresas
     */
    public function Listar($condicion = "")
    {
        $arregloEmpresas = null;
        $bd = new BaseDatos();
        $query = "SELECT * FROM empresa ";
        if ($condicion != "") {
            $query = $query . ' WHERE ' . $condicion;
        }
        $query .= " ORDER BY idempresa ";

        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                $arregloEmpresas = [];
                while ($fila = $bd->Registro()) {

                    $idempresa = $fila['idempresa'];
                    $enombre = $fila['enombre'];
                    $edireccion = $fila['edireccion'];

                    $Obj_Empresa = new Empresa();
                    $Obj_Empresa->cargarEmpresa($idempresa, $enombre, $edireccion);
                    $arregloEmpresas[] = $Obj_Empresa;
                }
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }
        return $arregloEmpresas;
    }

    /**
     * Recupera los datos de una empresa por idempresa
     * @param int $id
     */
    public function Buscar($idempresa)
    {
        $bd = new BaseDatos();

        $query = "SELECT * FROM empresa WHERE idempresa =" . $idempresa;

        $rta = false;

        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($query)) {
                if ($fila = $bd->Registro()) {
                    $this->setIdempresa($idempresa);
                    $this->setEnombre($fila["enombre"]);
                    $this->setEdireccion($fila['edireccion']);
                    $rta = true;
                }
            } else {
                $this->setMsjOperacion($bd->getError());
            }
        } else {
            $this->setMsjOperacion($bd->getError());
        }
        return $rta;
    }

    public function __toString()
    {
        return  "N°ID: " . $this->getIdempresa() . "\n" .
                "Nombre: " . $this->getEnombre() . "\n" .
                "Dirección: " . $this->getEdireccion();
    }
}
