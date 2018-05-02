<?php
set_time_limit(300);
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");
error_log( "Hello, errors!" );

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/items.controlador.php";
require_once "controladores/ccosto.controlador.php";
require_once "controladores/ccuerpo.controlador.php";
require_once "controladores/sepulturas.controlador.php";
require_once "controladores/difuntos.controlador.php";
require_once "controladores/tiposepultura.controlador.php";
require_once "controladores/agenda.controlador.php";
require_once "controladores/item.controlador.php";
require_once "controladores/calendario.controlador.php";
require_once "controladores/utm.controlador.php";
require_once "controladores/estado.controlador.php";
require_once "controladores/cementerio.controlador.php";
require_once "controladores/credito.controlador.php";
require_once "controladores/cuota.controlador.php";
require_once "controladores/dxp.controlador.php";
require_once "controladores/traslado.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/ccosto.modelo.php";
require_once "modelos/ccuerpo.modelo.php";
require_once "modelos/sepulturas.modelo.php";
require_once "modelos/difuntos.modelo.php";
require_once "modelos/tiposepultura.modelo.php";
require_once "modelos/agenda.modelo.php";
require_once "modelos/item.modelo.php";
require_once "modelos/calendario.modelo.php";
require_once "modelos/utm.modelo.php";
require_once "modelos/estado.modelo.php";
require_once "modelos/cementerio.modelo.php";
require_once "modelos/credito.modelo.php";
require_once "modelos/cuota.modelo.php";
require_once "modelos/dxp.modelo.php";
require_once "modelos/traslado.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();