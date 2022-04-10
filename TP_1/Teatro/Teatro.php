<?php
class Teatro
{
    private $nombre;
    private $direccion;
    private $listaFunciones;

    public function __construct($nombre, $direccion, $listaFunciones)
    {
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
        $this->setListaFunciones($listaFunciones);
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getListaFunciones()
    {
        return $this->listaFunciones;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setListaFunciones($funciones)
    {
        $this->listaFunciones = $funciones;
    }

    public function cambiarFuncion($id, $funcion)
    {
        $funciones = $this->getListaFunciones();
        $funciones[$id] = array("nombre" => $funcion['nombre'], "precio" => $funcion["precio"]);
        $this->setListaFunciones($funciones);
    }

    public function mostrarFunciones($id)
    {
        $funciones = $this->getListaFunciones();

        $txt = "\n  " . $id + 1 . ": Nombre: " . $funciones[$id]['nombre'] . ", Precio: " . $funciones[$id]['precio'];
        return $txt;
    }

    public function __toString()
    {
        return ("\n Nombre: " . $this->getNombre() .
            "\n Apellido: " . $this->getDireccion() .
            "\n Funcion: " . $this->mostrarFunciones(0) .
            "\n Funcion: " . $this->mostrarFunciones(1) .
            "\n Funcion: " . $this->mostrarFunciones(2) .
            "\n Funcion: " . $this->mostrarFunciones(3));
    }
}
