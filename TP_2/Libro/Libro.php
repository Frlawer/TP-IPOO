<?php
class Libro
{
    private $isbn;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $paginas;
    private $sinopsis;
    private $autor;

    public function __construct(
        $isbn,
        $titulo,
        $anioEdicion,
        $editorial,
        $paginas,
        $sinopsis,
        $autor
    ) {
        $this->setIsbn($isbn);
        $this->setTitulo($titulo);
        $this->setAnioEdicion($anioEdicion);
        $this->setEditorial($editorial);
        $this->setPaginas($paginas);
        $this->setSinopsis($sinopsis);
        $this->setAutor($autor);
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getAnioEdicion()
    {
        return $this->anioEdicion;
    }

    public function setAnioEdicion($anioEdicion)
    {
        $this->anioEdicion = $anioEdicion;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }

    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }

    public function getPaginas()
    {
        return $this->paginas;
    }

    public function setPaginas($paginas)
    {
        $this->paginas = $paginas;
    }

    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }


    public function perteneceEditorial($pEditorial)
    {
        if ($pEditorial = $this->getEditorial()) {
            $retorno = true;
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    public function aniosDesdeEdicion()
    {
        $anioEdicion = $this->getAnioEdicion();
        $anioActual = date('Y');
        $interval = $anioActual - $anioEdicion;
        return $interval;
    }

    public function iguales($pLibro, $pArreglo)
    {
        $retorno = false;
        if (in_array($pLibro, $pArreglo)) {
            $retorno = true;
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    public function libroDeEditoriales($arregloLibros, $pEditorial)
    {
        $arregloEditoriales = [];
        foreach ($arregloLibros as $key => $value) {
            if ($value == $pEditorial) {
                $arregloEditoriales[] = $value;
            }
        }
        return $arregloEditoriales;
    }

    public function __toString()
    {
        return "\n ISBN: " . $this->getIsbn() .
            "\n Titulo: " . $this->getTitulo() .
            "\n Año Edición: " . $this->getAnioEdicion() .
            "\n Editorial: " . $this->getEditorial() .
            "\n Paginas: " . $this->getPaginas() .
            "\n Sinopsis: " . $this->getSinopsis() .
            "\n Nombre Autor: " . $this->getAutor()["nombre"] .
            "\n Apellido Autor: " . $this->getAutor()["apellido"];
    }
}
