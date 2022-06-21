<?php
class Persona
{
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    public function __construct($nombre, $apellido, $dni, $telefono)
    {
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setDni($dni);
        $this->setTelefono($telefono);
    }

    public function __toString()
    {
        $string = "Nombre: " . $this->getNombre() . "\n";
        $string .= "Apellido: " . $this->getApellido() . "\n";
        $string .= "Documento: " . $this->getDni() . "\n";
        $string .= "Teléfono: " . $this->getTelefono() . "\n";

        return $string;
    }

    /** ###################'Getters & Setters'#################### */
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

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
}
