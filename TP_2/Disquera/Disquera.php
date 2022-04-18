<?php
class Disquera
{
    private $hora_desde;
    private $hora_hasta;
    private $estado;
    private $direccion;
    private $duenio;

    public function __construct($hora_desde, $hora_hasta, $estado, $direccion, $duenio)
    {
        $this->setHoraDesde($hora_desde);
        $this->setHoraHasta($hora_hasta);
        $this->setEstado($estado);
        $this->setDireccion($direccion);
        $this->setDuenio($duenio);
    }

    public function getHoraDesde()
    {
        return $this->hora_desde;
    }

    public function setHoraDesde($hora_desde)
    {
        $this->hora_desde = $hora_desde;
    }

    public function getHoraHasta()
    {
        return $this->hora_hasta;
    }

    public function setHoraHasta($hora_hasta)
    {
        $this->hora_hasta = $hora_hasta;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getDuenio()
    {
        return $this->duenio;
    }

    public function setDuenio($duenio)
    {
        $this->duenio = $duenio;
    }

    private function setAMin($hora, $min)
    {
        return ($hora * 60) + ($min);
    }

    private function dentroHorarioAtencion($hora, $minutos)
    {

        // separo hora apertura en hora y minutos
        $hora_apertura = $this->getHoraDesde()["hora"];
        $min_apertura = $this->getHoraDesde()["minutos"];
        $apertura = $this->setAMin($hora_apertura, $min_apertura);

        // separo hora cierre en hora y minutos
        $hora_cierre = $this->getHoraHasta()["hora"];
        $min_cierre = $this->getHoraHasta()["minutos"];
        $cierre = $this->setAMin($hora_cierre, $min_cierre);

        $esHora = $this->setAMin($hora, $minutos);

        if ($esHora < $cierre && $esHora > $apertura) {
            $retorno = true;
        } else $retorno = false;

        return $retorno;
    }

    public function abrirDisquera($hora, $minutos)
    {
        $esHorario = $this->dentroHorarioAtencion($hora, $minutos);
        if ($esHorario) {
            $this->setEstado("Abierto");
        }
    }

    public function cerrarDisquera($hora, $minutos)
    {
        $esHorario = $this->dentroHorarioAtencion($hora, $minutos);
        if (!$esHorario) {
            $this->setEstado("Cerrado");
        }
    }



    public function __toString()
    {
        return "\n Hora desde: " . $this->getHoraDesde()["hora"] . ":" . $this->getHoraDesde()["minutos"] .
            "\n Hora hasta: " . $this->getHoraHasta()["hora"] . ":" . $this->getHoraHasta()["minutos"] .
            "\n Estado: " . $this->getEstado() .
            "\n Dirección: " . $this->getDireccion() .
            "\n Dueño: " . $this->getDuenio();
    }
}
