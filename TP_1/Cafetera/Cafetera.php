<?php
class Cafetera
{
    private $capacidadMaxima;
    private $cantidadActual;

    public function __construct($capMax, $cantAct)
    {
        $this->setCapacidadMaxima($capMax);
        $this->setCantidadActual($cantAct);
    }

    public function getCapacidadMaxima()
    {
        return $this->capacidadMaxima;
    }

    public function getCantidadActual()
    {
        return $this->cantidadActual;
    }

    public function setCapacidadMaxima($capMax)
    {
        $this->capacidadMaxima = $capMax;
    }

    public function setCantidadActual($cantAct)
    {
        $this->cantidadActual = $cantAct;
    }

    public function llenarCafetera()
    {
        $this->setCantidadActual($this->getCapacidadMaxima());
    }

    public function servirTaza($cantidad)
    {
        $cantidadServida = 0;
        $msj = '';
        if ($this->getCantidadActual() < $cantidad) {
            $cantidadServida = $this->getCantidadActual();
            $msj = 'La cantidad actual de cafe no alcanza para llenar la taza';
        } else {
            $cantidadServida = $cantidad;
            $msj = 'Taza servida con la cantidad ' . $cantidad;
        }
        return $msj;
    }

    public function vaciarCafetera()
    {
        $this->setCantidadActual(0);
    }

    public function agregarCafe($cantidad)
    {
        return (($this->getCantidadActual() + $cantidad) <= $this->getCapacidadMaxima()) ? $this->setCantidadActual($cantidad) : 'No es posible agregar cafe. La capacidad de la cafetera no es suficiente.';
    }

    public function __toString()
    {
        return '( Capacidad Maxima: ' . $this->getCapacidadMaxima() . ', Cantidad Actual:' . $this->getCantidadActual() . ')';
    }
}
