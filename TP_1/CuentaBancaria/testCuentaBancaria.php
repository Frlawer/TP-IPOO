<?php
include 'CuentaBancaria.php';
$cuenta = new CuentaBancaria(124125, 32392983, 10, 50);
$cuenta->actualizarSaldo();
$cuenta->depositar(10);
echo $cuenta->retirar(22);
echo "\n";
echo $cuenta;
