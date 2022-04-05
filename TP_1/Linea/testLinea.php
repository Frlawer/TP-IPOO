<?php
include 'Linea.php';
$linea = new Linea(3, 3, 4, 4);
$linea->mueveDerecha(5);
$linea->mueveArriba(5);
$linea->mueveAbajo(5);
$linea->mueveIzquierda(5);
print_r($linea->__toString());
