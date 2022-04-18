<?php
class Lectura
{
    // Array ["isbn", "anioEdicion", "editorial", "titulo","autor", "paginas", "sinopsis", "leido"]
    private $libros;

    public function __construct($libros)
    {
        $this->setLibros($libros);
    }

    public function getLibros()
    {
        return $this->libros;
    }

    public function setLibros($libros)
    {
        $this->libros = $libros;
    }

    public function libroLeido($titulo)
    {
        $libros = $this->getLibros();
        $existeLibro = false;
        $i = 0;
        do {
            if ($libros[$i]["titulo"] == $titulo && $existeLibro != true) {
                $existeLibro = true;
            }
            $i++;
        } while ($existeLibro = false);

        return $existeLibro;
    }

    public function darSinopsis($titulo)
    {
        $libros = $this->getLibros();
        $existe = false;
        $i = 0;

        do {
            if ($libros[$i]["titulo"] == $titulo && $existe != true) {
                $sinopsis = $libros[$i]["sinopsis"];
                $existe = true;
            }
            $i++;
        } while ($existe = false);

        return $sinopsis;
    }

    public function leidosAnioEdicion($x)
    {
        $libros = $this->getLibros();
        $existen = [];
        foreach ($libros as $key => $value) {
            if ($value["leido"] == true && $value["anioEdicion"] == $x) {
                $existen[] = $key;
            }
        }
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
