<?php

require_once "../controladores/cuota.controlador.php";
require_once "../modelos/cuota.modelo.php";

class AjaxCuotas{

    /*=============================================
    EDITAR CUOTA
    =============================================*/

    public $idCuota;

    public function ajaxEditarCuota(){

        $item = "id_cuota";
        $valor = $this->idCuota;
        $respuesta = ControladorCuota::ctrMostrarCuota($item, $valor);
        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR CUOTA
=============================================*/

if(isset($_POST["idCuota"])){
    $cuota = new AjaxCuotas();
    $cuota -> idCuota = $_POST["idCuota"];
    $cuota -> ajaxEditarCuota();

}