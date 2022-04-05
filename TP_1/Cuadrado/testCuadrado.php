<?php
include 'Cuadrado.php';

$v1 = ["x" => 0, "y" => 5];
$v2 = ["x" => 5, "y" => 5];
$v3 = ["x" => 5, "y" => 0];
$v4 = ["x" => 0, "y" => 0];

$vertice = ['x' => 3, 'y' => 4];
$objCuadrado = new Cuadrado($v1, $v2, $v3, $v4);
$area = $objCuadrado->area();
echo $area;

print_r($objCuadrado->aumentar($vertice));


print_r($objCuadrado->__toString());
