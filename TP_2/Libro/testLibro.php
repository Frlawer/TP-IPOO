<?php
include "Libro.php";
$libros = array(
    0 => array(2425, "Libro 1", 2011, "editorial", "jose", "pepe"),
    1 => array(145346, "libro 2", 2020, "editorial 2", "juan", "jose")
);

$autor = ["nombre" => "Francisco", "apellido" => "Rodriguez"];
$nuevoLibro = new Libro(13244,  "Titulo del libro", 2010, "laprida", 110, "Sinopsis", $autor);
var_dump($nuevoLibro->perteneceEditorial("laprida"));
echo $nuevoLibro;
