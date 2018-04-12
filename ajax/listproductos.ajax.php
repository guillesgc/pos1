<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{
    /*=============================================
EDITAR DIFUNTO
=============================================*/

    public $idDifunto;

    public function ajaxListarProductos(){

        $item = "id_difunto";
        $valor = $this->idDifunto;

        $respuesta = ControladorDifuntos::ctrMostrarDifuntosYNumSepultura($item, $valor);

        echo json_encode($respuesta);


    }

}

/*=============================================
EDITAR DIFUNTO
=============================================*/

if(isset($_POST["id_Sepultura"])){

    $difunto = new ajaxProductos();
    $difunto -> idDifunto = $_POST["id_Sepultura"];
    $difunto -> ajaxListarProductos();

}
