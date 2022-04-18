<?php
include 'CuentaBancaria.php';
include './TP_2/Persona.php';
$persona = new Persona("jose", "juarez", "calle 1", "email@email.com", 2995839532, 10000);

$cuenta = new CuentaBancaria(124125, $persona, 10, 50);
$cuenta->actualizarSaldo();
$cuenta->depositar(10);
echo $cuenta->retirar(22);
echo "\n";
echo $cuenta;
