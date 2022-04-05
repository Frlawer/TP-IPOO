<?php
class Cuadrado
{
    private $v1;
    private $v2;
    private $v3;
    private $v4;

    public function __construct($v1, $v2, $v3, $v4)
    {
        $this->setV1($v1);
        $this->setV2($v2);
        $this->setV3($v3);
        $this->setV4($v4);
    }

    public function getV1()
    {
        return $this->v1;
    }
    public function getV2()
    {
        return $this->v2;
    }
    public function getV3()
    {
        return $this->v3;
    }
    public function getV4()
    {
        return $this->v4;
    }

    public function setV1($v1)
    {
        $this->v1 = $v1;
    }
    public function setV2($v2)
    {
        $this->v2 = $v2;
    }
    public function setV3($v3)
    {
        $this->v3 = $v3;
    }
    public function setV4($v4)
    {
        $this->v4 = $v4;
    }

    public function area()
    {
        $lado = ($this->getV2())['x'] - ($this->getV1())['x'];
        $calculoArea = pow($lado, 2);
        return $calculoArea;
    }

    public function desplazar($d)
    {
        $v4['x'] = ($this->getV4())['x'] + $d['x'];
        $v4['y'] = ($this->getV4())['y'] + $d['y'];
        $v3['x'] = ($this->getV3())['x'] + $d['x'];
        $v3['y'] = ($this->getV3())['y'] + $d['y'];
        $v2['x'] = ($this->getV2())['x'] + $d['x'];
        $v2['y'] = ($this->getV2())['y'] + $d['y'];
        $v1['x'] = ($this->getV1())['x'] + $d['x'];
        $v1['y'] = ($this->getV1())['y'] + $d['y'];

        return $nuevocuadrado = new Cuadrado($v1, $v2, $v3, $v4);
    }

    public function aumentar($aumentar)
    {
        $v4['x'] = ($this->getV4())['x'] - $aumentar['x'];
        $v4['y'] = ($this->getV4())['y'] - $aumentar['y'];
        $v3['x'] = ($this->getV3())['x'] + $aumentar['x'];
        $v3['y'] = ($this->getV3())['y'] - $aumentar['y'];
        $v2['x'] = ($this->getV2())['x'] + $aumentar['x'];
        $v2['y'] = ($this->getV2())['y'] + $aumentar['y'];
        $v1['x'] = ($this->getV1())['x'] - $aumentar['x'];
        $v1['y'] = ($this->getV1())['y'] + $aumentar['y'];

        return $nuevocuadrado = new Cuadrado($v1, $v2, $v3, $v4);
    }

    public function __toString()
    {
        return '( Vertice 1: ' . ($this->getV1())['x'] . '\n Vertice 2: ' . ($this->getV2())['x'] . '\n Vertice 3: ' . ($this->getV3())['x'] . '\n Vertice 4: ' . ($this->getV4())['x'];
    }
}
