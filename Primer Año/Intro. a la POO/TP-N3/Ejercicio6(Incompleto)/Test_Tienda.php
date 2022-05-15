<?php

include_once "Producto.php";
include_once "ProductoImportado.php";
include_once "ProductoRegional.php";
include_once "../Ejercicio1/Cliente.php";
include_once "Rubro.php";
include_once "Local.php";
include_once "Venta.php";

/** Se crean 2 rubros: conservas con un 35 % de ganancia, regalos con un 55 % de ganancia. **/

$conservas = new Rubro("Conservas para todo el año", 1.35); 
$regalos = new Rubro("Regalos para dias festivos", 1.55); 

/** Se crean 4 instancias de la clase Producto y se vinculan a los rubros creados en el inciso anterior. **/

$osito = new ProductoImportado("0978", "Osito para el nene", 20, 1.21, 1500, $regalos);
$arvejas = new ProductoRegional("1987", "Arvejas en lata", 50, 1.21, 80, $conservas);
$aceitunas = new ProductoRegional("4563", "Aceitunas negras", 30, 1.21, 120, $conservas);
$telefono = new ProductoImportado("2394", "Teléfono de alta gama", 5, 1.21, 2500, $regalos);
$termo = new ProductoImportado("9823", "Termo Stanley", 3, 1.21, 2000, $regalos);
$mate = new ProductoRegional("5643", "Mate Argentino", 35, 1.21, 450, $regalos);


/** Se incorpora cada instancia de la clase Producto a la Tienda. **/

$productos = [$osito, $arvejas, $aceitunas, $telefono, $termo, $mate];

$tienda = new Local($productos);

/** Se incorpora nuevamente la última instancia de producto incorporada a la tienda y visualizar el resultado. **/

if ($tienda->incorporarProductoTienda($telefono)) {
     echo "Producto agregado a la tienda correctamente\n";
 } else {
     echo "El Producto ya se encuentra en la tienda\n";
 }

/** Se retorna el precio de venta de cada uno de los productos creados. **/

echo $tienda->retornarImporteProducto("0978") . "\n"; // Osito
echo $tienda->retornarImporteProducto("1987") . "\n"; // Arvejas
echo $tienda->retornarImporteProducto("4563") . "\n"; // Aceitunas
echo $tienda->retornarImporteProducto("2394") . "\n"; // Teléfono
echo $tienda->retornarImporteProducto("9823") . "\n"; // Termo
echo $tienda->retornarImporteProducto("5643") . "\n"; // Mate

/**  Se retorna el costo en productos que tiene hasta el momento la tienda. **/
echo "$" . $tienda->retornarCostoProductoTienda() . "\n";

// ===========================================================================================================================

// TODO | Testing de otras funciones
print_r($tienda->productoMasEconomico($regalos));

$primerCliente = new Cliente("Mirko", "Dinamarca", "DNI", 41609029, 1);
$segundoCliente = new Cliente("Alejandro", "Martinez", "DNI", 41576872, 2);
$tercerCliente = new Cliente("Gabriel", "Hernandez", "DNI", 42568675, 3);

$primerVenta = new Venta(2018, $osito, $primerCliente);
$segundaVenta = new Venta(2021, $mate, $segundoCliente);
$tercerVenta = new Venta(2022, $aceitunas, $tercerCliente);
$cuartaVenta = new Venta(2022, $osito, $tercerCliente);
$quintaVenta = new Venta(2022, $osito, $tercerCliente);
$sextaVenta = new Venta(2022, $aceitunas, $primerCliente);

$ventasTotal = [$primerVenta, $segundaVenta, $tercerVenta, $cuartaVenta, $quintaVenta, $sextaVenta];

$tienda->setColeccionVentasAgencia($ventasTotal);

print_r($tienda->informarProductosMasVendidos(2022, $aceitunas));









?>