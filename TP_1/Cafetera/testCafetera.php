<?php
include 'Cafetera.php';
$cafetera = new Cafetera(10, 4);
$cafetera->llenarCafetera();
$cafetera->vaciarCafetera();
echo $cafetera->agregarCafe(3);
echo "\n";
echo $cafetera->servirTaza(3);
echo "\n";
echo $cafetera;
