<?php
class Prestamo
{
    private $id;
    private $codigo;
    private $fecha;
    private $monto;
    private $cantidad_de_cuotas;
    private $tazaInteres;
    private $colCuotas;
    private $persona;

    public function __construct($id, $monto, $cantCuotas, $tazaInteres, $persona)
    {
        $this->setId($id);
        $this->setMonto($monto);
        $this->setCantidad_de_cuotas($cantCuotas);
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

    public function getCantidad_de_cuotas()
    {
        return $this->cantidad_de_cuotas;
    }

    public function setCantidad_de_cuotas($cantCuotas)
    {
        $this->cantidad_de_cuotas = $cantCuotas;
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
     * Calcula el interes de la cuota según el numero de cuota.
     * @param int $numCuota
     * @return bool
     */
    private function calcInteresPrestamo($numCuota)
    {
        $interes = $this->getTazaInteres();
        $monto = $this->getMonto();
        $cantCuotas = $this->getCantidad_de_cuotas();
        $interesNumCuota = ($monto - (($monto / $cantCuotas) * $numCuota - 1)) * $interes / 0.01;
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
        $colCuotas = [];
        $cantCuotas = $this->getCantidad_de_cuotas();
        $monto = $this->getMonto();

        $montoCuota = $monto / $cantCuotas;

        for ($i = 0; $i <= $cantCuotas; $i++) {
            $interes = $this->calcInteresPrestamo(($i + 1));

            $colCuotas[$i] = new Cuota(($i + 1), $montoCuota, $interes);
        }
        // seteo fecha
        $this->setFecha(getdate());
        // seteo Coleccion de cuotas
        $this->setColCuotas($colCuotas);
    }

    public function darSiguienteCuotaPagar()
    {
        $colCuotas = $this->getColCuotas();
        $existe = false;
        $i = 0;
        $siguienteCuota = null;

        while ($i < count($colCuotas) && $existe == false) {
            if ($colCuotas[$i]->getCancelada() == false) {
                $existe = true;
            }
            $i++;
        }

        if ($existe == true) {
            $siguienteCuota = $colCuotas[$i];
        }

        return $siguienteCuota;
    }

    public function __toString()
    {
        return "\n Id: " . $this->getId() .
            "\n Codigo: " . $this->getCodigo() .
            "\n fecha: " . $this->getfecha() .
            "\n Monto: " . $this->getMonto() .
            "\n Cantidad de Cuotas: " . $this->getCantidad_de_cuotas() .
            "\n Taza de Interes: " . $this->getTazaInteres() .
            "\n Coleccion Cuotas: " . $this->getColCuotas() .
            "\n Persona: " . $this->getPersona();
    }
}
