<?php
include 'Calculadora.php';

$calcular = new Calculadora(10, 2);

echo $calcular->sumar();
echo "\n";
echo $calcular->restar();
echo "\n";
echo $calcular->dividir();
echo "\n";
echo $calcular->multiplicar();
echo "\n";

echo $calcular;
