<?php

/**
 * Personas
 * @var nombre
 * @var 
 */
class Persona
{
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $email;
    private $telefono;
    private $neto;

    public function __construct($nombre, $apellido, $dni, $direccion, $email, $telefono, $neto)
    {
        if (is_string($nombre) && is_string($apellido) && is_numeric($id) && is_string($direccion) && is_string($email) && is_numeric($telefono) && is_numeric($neto)) {
            $this->setNombre($nombre);
            $this->setApellido($apellido);
            $this->setDni($dni);
            $this->setDireccion($direccion);
            $this->setEmail($email);
            $this->setTelefono($telefono);
            $this->setNeto($neto);
        } else throw new ErrorException("x e y deben ser valores numérico");
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
            "\n DNI: " . $this->getDni() .
            "\n Dirección: " . $this->getDireccion() .
            "\n Email: " . $this->getEmail() .
            "\n Teléfono: " . $this->getTelefono() .
            "\n Neto: " . $this->getNeto();
    }
}
