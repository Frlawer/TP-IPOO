<?php
class CuentaBancaria
{
    private $nCuenta;
    private $persona;
    private $saldoActual;
    private $interesAnual;

    public function __construct($nCuenta, $persona, $saldoActual, $interesAnual)
    {
        $this->setNCuenta($nCuenta);
        $this->setPersona($persona);
        $this->setSaldoActual($saldoActual);
        $this->setInteresAnual($interesAnual);
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


    public function getNCuenta()
    {
        return $this->nCuenta;
    }

    public function setNCuenta($nCuenta)
    {
        $this->nCuenta = $nCuenta;

        return $this;
    }

    public function getPersona()
    {
        return $this->persona;
    }

    public function setPersona($persona)
    {
        $this->persona = $persona;

        return $this;
    }

    public function getSaldoActual()
    {
        return $this->saldoActual;
    }

    public function setSaldoActual($saldoActual)
    {
        $this->saldoActual = $saldoActual;

        return $this;
    }

    public function getInteresAnual()
    {
        return $this->interesAnual;
    }

    public function setInteresAnual($interesAnual)
    {
        $this->interesAnual = $interesAnual;

        return $this;
    }

    public function __toString()
    {
        return "\n Número de Cuenta: " . $this->getNCuenta() .
            "\n Persona: " . $this->getPersona() .
            "\n Saldo Actual: " . $this->getSaldoActual() .
            "\n Interes Anual: " . $this->getInteresAnual();
    }
}
