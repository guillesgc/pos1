<?php

require_once "../controladores/cuota.controlador.php";
require_once "../modelos/cuota.modelo.php";

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxCuotas{

    /*=============================================
    EDITAR CUOTA
    =============================================*/

    public $idCuota;

    public function ajaxEditarCuota(){
        if($this -> idCuota) {

            $item = "id_cuota";
            $valor = $this->idCuota;
            $respuesta = ControladorCuota::ctrMostrarCuota($item, $valor);
            echo json_encode($respuesta);

        }else if($this->boletin){

            $res_creditos = ControladorCuota::ctrMostrarUltimoBoletin();

            $res_ventas = ControladorVentas::ctrMostrarUltimoBoletin();

            $respuesta = array_merge($res_creditos,$res_ventas);

            echo json_encode($respuesta);


        }

    }

}

/*=============================================
EDITAR CUOTA
=============================================*/

if(isset($_POST["idCuota"])){
    $cuota = new AjaxCuotas();
    $cuota -> idCuota = $_POST["idCuota"];
    $cuota -> ajaxEditarCuota();

}else if(isset($_POST["ultimoBoletin"])){
    $cuota = new AjaxCuotas();
    $cuota -> boletin = $_POST["ultimoBoletin"];
    $cuota -> ajaxEditarCuota();
}