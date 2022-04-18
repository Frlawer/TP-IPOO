<?php
class Financiera
{
    private $denominacion;
    private $direccion;
    private $coleccionPrestamos;

    public function __construct($denominacion, $direccion)
    {
        $this->setDenominacion($denominacion);
        $this->setDireccion($direccion);
    }

    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getColeccionPrestamos()
    {
        return $this->coleccionPrestamos;
    }

    public function setColeccionPrestamos($coleccionPrestamos)
    {
        $this->coleccionPrestamos = $coleccionPrestamos;
    }

    /**
     * incorporarPrestamo
     * Agrega el objeto prestamo ingresado por parametro a la coleccion de prestamos
     *
     * @param object $objPrestamo
     * @return void
     */
    public function incorporarPrestamo($objPrestamo)
    {
        $colPrestamos = $this->getColeccionPrestamos();

        $colPrestamos[] = $objPrestamo;

        $this->setColeccionPrestamos($colPrestamos);
    }

    /**
     * otorgarPrestamoSiCalifica
     * método que recorre la lista de prestamos que no
han sido generadas sus cuotas. Por cada préstamo, se corrobora que su monto dividido la
cantidad_de_cuotas no supere el 40 % del neto del solicitante, si la verificación es satisfactoria se invoca
al método otorgarPrestamo. 
     *
     * @return void
     */
    public function otorgarPrestamoSiCalifica()
    {
        $colPrestamos = $this->getColeccionPrestamos();

        foreach ($colPrestamos as $key => $value) {

            if (empty($value->getFecha())) {
                $monto = $value->getMonto();
                $cantCuotas = $value->getCantidad_de_cuotas();

                $menorCuarentaPorciento = ($value->getPersona()->getNeto() / 40) * 100;

                if (($monto / $cantCuotas) < $menorCuarentaPorciento) {
                    $value->otorgarPrestamo();
                } else {
                    throw new Exception("Error: No se pudo otrogar el prestamo");
                }
            }
        }
    }

    /**
     * informarCuotaPagar
     *  recibe por parámetro la identificación del préstamo, se busca el préstamo en la colección de prestamos y si es encontrado se obtiene la siguiente cuota a pagar. El método debe retornar la referencia a la cuota. Utilizar para su implementación el método darSiguienteCuotaPagar 
     *
     * @return array
     */
    public function informarCuotaPagar($idPrestamo)
    {
        $colPrestamos = $this->getColeccionPrestamos();
        $cuotaPagar = null;

        for ($i = 0; $i < count($colPrestamos); $i++) {

            if ($colPrestamos[$i]->getId() == $idPrestamo) {
                $cuotaPagar = $colPrestamos->darSiguienteCuotaPagar();
            }
        }
        return $cuotaPagar;
    }

    /**
     * strPrestamo
     * Retorna string de la coleccion de prestamos  
     *
     * @return string
     */
    public function strPrestamos()
    {
        $str = "";
        $i = 0;
        foreach ($this->getColeccionPrestamos() as $key => $value) {
            $str .= $key;
            $i++;
        }
        return $str;
    }

    /**
     * __toString
     * retorna los datos del objeto 
     *
     * @return string
     */
    public function __toString()
    {
        return "\n Denominacion: " . $this->getDenominacion() .
            "\n Direccion: " . $this->getDireccion() .
            "\n Coleccion Prestamos: " . $this->strPrestamos();
    }
}
