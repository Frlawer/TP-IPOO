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
        $this->isbn = is_int($isbn);
        $this->titulo = is_string($titulo);
        $this->anioEdicion = is_int($anioEdicion);
        $this->editorial = is_string($editorial);
        $this->nombre = is_string($nombre);
        $this->apellido = is_string($apellido);
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
        return (in_array($pLibro, $datos)) ? true : false;
    }

    public function aniosDesdeEdicion()
    {
        $datetime1 = new DateTime('Y');
        $datetime2 = new DateTime($this->anioEdicion);
        $interval = $datetime1->diff($datetime2);
        echo $interval->format('%Y años');
    }
}

$datos = [
    'isbn' => 25829,
    'titulo' => 'tituloLibro',
    'anioEdicion' => 2017,
    'editorial' => 'laprida',
    'nombre' => 'nombreautor',
    'apellido' => 'apellidoautor'
];

$ehao = new Libro($datos['isbn'], $datos['titulo'], $datos['anioEdicion'], $datos['editorial'], $datos['nombre'], $datos['apellido']);

// echo $ehao->aniosDesdeEdicion();
// $resultado = $ehao->iguales($datos['titulo], $datos);
// print_r($resultado);
$ehao->aniosDesdeEdicion();
