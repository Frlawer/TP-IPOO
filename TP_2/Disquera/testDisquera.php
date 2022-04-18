<?php
include "Disquera.php";

$horario_apertura = ["hora" => 10, "minutos" => 10];
$horario_cierre = ["hora" => 12, "minutos" => 10];

$disquera = new Disquera($horario_apertura, $horario_cierre, "cerrado", "calle 1", "Jose");
echo $disquera;

$disquera->abrirDisquera(12, 9);
echo "\n";
echo $disquera;

$disquera->cerrarDisquera(10, 9);

echo "\n";
echo $disquera;
