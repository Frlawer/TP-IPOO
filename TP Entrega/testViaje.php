<?php
include 'Viaje.php';

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
        "7) Salir"
    ];
    // imprimo el menu con bucle
    echo "Selecciona una opción del Menú: \n";
    foreach ($menu as $key) {
        echo $key . "\n";
    }
    // llamo a la funcion solicitarNumero() para solicitar un numero y lo retorno.
    $opcion = solicitarNumero(1, 7);
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
    echo "Datos del viaje: \n";
    echo "Codigo: " . $viaje->getCodigo();
    echo "\n";
    echo "Destino: " . $viaje->getDestino();
    echo "\n";
    echo "Cantidad máxima de pasajeros: " . $viaje->getCantidadMaximaPasajeros();
    echo "\n >> \n";
    foreach ($viaje->getPasajeros() as $key => $value) {
        echo ">> Pasajero N° " . $key + 1 . ": ";
        echo "\n";
        echo "Nombre: " . $value['nombre'];
        echo "\n";
        echo "Apellido: " . $value['apellido'];
        echo "\n";
        echo "DNI: " . $value['dni'];
        echo "\n";
    }
}

function sumarPasajeros($cantPasj)
{
    echo $cantPasj;
    $coleccionPasajeros = [];
    for ($i = 0; $i < $cantPasj; $i++) {
        echo "\n Pasajero N°: " . $i + 1 . "\n";
        $pasajero = editarPasajero();

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
function editarPasajero()
{
    $datosPasajero = [];
    echo "Ingrese Nombre: ";
    $datosPasajero["nombre"] = trim(fgets(STDIN));
    echo "Ingrese Apellido: ";
    $datosPasajero["apellido"] = trim(fgets(STDIN));
    echo "Ingrese DNI: ";
    $datosPasajero["dni"] = trim(fgets(STDIN));
    return $datosPasajero;
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/


$pasajerosTotal = cargarPasajeros();
$viaje = new Viaje(0, '', 0, $pasajerosTotal);
$separador = "\n\n+++++++++++++++++++++++++++++++++\n";
//Proceso:

do {
    echo $separador;
    // invoco funcion para mostrar menu y solicitar ingrese una opcion del mismo
    $opcion = seleccionarOpcion();

    switch ($opcion) {
        case 1:
            if (is_object($viaje) && $viaje->getCodigo() != 0) {
                echo "Ya se cargó un viaje.";
            } else {
                $datosViaje  = datosViaje();
                $viaje->setCodigo($datosViaje["codigo"]);
                $viaje->setDestino($datosViaje["destino"]);
                $viaje->setCantidadMaxPasajeros($datosViaje["cantMaxPasajeros"]);

                echo "¿Cuantos pasajeros cargara? ";
                $cantidadPasajeros = trim(fgets(STDIN));
                while (!is_int($cantidadPasajeros) && $cantidadPasajeros > $viaje->getCantidadMaximaPasajeros()) {
                    echo "No es posible cargar mas personas del limite. Intente de nuevo";
                    $cantidadPasajeros = trim(fgets(STDIN));
                }
                $pasajeros = sumarPasajeros($cantidadPasajeros);
                $viaje->setPasajeros($pasajeros);
            }
            break;
        case 2:
            if (is_object($viaje) && $viaje->getCodigo() != 0) {
                echo "Modifique los datos del viaje: \n";
                $datosViaje = datosViaje($viaje);
                while ($datosViaje["cantMaxPasajeros"] < count($viaje->getPasajeros())) {
                    echo "\nLa cantidad Maxima de Pasajeros no puede ser menor a los pasajeros cargados. Intente de nuevo.\n";
                    $datosViaje = datosViaje($viaje);
                }
                $viaje->setCodigo($datosViaje["codigo"]);
                $viaje->setDestino($datosViaje["destino"]);
                $viaje->setCantidadMaxPasajeros($datosViaje["cantMaxPasajeros"]);
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
                $idPasajero = $viaje->getPasajeroDNI($dni);
                if ($idPasajero) {
                    $datos = sumarPasajeros(1);
                    $viaje->eliminarPasajero($idPasajero);
                    $lista = $viaje->getPasajeros();
                    $arrPasajeros = array_merge($lista, $datos);
                    $viaje->setPasajeros($arrPasajeros);
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
            $idPasajero = $viaje->getPasajeroDNI($dni);
            if ($idPasajero) {
                $viaje->eliminarPasajero($idPasajero);
            } else {
                echo "El pasajero no existe: ";
            }
            break;
        case 6:
            break;
        case 7:
            echo "Programa finalizado....";
            break;
    }
} while ($opcion != 7);
