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

}