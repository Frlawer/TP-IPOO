<?php
include 'Viaje.php';
include "ResponsableV.php";
include "Persona.php";

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* ... Rodriguez Francisco. FAI-1094. TDW. francisco.rodriguez@est.fi.uncoma.edu.ar. https://github.com/frlawer/ ... */

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

function cargarPasajeros()
{
    // Cargamos 11 juegos de ejemplo
    $coleccionPasajeros = [];

    return $coleccionPasajeros;
}

function seleccionarOpcion()
{
    // array $menu,
    // int $opcion
    // defino el menu como array
    $menu = [
        "1) Cargar Viaje",
        "2) Modificar Viaje",
        "3) Mostrar datos Viaje",
        "4) Modificar pasajero",
        "5) Eliminar pasajero",
        "6) Salir"
    ];
    // imprimo el menu con bucle
    echo "Selecciona una opción del Menú: \n";
    foreach ($menu as $key) {
        echo $key . "\n";
    }
    // llamo a la funcion solicitarNumero() para solicitar un numero y lo retorno.
    $opcion = solicitarNumero(1, 6);
    return $opcion;
}

function solicitarNumero($min, $max)
{
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

function datosViaje()
{
    $datos = [];
    echo 'Ingrese codigo de viaje: ';
    $datos["codigo"] = trim(fgets(STDIN));
    echo 'Ingrese destino: ';
    $datos["destino"] = trim(fgets(STDIN));
    echo 'Capacidad maxima de pasajeros: ';
    $datos["cantMaxPasajeros"] = trim(fgets(STDIN));
    return $datos;
}

function mostrarViaje($viaje)
{
    echo "\n\n++++++++++++++++++++++++++\n";
    echo "Datos del viaje: \n" .
        "\nCodigo Viaje: " . $viaje->getCodigo() .
        "\nDestino: " . $viaje->getDestino() .
        "\nCantidad Máxima de Pasajeros: " . $viaje->getCantMaxPasajeros() .
        "\n\n++++++++++++++++++++++++++\n" .
        "\nResponsable Viaje: " . $viaje->getResponsable()->__toString() .
        "\n\n++++++++++++++++++++++++++\n";
    for ($i = 0; $i < count($viaje->getColPasajeros()); $i++) {
        echo "\n>> Pasajero N° " . $i . ": " .
            "\nNombre: " . $viaje->getColPasajeros()[$i]->getNombre() .
            "\nApellido: " . $viaje->getColPasajeros()[$i]->getApellido() .
            "\nDNI: " . $viaje->getColPasajeros()[$i]->getDni() .
            "\nTeléfono: " . $viaje->getColPasajeros()[$i]->getTelefono() .
            "\n\n+++++++++++\n";
    }
}

function cargarResponsable()
{
    $datosResponsable = [];
    echo "Ingrese N° Empleado: ";
    $datosResponsable["empleado"] = trim(fgets(STDIN));
    echo "Ingrese N° Licencia: ";
    $datosResponsable["licencia"] = trim(fgets(STDIN));
    echo "Ingrese Nombre: ";
    $datosResponsable["nombre"] = trim(fgets(STDIN));
    echo "Ingrese Apellido: ";
    $datosResponsable["apellido"] = trim(fgets(STDIN));
    $responsable = new ResponsableV($datosResponsable["empleado"], $datosResponsable["licencia"], $datosResponsable["nombre"], $datosResponsable["apellido"]);
    return $responsable;
}

function sumarPasajeros($cantPasj)
{
    $coleccionPasajeros = [];
    for ($i = 0; $i < $cantPasj; $i++) {
        echo " Pasajero N°: " . $i + 1 . "\n";
        $pasajero = cargarPasajero();

        $coleccionPasajeros[] = $pasajero;
    }
    return $coleccionPasajeros;
}

/**
 * EditarPasajero 
 * Solicita los datos de pasajero y retorna los mismos
 *
 * @return array
 */
function cargarPasajero()
{
    $datosPasajero = [];
    echo "Ingrese Nombre: ";
    $datosPasajero["nombre"] = trim(fgets(STDIN));
    echo "Ingrese Apellido: ";
    $datosPasajero["apellido"] = trim(fgets(STDIN));
    echo "Ingrese DNI: ";
    $datosPasajero["dni"] = trim(fgets(STDIN));
    echo "Ingrese Teléfono: ";
    $datosPasajero["telefono"] = trim(fgets(STDIN));

    $persona = new Persona($datosPasajero["nombre"], $datosPasajero["apellido"], $datosPasajero["dni"], $datosPasajero["telefono"]);

    return $persona;
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/


$pasajerosTotal = cargarPasajeros();
$viaje = new Viaje(0, null, 0, $pasajerosTotal, null);
$responsable = new ResponsableV(0, 0, null, null);
$separador = "\n\n+++++++++++++++++++++++++++++++++\n";
//Proceso:

do {
    echo $separador;
    // invoco funcion para mostrar menu y solicitar ingrese una opcion del mismo
    $opcion = seleccionarOpcion();

    switch ($opcion) {
        case 1:
            if (is_object($viaje) && $viaje->getCodigo() != 0 && is_object($responsable) && $responsable->getEmpleado() != 0) {
                echo "Ya se inició el viaje.";
            } else {
                $editoResponsable = cargarResponsable();
                $datosViaje  = datosViaje();
                $viaje->setCodigo($datosViaje["codigo"]);
                $viaje->setDestino($datosViaje["destino"]);
                $viaje->setCantMaxPasajeros($datosViaje["cantMaxPasajeros"]);
                $viaje->setResponsable($editoResponsable);

                echo "¿Cuantos pasajeros cargara? ";
                $cantidadPasajeros = trim(fgets(STDIN));
                while (!is_int($cantidadPasajeros) && $cantidadPasajeros > $viaje->getCantMaxPasajeros()) {
                    echo "No es posible cargar mas personas del limite. Intente de nuevo";
                    $cantidadPasajeros = trim(fgets(STDIN));
                }
                $pasajeros = sumarPasajeros($cantidadPasajeros);
                $viaje->setColPasajeros($pasajeros);
            }
            break;
        case 2:
            if (is_object($viaje) && $viaje->getCodigo() != 0) {
                echo "Modifique los datos del viaje: \n";
                $datosViaje = datosViaje($viaje);
                while ($datosViaje["cantMaxPasajeros"] < count($viaje->getColPasajeros())) {
                    echo "\nLa cantidad Maxima de Pasajeros no puede ser menor a los pasajeros cargados. Intente de nuevo.\n";
                    $datosViaje = datosViaje($viaje);
                }
                $viaje->setCodigo($datosViaje["codigo"]);
                $viaje->setDestino($datosViaje["destino"]);
                $viaje->setCantMaxPasajeros($datosViaje["cantMaxPasajeros"]);
                echo "\nDatos Modificados.!\n";
            } else {
                echo "El viaje no se inició aún.";
            }
            break;
        case 3:
            mostrarViaje($viaje);
            break;
        case 4:
            if (is_object($viaje) && $viaje->getCodigo() != 0) {

                echo "MODIFICAR DATOS PASAJERO\n";
                echo "Ingrese el dni del pasajero a editar: ";
                $dni = trim(fgets(STDIN));
                $existePasajero = $viaje->existePasajero($dni);
                if ($existePasajero != false) {

                    $datos = sumarPasajeros(1);
                    $viaje->eliminarPasajero($dni);
                    $agregado = $viaje->nuevoPasajero($datos[0]);
                    $viaje->setColPasajeros(array_values($agregado));
                } else {
                    echo "El pasajero No Existe.";
                }
            } else {
                echo "El viaje no se inició aún.";
            }
            break;
        case 5:
            echo "Ingrese el dni del pasajero a eliminar: ";
            $dni = trim(fgets(STDIN));
            $idPasajero = $viaje->existePasajero($dni);
            if ($idPasajero != false) {
                $viaje->eliminarPasajero($dni);
            } else {
                echo "El pasajero no existe: ";
            }
            break;
        case 6:
            echo "Programa finalizado....";
            break;
    }
} while ($opcion != 6);
