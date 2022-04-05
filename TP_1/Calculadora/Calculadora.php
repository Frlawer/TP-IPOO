<?php
class Calculadora
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function sumar()
    {
        return $this->a + $this->b;
    }

    public function restar()
    {
        return $this->a - $this->b;
    }

    public function multiplicar()
    {
        return $this->a * $this->b;
    }

    public function dividir()
    {
        return $this->a / $this->b;
    }

    public function __toString()
    {
        return 'Parametro $a:(' . $this->a . ') ; Parametro $b: (' . $this->b . ');';
    }
}
