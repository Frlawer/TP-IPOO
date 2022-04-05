<?php
class Fecha
{
    private $dia;
    private $mes;
    private $anio;

    public function __construct($fecha)
    {
        $diaMesAnio = $this->expFecha($fecha);
        if (count($diaMesAnio) == 3) {
            $this->dia = $diaMesAnio[0];
            $this->mes = $diaMesAnio[1];
            $this->anio = $diaMesAnio[2];
        } else {
            echo "Formato de fecha incorrecto. Debe ser: dd/mm/AAAA";
        }
    }

    private function expFecha($fecha)
    {
        $diaMesAnio = explode('/', $fecha, 3);
        return $diaMesAnio;
    }

    public function getDia()
    {
        return $this->dia;
    }

    public function getMes()
    {
        return $this->mes;
    }

    public function getAnio()
    {
        return $this->anio;
    }

    public function setDia($dia)
    {
        $this->dia = $dia;
    }

    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    public function fechaAbreviada()
    {
        return $this->getDia() . '/' . $this->getMes() . '/' . $this->getAnio();
    }

    public function fechaExtendida()
    {
        switch ($this->getMes()) {
            case '1':
                $mesExtendido = 'Enero';
                break;
            case '2':
                $mesExtendido = 'Febrero';
                break;
            case '1':
                $mesExtendido = 'Marzo';
                break;
            case '1':
                $mesExtendido = 'Abril';
                break;
            case '1':
                $mesExtendido = 'Mayo';
                break;
            case '1':
                $mesExtendido = 'Junio';
                break;
            case '1':
                $mesExtendido = 'Julio';
                break;
            case '1':
                $mesExtendido = 'Agosto';
                break;
            case '1':
                $mesExtendido = 'Septiembre';
                break;
            case '1':
                $mesExtendido = 'Octubre';
                break;
            case '1':
                $mesExtendido = 'Noviembre';
                break;
            case '1':
                $mesExtendido = 'Diciembre';
                break;
        }
        return $this->getDia() . " de " . $mesExtendido . " de " . $this->getAnio();
    }

    public function incrementaDia($nIncrementar, $fecha)
    {
        $diaMesAnio = $this->expFecha($fecha);
        $fecha = date($diaMesAnio[1] . '/' . $diaMesAnio[0] . '/' . $diaMesAnio[2]);
        $sumarDias = strtotime($fecha . "+ " . $nIncrementar . " days");
        $fechaSumada =  date('d/m/Y', $sumarDias);
        return $fechaSumada;
    }

    // private function anioBisiesto($anio)
    // {
    //     if (($anio % 4 == 0 && $anio % 100 != 0) || $anio % 400 == 0) {
    //         $anioBisiesto = true;
    //     } else {
    //         $anioBisiesto = false;
    //     }
    //     return $anioBisiesto;
    // }

    // private function mesLargo($mes)
    // {
    //     $mesLargo = 1;
    //     ($mes == 4 || $mes == 7 || $mes == 9 || $mes == 11 || $mes == 2) ? $mesLargo = 0 : $mesLargo;
    //     return $mesLargo;
    // }
}
