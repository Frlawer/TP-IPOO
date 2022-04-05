<?php
include 'Fecha.php';
$fechaOtra = '28/02/2020';
$fecha = new Fecha('23/12/2021/123');
echo $fecha->incrementaDia('1', $fechaOtra);
