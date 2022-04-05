<?php
include 'Teatro.php';
$funciones = array(
    1 => [
        "nombre" => "funcion 1",
        "precio" => 1010
    ],
    2 => [
        "nombre" => "funcion 2",
        "precio" => 1020
    ],
    3 => [
        "nombre" => "funcion 3",
        "precio" => 1030
    ],
    4 => [
        "nombre" => "funcion 4",
        "precio" => 1040
    ]
);

$funcion = new Teatro('Opera', 'Dirección', $funciones);
// print_r($funcion->getFuncion());
$funcion->cambiarNombreFuncion('Funcion especial', 2);
print_r(($funcion->getFuncion()));
