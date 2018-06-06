<?php

require_once "../controladores/credito.controlador.php";
require_once "../modelos/credito.modelo.php";

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxCreditos{

    /*=============================================
    EDITAR CLIENTE
    =============================================*/

    public $idCredito, $boletin;

    public function ajaxEditarCredito(){
        if ($this->idCredito) {

            $item = "id_credito";
            $valor = $this->idCredito;
            $respuesta = ControladorCreditos::ctrMostrarCreditoE($item, $valor);
            echo json_encode($respuesta);

        }else if($this->boletin){

            $res_creditos = ControladorCreditos::ctrMostrarUltimoBoletin();

            $res_ventas = ControladorVentas::ctrMostrarUltimoBoletin();
            if($res_creditos['boletin'] >= $res_ventas['codigo']) {

                $res_creditos[0] = $res_creditos[0] + 1;

                echo json_encode($res_creditos);
            }else{

                $res_creditos[0] = $res_creditos[0] + 1;

                echo json_encode($res_ventas);
            }

        }


    }



}

/*=============================================
EDITAR CLIENTE
=============================================*/

if(isset($_POST["idCredito"])){

    $credito= new AjaxCreditos();
    $credito -> idCredito = $_POST["idCredito"];
    $credito -> ajaxEditarCredito();

}else if(isset($_POST["ultimoBoletin"])){
    $credito = new AjaxCreditos();
    $credito -> boletin = $_POST["ultimoBoletin"];
    $credito -> ajaxEditarCredito();
}