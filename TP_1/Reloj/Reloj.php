<?php
class Reloj
{
    /**
     * Clase Reloj
     *
     * @var int $hora
     * @var int $minutos
     * @var int $segundos
     */
    private $hora;
    private $minutos;
    private $segundos;

    /**
     * function __construct
     * Al inicializar el reloj se restablece a 00:00:00
     */
    public function __construct()
    {
        $this->restablecerReloj();
    }

    /** Getters & Setters */
    public function getHoras()
    {
        return $this->hora;
    }

    public function getMinutos()
    {
        return $this->minutos;
    }

    public function getSegundos()
    {
        return $this->segundos;
    }

    /**
     * @param int $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @param int $min
     */
    public function setMinutos($min)
    {
        $this->minutos = $min;
    }

    /**
     * @param int $seg
     */
    public function setSegundos($seg)
    {
        $this->segundos = $seg;
    }

    /**
     * function restablecerReloj
     * Restablece a 00:00:00 todas las variables privadas
     *
     * @return void
     */
    public function restablecerReloj()
    {
        $this->setHora(0);
        $this->setMinutos(0);
        $this->setSegundos(0);
    }

    /**
     *  function programarReloj
     * Establece el valor de variables $hora, $minutos, $segundos con los valores pasados por parametros.
     *
     * @param int $h
     * @param int $m
     * @param int $s
     * @return void
     */
    public function programarReloj($h, $m, $s)
    {
        if ($h < 24 && $m <= 60 && $s <= 60) {
            $this->setHora = $h;
            ($m == 60 || $m == 0) ? $this->setMinutos = 0 : $this->setMinutos = $m;
            ($s == 60 || $m == 0) ? $this->setSegundos = 0 : $this->setSegundos = $s;
        }
    }

    /**
     * function convertirSegundos
     * Convierte los valores enviados por parametros a segundos
     *
     * @param int $h 
     * @param int $m
     * @param int $s
     * @return int
     */
    public function formatearSegundos($h, $m, $s)
    {
        return ($h * 3600) + ($m * 60) + $s;
    }

    /**
     * function formatearHora
     * Formatea de segundos a hh:mm:ss
     *
     * @param int $segundos
     * @return time
     */
    public function formatearHora($segundos)
    {
        $h = floor($segundos / 3600);
        $m = floor(($segundos % 3600) / 60);
        $s = $segundos - ($h * 3600) - ($m * 60);
        return sprintf('%02d:%02d:%02d', $h, $m, $s);
    }

    /**
     *  function iniciarReloj
     * Llama al metodo convertirSegundos para convertir a segundos los valores de hora, minutos y segundos.
     * Luego inicia el recorreido hasta llegar a 23:59:59 (86400 seg) para reiniciar el reloj.
     *
     * @return void
     */
    public function iniciarReloj()
    {
        $totalSegundos = $this->formatearSegundos(
            $this->getHoras(),
            $this->getMinutos(),
            $this->getSegundos()
        );

        for ($i = $totalSegundos; $i < 86400; $i++) {
            if ($i == 86399) :
                $this->restablecerReloj();
                echo "Cronometro Finalizado y Reiniciado a 00:00:00";
            endif;
        }
    }


    public function __toString()
    {
        return "{$this->getHoras()}:{$this->getMinutos()}:{$this->getSegundos()}" . "\n ";
    }
}
