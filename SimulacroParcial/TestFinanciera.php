<?php
include "Persona.php";
include "Cuota.php";
include "Prestamo.php";
include "Financiera.php";
// 1 Se crea un objeto Financiera con la siguiente información: denominación= Money, dirección = “Av. Arg 1234 ”
$financiera = new Financiera("Money", "Av Arg 1234");

// 2 Se crea 3 objetos Prestamos con la información visualizada en la tabla
$persona1 = new Persona('Pepe', 'Florez', 'Bs As 12', 'dir@mail.com', 299444567, 40000);
$persona2 = new Persona('Luis', 'Suarez', 'Bs As 123', 'dir@mail.com', 29944455, 4000);
$persona2 = new Persona('Luis', 'Suarez', 'Bs As 123', 'dir@mail.com', 29944455, 4000);
$prestamoUno = new Prestamo(1, 50000, 5, 0.1, $persona1);
$prestamoDos = new Prestamo(1, 10000, 4, 0.1, $persona2);
$prestamoTres = new Prestamo(1, 10000, 2, 0.1, $persona3);

// 3 Invocar al método incorporarPrestamo de la Clase Financiera con cada uno de los prestamos creados en el inciso anterior.
$financiera->incorporarPrestamo($prestamoUno);
$financiera->incorporarPrestamo($prestamoDos);
$financiera->incorporarPrestamo($prestamoTres);

// 4 Realizar un echo del objeto Financiera creado en 1).
echo $financiera;

// 5 Invocar al método otorgarPrestamoSiCalifica de la Clase Financiera
$financiera->otorgarPrestamoSiCalifica();

// 6 Realizar un echo del objeto Financiera creado en 1).
echo $financiera;

// 7 Invocar al método informarCuotaPagar(2) de la Clase Financiera y almacenar el valor en una variable $objCuota.
$objCuota = $financiera->informarCuotaPagar(2);

// 8 Realizar un echo de la variable obtenida en el inciso anterior.
echo $objCuota;

// 9 Invocar al método darMontoFinalCuota con el objeto obtenido en el inciso 7 y visualizar el resultado obtenido
$montoFinal = $objCuota->darMontoFinalCuota();
print_r($montoFinal);

// 10 Invocar al método setCancelada(true) con el objeto obtenido en el inciso 7.
$montoFinal->setCancelada(true);

// 11 Invocar al método informarCuotaPagar(2) de la Clase Financiera y almacenar el valor en una variable $objCuota
$objCuota = $financiera->informarCuotaPagar(2);

// 12 Realizar un echo de la variable obtenida en el inciso anterior
echo $objCuota;
