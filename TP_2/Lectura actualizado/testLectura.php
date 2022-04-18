<?php
include "Lectura.php";

$libro = ["pagina" => 1, "nombre" => "libro nombre"];
$pagina = 43;
$lectura = new Lectura($libro, $pagina);

echo $lectura->siguientePagina();
echo $lectura;
