<?php
class ResponsableV
{
    private $empleado;
    private $licencia;
    private $nombre;
    private $apellido;

    public function __construct($empleado, $licencia, $nombre, $apellido)
    {
        $this->setEmpleado($empleado);
        $this->setLicencia($licencia);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
    }


    public function __toString()
    {
        $string = "Número de empleado: " . $this->getEmpleado() . "\n";
        $string .= "Número de Licencia: " . $this->getLicencia() . "\n";
        $string .= "Nombre: " . $this->getNombre() . "\n";
        $string .= "Apellido: " . $this->getApellido() . "\n";

        return $string;
    }

    /** ###################'Getters & Setters'#################### */
    public function getEmpleado()
    {
        return $this->empleado;
    }

    public function setEmpleado($empleado)
    {
        $this->empleado = $empleado;
    }

    public function getLicencia()
    {
        return $this->licencia;
    }

    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;
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
}
