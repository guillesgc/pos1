<?php

require_once "../controladores/traslado.controlador.php";
require_once "../modelos/traslado.modelo.php";

class AjaxTraslados{

    /*=============================================
    EDITAR TRASLADO
    =============================================*/

    public $idDifuntox;

    public function ajaxEditarTraslado(){

        $item = "id_difunto";
        $valor = $this->idDifuntox;
        $respuesta = ControladorTraslado::ctrMostrarDtraslado($item, $valor);
        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR TRASLADO
=============================================*/

if(isset($_POST["idDifuntox"])){
    $traslado= new AjaxTraslados();
    $traslado -> idDifuntox = $_POST["idDifuntox"];
    $traslado -> ajaxEditarTraslado();

}