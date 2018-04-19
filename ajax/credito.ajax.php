<?php

require_once "../controladores/credito.controlador.php";
require_once "../modelos/credito.modelo.php";

class AjaxCreditos{

    /*=============================================
    EDITAR CLIENTE
    =============================================*/

    public $idCredito;

    public function ajaxEditarCredito(){

        $item = "id_credito";
        $valor = $this->idCredito;
        $respuesta = ControladorCreditos::ctrMostrarCredito($item, $valor);
        echo json_encode($respuesta);


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