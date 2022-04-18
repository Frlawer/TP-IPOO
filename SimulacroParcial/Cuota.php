<?php
class Cuota
{
    private $numero;
    private $montoCuota;
    private $montoInteres;
    private $cancelada;

    public function __construct($numero, $montoCuota, $montoInteres)
    {
        $this->setNumero($numero);
        $this->setMontoCuota($montoCuota);
        $this->setMontoInteres($montoInteres);
        $this->setCancelada(false);
    }
    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getMontoCuota()
    {
        return $this->montoCuota;
    }

    public function setMontoCuota($montoCuota)
    {
        $this->montoCuota = $montoCuota;
    }

    public function getMontoInteres()
    {
        return $this->montoInteres;
    }

    public function setMontoInteres($montoInteres)
    {
        $this->montoInteres = $montoInteres;
    }

    public function getCancelada()
    {
        return $this->cancelada;
    }

    public function setCancelada($cancelada)
    {
        $this->cancelada = $cancelada;
    }

    /**
     * darMontoFinalCuota function
     * Implementar el método darMontoFinalCuota() que retorna el importe total de la cuota mas los intereses que deben ser aplicados
     * @return int
     */
    public function darMontoFinalCuota()
    {
        $montoCuota = $this->getMontoCuota();
        $montoInteres = $this->getMontoInteres();

        $importeTotal = $montoCuota + $montoInteres;

        return $importeTotal;
    }

    public function __toString()
    {
        return "\n Numero: " . $this->getNumero() .
            "\n Monto Cuota: " . $this->getMontoCuota() .
            "\n Monto Interes: " . $this->getMontoInteres() .
            "\n Cancelada: " . $this->getCancelada();
    }
}
