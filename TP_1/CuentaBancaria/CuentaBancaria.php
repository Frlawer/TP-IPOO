<?php
class CuentaBancaria
{
    private $nCuenta;
    private $dni;
    private $saldoActual;
    private $interesAnual;

    public function __construct($nCuenta, $dni, $saldoActual, $interesAnual)
    {
        $this->setNCuenta($nCuenta);
        $this->setDni($dni);
        $this->setSaldoActual($saldoActual);
        $this->setInteresAnual($interesAnual);
    }

    public function getNCuenta()
    {
        return $this->nCuenta;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function getSaldoActual()
    {
        return $this->saldoActual;
    }

    public function getInteresAnual()
    {
        return $this->interesAnual;
    }

    public function setNCuenta($nCuenta)
    {
        $this->nCuenta = $nCuenta;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function setSaldoActual($saldoActual)
    {
        $this->saldoActual = $saldoActual;
    }

    public function setInteresAnual($interesAnual)
    {
        $this->interesAnual = $interesAnual;
    }

    public function actualizarSaldo()
    {
        $this->setSaldoActual($this->getSaldoActual() + ($this->getInteresAnual() / 365));
    }

    public function depositar($cant)
    {
        $this->setSaldoActual($this->getSaldoActual() + $cant);
    }

    public function retirar($cant)
    {
        if ($this->getSaldoActual() > $cant) {
            $this->setSaldoActual($this->getSaldoActual()  - $cant);
        } else {
            return 'Saldo insuficiente';
        }
    }

    public function __toString()
    {
        return '( Numero de cuenta: ' . $this->getNCuenta() . ', DNI: ' . $this->getDni() . ', Saldo Actual: ' . $this->getSaldoActual() . ', Interes Anual: ' . $this->getInteresAnual() . ')';
    }
}
