<?php
class Persona
{
    private $nombre;
    private $apellido;
    private $direccion;
    private $email;
    private $telefono;
    private $neto;

    public function __construct(
        $nombre,
        $apellido,
        $direccion,
        $email,
        $telefono,
        $neto
    ) {
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setDireccion($direccion);
        $this->setEmail($email);
        $this->setTelefono($telefono);
        $this->setNeto($neto);
    }


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

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
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
        return "\nNombre: " . $this->getNombre() .
            "\n Apellido: " . $this->getApellido() .
            "\n Dirección: " . $this->getDireccion() .
            "\n Email: " . $this->getEmail() .
            "\n Teléfono: " . $this->getTelefono() .
            "\n Neto: " . $this->getNeto();
    }
}
