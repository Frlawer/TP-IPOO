<?php
include "Cuota.php";
class Prestamo
{
    private $id;
    private $codigo;
    private $fecha;
    private $monto;
    private $cantCuotas;
    private $tazaInteres;
    private $colCuotas;
    private $persona;

    public function __construct($id, $monto, $cantCuotas, $tazaInteres, $persona)
    {
        $this->setId($id);
        $this->setMonto($monto);
        $this->setCantCuotas($cantCuotas);
        $this->setTazaInteres($tazaInteres);
        $this->setPersona($persona);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getMonto()
    {
        return $this->monto;
    }

    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    public function getCantCuotas()
    {
        return $this->cantCuotas;
    }

    public function setCantCuotas($cantCuotas)
    {
        $this->cantCuotas = $cantCuotas;
    }

    public function getTazaInteres()
    {
        return $this->tazaInteres;
    }

    public function setTazaInteres($tazaInteres)
    {
        $this->tazaInteres = $tazaInteres;
    }

    public function getColCuotas()
    {
        return $this->colCuotas;
    }

    public function setColCuotas($colCuotas)
    {
        $this->colCuotas = $colCuotas;
    }

    public function getPersona()
    {
        return $this->persona;
    }

    public function setPersona($persona)
    {
        $this->persona = $persona;
    }

    /**
     * calcInteresPrestamo
     *
     * @param int $numCuota
     * @return bool
     */
    private function calcInteresPrestamo($numCuota)
    {
        $interes = $this->getTazaInteres();
        $monto = $this->getMonto();

        $interesNumCuota = ($monto - (($monto / $numCuota) * $numCuota - 1)) * $interes;
        return $interesNumCuota;
    }

    /**
     * otrogarPrestamo
     * setea la variable instancia $fecha
     * setea la coleccion de cuotas y el valor del monto / cantidad de cuotas + interes
     * @return void
     */
    public function otorgarPrestamo()
    {
        // defino variables
        $cuotas = [];
        $cantCuotas = $this->getCantCuotas();
        $monto = $this->getMonto();

        for ($i = 1; $i <= $cantCuotas; $i++) {
            $cuotas[] = new Cuota($i, $monto, $this->calcInteresPrestamo($i));
        }

        if (count($cuotas) == $cantCuotas) {
            // seteo fecha
            $this->setFecha(getdate());
            // seteo Coleccion de cuotas
            $this->setColCuotas($cuotas);
        } else throw new Exception("No fueron cargadas las cuotas");
    }

    public function darSiguienteCuotaPagar()
    {
        $cuotas = $this->getColCuotas();

        $ultimaSinPagar = array_search("false", $cuotas);

        $siguienteCuota = ($ultimaSinPagar) ? $ultimaSinPagar : null;

        return $siguienteCuota;
    }

    public function __toString()
    {
        return "\n Id: " . $this->getId() .
            "\n Codigo: " . $this->getCodigo() .
            "\n fecha: " . $this->getfecha() .
            "\n Monto: " . $this->getMonto() .
            "\n Cantidad de Cuotas: " . $this->getCantCuotas() .
            "\n Taza de Interes: " . $this->getTazaInteres() .
            "\n Persona: " . $this->getPersona();
    }
}
