<?php
include 'Login.php';
$login = new Login('Fran', '123123', 'la frase', array('1 frase', '2 frase', '3 frase', '4 frase'));
// print_r($login->getUltimas());
print_r($login->cambiarPass('1251kjh'));
print_r($login->getPass());
