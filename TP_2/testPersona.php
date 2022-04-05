<?php
include 'Persona.php';
$persona = new Persona('Jose', 'Gomez', 'DNI', '32989013');
echo $persona->getNombre();
echo "\n";
echo $persona->getApellido();
echo "\n";
echo $persona->getTipo();
echo "\n";
echo $persona->getNumero();
