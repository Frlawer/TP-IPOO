<?php
class Libro
{
    private $isbn;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $nombre;
    private $apellido;

    public function __construct($isbn, $titulo, $anioEdicion, $editorial, $nombre, $apellido)
    {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anioEdicion = $anioEdicion;
        $this->editorial = $editorial;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getAnioEdicion()
    {
        return $this->anioEdicion;
    }
    public function getEditorial()
    {
        return $this->editorial;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }

    public function __toString()
    {
        return "(" . $this->getIsbn() . "," . $this->getTitulo() . "," . $this->getAnioEdicion() . "," . $this->getEditorial() . "," . $this->getNombre() . "," . $this->getApellido() . ".";
    }

    public function perteneceEditorial($peditorial)
    {
        ($peditorial === $this->getEditorial()) ? true : false;
    }


    public function iguales($pLibro, $datos)
    {
        foreach ($datos as $key => $value) {
            ($pLibro === $datos['titulo']) ? 'true' : 'false';
        }
    }
}

$datos = [
    'isbn' => '25829',
    'titulo' => 'tituloLibro',
    'editorial' => 'laprida',
    'nombre' => 'nombreautor',
    'apellido' => 'apellidoautor'
];
$ehao = new Libro('', '', '', '', '', '', '');
echo $ehao->iguales($datos['titulo'], $datos);
