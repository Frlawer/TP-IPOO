<?php
class Lectura
{
    private $libro;
    private $pagina;

    public function __construct($libro, $pagina)
    {
        $this->setLibro($libro);
        $this->setPagina($pagina);
    }

    public function getLibro()
    {
        return $this->libro;
    }

    public function setLibro($libro)
    {
        $this->libro = $libro;
    }

    public function getPagina()
    {
        return $this->pagina;
    }

    public function setPagina($pagina)
    {
        $this->pagina = $pagina;
    }

    public function siguientePagina()
    {
        $paginaSiguiente = $this->getPagina();
        $this->setPagina($paginaSiguiente + 1);
        return $paginaSiguiente;
    }

    public function retrocederPagina()
    {
        $paginaAnterior = $this->getPagina();
        $this->setPagina($paginaAnterior - 1);
        return $paginaAnterior;
    }

    public function irPagina($numero)
    {
        $pagina = $this->getPagina();
        $this->setPagina($numero);
        return $pagina;
    }

    public function __toString()
    {
        return "\n Libro: " . $this->getLibro()["nombre"] .
            "\n Página: " . $this->getPagina();
    }
}
