<?php

require_once "../controladores/cuota.controlador.php";
require_once "../modelos/cuota.modelo.php";

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/credito.controlador.php";
require_once "../modelos/credito.modelo.php";

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

            $res_cuotas = ControladorCuota::ctrMostrarUltimoBoletin();

            $res_ventas = ControladorVentas::ctrMostrarUltimoBoletin();

            $res_creditos = ControladorCreditos::ctrMostrarUltimoBoletin();

            $aux = array_merge($res_creditos,$res_ventas);

            $respuesta = array_merge($aux, $res_cuotas);

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