<?php
class Libro
{
    private $isbn;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $nombre;
    private $apellido;

    public function __construct(
        $isbn,
        $titulo,
        $anioEdicion,
        $editorial,
        $nombre,
        $apellido
    ) {
        $this->setIsbn = $isbn;
        $this->setTitulo = $titulo;
        $this->setAnioEdicion = $anioEdicion;
        $this->setEditorial = $editorial;
        $this->setNombre = $nombre;
        $this->setApellido = $apellido;
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

    public function __toString()
    {
        return "\n ISBN: " . $this->getIsbn() .
            "\n Titulo: " . $this->getTitulo() .
            "\n Año Edición: " . $this->getAnioEdicion() .
            "\n Editorial: " . $this->getEditorial() .
            "\n Nombre Autor: " . $this->getNombre() .
            "\n Apellido Autor: " . $this->getApellido();
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
}
