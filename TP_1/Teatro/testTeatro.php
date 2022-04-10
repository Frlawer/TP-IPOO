<?php
include 'Teatro.php';
$funciones = array(
    0 => array("nombre" => "funcion 1", "precio" => 200),
    1 => array("nombre" => "funcion 2", "precio" => 1020),
    2 => array("nombre" => "funcion 3", "precio" => 1030),
    3 => array("nombre" => "funcion 4", "precio" => 1040)
);
$nombre = "Opera";
$direccion = "Calle tanto";
$teatro = new Teatro($nombre, $direccion, $funciones);

$funcion1 = array('nombre' => 'Funcion Especial', 'precio' => 1);

$teatro->cambiarFuncion(1, $funcion1);

echo $teatro;
