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
    public function __construct($cod, $dest, $cantMax, $pasaj)
    {
        $this->setCodigo($cod);
        $this->setDestino($dest);
        $this->setCantidadMaxPasajeros($cantMax);
        $this->setPasajeros($pasaj);
    }

    /**
     *************************************************
     * Getters & Setters
     * @return int
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
        array_push($listaPasajeros, $pasajero);
        return $listaPasajeros;
    }

    /**
     * Seguro esta funcion iba en el archivo testViaje.php
     * pero no tuve tiempo de cambiarla de lado
     *
     * @param array $coleccionPasajeros
     * @param int $cantidad
     * @return array
     */
    public function agregarPasajeros($coleccionPasajeros, $cantidad)
    {
        if ($cantidad <= $this->getCantidadMaximaPasajeros()) {
            for ($i = 0; $i < $cantidad; $i++) {
                echo 'Ingrese nombre pasajero N° ' . $i + 1 . ': ';
                $nuevoPasajero[$i]['nombre'] = trim(fgets(STDIN));
                echo 'Ingrese apellido pasajero N° ' . $i + 1 . ': ';
                $nuevoPasajero[$i]['apellido'] = trim(fgets(STDIN));
                echo 'Ingrese DNI pasajero N° ' . $i + 1 . ': ';
                $nuevoPasajero[$i]['dni'] = trim(fgets(STDIN));
            }
            array_push($coleccionPasajeros, $nuevoPasajero);
            $this->setPasajeros($coleccionPasajeros[0]);
        } else {
            echo 'No es posible cargar más pasajeros de los permitidos.';
        }
        return $coleccionPasajeros[0];
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
            if (($this->getPasajeros())[$i]["dni"] == $dni) {
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

    /**
     * modifica la lista de pasajeros y agrega una nueva con los datos modificados
     *
     * @param array $arr
     * @param array $datos
     * @param int $id
     * @return void
     */
    public function cambiarPasajeros($arr, $datos, $id)
    {
        $arr[$id]['nombre'] = $datos['nombre'];
        $arr[$id]['apellido'] = $datos['apellido'];
        $arr[$id]['dni'] = $datos['dni'];
        $this->setPasajeros($arr);
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

    /**
     * Imprime los datos de la clase
     *
     * @return string
     */
    public function __toString()
    {
        return "\n Codigo viaje: " . $this->getCodigo() . "\n Destino: " . $this->getDestino() . "\n Cantidad Maxima de pasajeros: " . $this->getCantidadMaximaPasajeros() . "\n";
    }
}
