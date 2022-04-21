<?php

/**Entregable TP 2
Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. 
- El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero
- También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido.
- La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
- Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. 
- Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. 
- Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. 
- De la misma forma cargue la información del responsable del viaje.
- Pasajeros array con objetos pasajeros.
- Modificar pasajero
- agregar pasajero al viaje
- verificaPasajero si existe
- cargar responsable
 */
class viaje
{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $colPasajeros;
    private $responsable;

    public function __construct($codigo, $destino, $cantMaxPasajeros, $colPasajeros, $responsable)
    {
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->setColPasajeros($colPasajeros);
        $this->setResponsable($responsable);
    }
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }

    public function setCantMaxPasajeros($cantMaxPasajeros)
    {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function getColPasajeros()
    {
        return $this->colPasajeros;
    }

    public function setColPasajeros($colPasajeros)
    {
        $this->colPasajeros = $colPasajeros;
    }

    public function getResponsable()
    {
        return $this->responsable;
    }

    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }
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
        $listaPasajeros = $this->getColPasajeros();
        $listaPasajeros[] = $pasajero;
        return $listaPasajeros;
    }

    /**
     * existePasajero
     * Recorre la coleccion de pasajeros y verifica si existe el pasajero con dni pasado por parametro
     *
     * @param int $dni
     * @return int
     */
    public function existePasajero($dni)
    {
        $colPasajeros = $this->getColPasajeros();
        $id = null;
        for ($i = 0; $i < count($colPasajeros); $i++) {
            if ($colPasajeros[$i]->getDni() == $dni && $id != null) {
                $id = $i;
            } else {
                $id = -1;
            }
        }
        return $id;
    }

    public function eliminarPasajero($id)
    {
        $listaPasajeros = $this->getColPasajeros();
        $cant = count($listaPasajeros);
        unset($listaPasajeros[$id]);
        if (count($listaPasajeros) < $cant) {
            $this->setColPasajeros($listaPasajeros);
        } else {
            echo "No fue posible eliminar el pasajero.";
        }
    }

    public function listaPasajeros()
    {
        $lista = $this->getColPasajeros();
        for ($i = 0; $i < count($lista); $i++) {
            echo $lista[$i]->__toString();
        }
    }

    public function __toString()
    {
        return "\nCodigo: " . $this->getCodigo() .
            "\nDestino: " . $this->getDestino() .
            "\nCantidad Máxima de pasajeros: " . $this->getCantMaxPasajeros() .
            "\nResponsable del Viaje: \n" . $this->getResponsable()->__toString() .
            "\nPasajeros: \n" . $this->listaPasajeros();
    }
}
