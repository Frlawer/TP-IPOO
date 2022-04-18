<?php
class Persona
{
    private $nombre;
    private $apellido;
    private $tipo;
    private $numero;

    public function __construct($nombre, $apellido, $tipo, $numero)
    {
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setTipo($tipo);
        $this->setNumero($numero);
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

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }


    public function __toString()
    {
        return "\n Nombre: " . $this->nombre .
            "\n Apellido: " . $this->apellido .
            "\n Tipo: " . $this->tipo .
            "\n Número: " . $this->numero;
    }
}
