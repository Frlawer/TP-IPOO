<?php
class Persona
{
    private $nombre;
    private $apellido;
    private $tipo;
    private $numero;

    public function __construct($nombre, $apellido, $tipo, $numero)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipo = $tipo;
        $this->numero = $numero;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function __toString()
    {
        return '(Nombre: ' . $this->nombre . ', Apellido: ' . $this->apellido . ', Tipo: ' . $this->tipo . ', Número: ' . $this->numero . ')';
    }
}
