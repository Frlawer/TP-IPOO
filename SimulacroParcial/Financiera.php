<?php
class Financiera
{
    private $denominacion;
    private $direccion;
    private $coleccionPrestamos;

    public function __construct($denominacion, $direccion)
    {
        $this->setDenominacion($denominacion);
        $this->setDireccion($direccion);
    }

    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getColeccionPrestamos()
    {
        return $this->coleccionPrestamos;
    }

    public function setColeccionPrestamos($coleccionPrestamos)
    {
        $this->coleccionPrestamos = $coleccionPrestamos;
    }

    public function incorporarPrestamo($objPrestamo)
    {
    }

    public function otorgarPrestamoSiCalifica()
    {
    }

    public function informarCuotaPagar($idPrestamo)
    {
    }

    public function __toString()
    {
        return "\n Denominacion: " . $this->getDenominacion() .
            "\n Direccion: " . $this->getDireccion();
    }
}
