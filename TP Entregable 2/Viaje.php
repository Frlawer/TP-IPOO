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
    /**
     * Variables
     *
     * @var int $codigo
     * @var string $destino
     * @var int $cantMaxPasajeros
     * @var array $colPasajeros
     * @var object $responsable
     */
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $colPasajeros;
    private $responsable;

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
        $existe = false;
        $i = 0;
        while ($i < count($colPasajeros) && $existe != true) {
            if ($colPasajeros[$i]->getDni() == $dni) {
                $existe = true;
            }
            $i++;
        }
        return $existe;
    }

    /**
     * Eliminar Pasajero
     * Eliminia un elemento del array $colPasajeros
     * @param int $id
     * @return void
     */
    public function eliminarPasajero($dni)
    {
        $listaPasajeros = $this->getColPasajeros();
        $cant = count($listaPasajeros);
        $eliminado = false;
        $i = 0;
        while ($i < $cant && $eliminado != true) {

            if ($listaPasajeros[$i]->getDni() == $dni) {
                unset($listaPasajeros[$i]);
                $this->setColPasajeros($listaPasajeros);
                $eliminado = true;
            }
        }
    }

    /**
     * Constructor Method
     *
     * @param int $codigo
     * @param string $destino
     * @param int $cantMaxPasajeros
     * @param array $colPasajeros
     * @param object $responsable
     */
    public function __construct($codigo, $destino, $cantMaxPasajeros, $colPasajeros, $responsable)
    {
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->setColPasajeros($colPasajeros);
        $this->setResponsable($responsable);
    }

    /**
     * Lista Pasajeros
     * Genera una lista de pasajeros para el metodo _toString
     *
     * @return void
     */
    public function listaPasajeros()
    {
        $lista = $this->getColPasajeros();
        $string = "";
        for ($i = 0; $i < count($lista); $i++) {
            $string .= $lista[$i]->__toString() . "\n";
        }
    }

    public function __toString()
    {
        $string = "Codigo: " . $this->getCodigo() . "\n";
        $string .= "Destino: " . $this->getDestino() . "\n";
        $string .= "Cantidad Máxima de pasajeros: " . $this->getCantMaxPasajeros() . "\n";
        $string .= "Responsable del Viaje: " . $this->getResponsable()->__toString() . "\n";
        $string .= "Pasajeros: " . $this->listaPasajeros() . "\n";;

        return $string;
    }


    /**
     * Getters & Setters
     */
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
}
