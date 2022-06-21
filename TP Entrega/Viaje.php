<?php
class Viaje
{

    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros;

    /**
     * __construct
     *
     * @param int $cod
     * @param string $dest
     * @param int $cantMax
     * @param array $pasaj
     * return void
     */
    public function __construct($codigo, $destino, $cantMaxPasajeros, $pasajeros)
    {
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantidadMaxPasajeros($cantMaxPasajeros);
        $this->setPasajeros($pasajeros);
    }

    // ******************************************************
    /**
     * nuevoPasajero
     * une un array que viene por parametro
     * con el array $listaPasajeros
     *
     * @param array $pasajero
     * @return array
     */
    public function nuevoPasajero($pasajero)
    {
        $listaPasajeros = $this->getPasajeros();
        $listaPasajeros[] = $pasajero;
        return $listaPasajeros;
    }

    /**
     * busca en la lista de pasajeros el que corresponde al dni
     * retorna el indice del array si existe, sino -1
     *
     * @param int $dni
     * @return int
     */
    public function getPasajeroDNI($dni)
    {
        $i = 0;
        $tamanoPasajeros = count($this->getPasajeros());
        $existe = false;
        while ($i < $tamanoPasajeros && !$existe) {
            if ($this->getPasajeros()[$i]["dni"] == $dni) {
                $existe = true;
            } else {
                $i++;
            }
        }
        if (!$existe) {
            $i = -1;
        }
        return $i;
    }

    public function eliminarPasajero($id)
    {
        $arr = $this->getPasajeros();
        $cant = count($arr);
        unset($arr[$id]);
        if (count($arr) < $cant) {
            $this->setPasajeros($arr);
        } else {
            echo "eror";
        }
    }

    public function listaPasajeros()
    {
        $lista = $this->getPasajeros();
        for ($i = 0; $i < count($lista); $i++) {
            $string = "Pasajero N° " . $i . "\n";
            $string .= "Nombre: " . $lista[$i]["nombre"] . "\n";
            $string .= "Apellido: " . $lista[$i]["apellido"] . "\n";
            $string .= "DNI: " . $lista[$i]["dni"] . "\n";

            return $string;
        }
    }

    /**
     * Imprime los datos de la clase
     *
     * @return string
     */
    public function __toString()
    {
        $string = "Codigo viaje: " . $this->getCodigo() . "\n";
        $string .= "Destino: " . $this->getDestino() . "\n";
        $string .= "Cantidad Maxima de pasajeros: " . $this->getCantidadMaximaPasajeros() . "\n";
        $string .= "Pasajeros: " . $this->listaPasajeros() . "\n";

        return $string;
    }

    /**
     *************************************************
     * Getters & Setters
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function getCantidadMaximaPasajeros()
    {
        return $this->cantMaxPasajeros;
    }

    public function getPasajeros()
    {
        return $this->pasajeros;
    }

    public function setCodigo($cod)
    {
        $this->codigo = $cod;
    }

    public function setDestino($dest)
    {
        $this->destino = $dest;
    }

    public function setCantidadMaxPasajeros($cantMax)
    {
        $this->cantMaxPasajeros = $cantMax;
    }

    public function setPasajeros($pasaj)
    {
        $this->pasajeros = $pasaj;
    }
}
