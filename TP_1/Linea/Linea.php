<?php
class Linea
{
    private $pA;
    private $pB;
    private $pC;
    private $pD;

    public function __construct($pA, $pB, $pC, $pD)
    {
        $this->setPA($pA);
        $this->setPB($pB);
        $this->setPC($pC);
        $this->setPD($pD);
    }

    public function getPA()
    {
        return $this->pA;
    }

    public function getPB()
    {
        return $this->pB;
    }

    public function getPC()
    {
        return $this->pC;
    }

    public function getPD()
    {
        return $this->pD;
    }

    public function setPA($pA)
    {
        $this->pA = $pA;
    }

    public function setPB($pB)
    {
        $this->pB = $pB;
    }

    public function setPC($pC)
    {
        $this->pC = $pC;
    }

    public function setPD($pD)
    {
        $this->pD = $pD;
    }

    public function mueveDerecha($d)
    {
        $this->setPA($this->getPA() + $d);
        $this->setPC($this->getPC() + $d);
    }

    public function mueveIzquierda($d)
    {
        $this->setPA($this->getPA() - $d);
        $this->setPC($this->getPC() - $d);
    }

    public function mueveArriba($d)
    {
        $this->setPA($this->getPB() + $d);
        $this->setPC($this->getPD() + $d);
    }

    public function mueveAbajo($d)
    {
        $this->setPA($this->getPB() - $d);
        $this->setPC($this->getPD() - $d);
    }

    public function __toString()
    {
        return '(Punto 1: X (' . $this->getPA() . '), Y (' . $this->getPB() . '), Punto 2: X (' . $this->getPC() . '), Y (' . $this->getPD() . ')';
    }
}
