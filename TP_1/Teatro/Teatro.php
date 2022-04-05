<?php
class Teatro
{
    private $nombre;
    private $direccion;
    private $funcion;

    public function __construct(
        $nombre,
        $direccion,
        $funcion
    ) {
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
        $this->setFuncion($funcion);
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccionNueva)
    {
        $this->direccion = $direccionNueva;
    }

    public function getFuncion()
    {
        return $this->funcion;
    }

    public function setFuncion($funcion)
    {
        $this->funcion = $funcion;
    }

    public function cambiarNombreFuncion($nombreFuncion, $numeroFuncion)
    {
        $this->funcion[$numeroFuncion]['nombre'] == $nombreFuncion;
    }

    public function __toString()
    {
        return "(" . $this->getnombre() . "," . $this->getDireccion() . "," . ($this->getFuncion())[2]['nombre'] . ")";
    }
}
