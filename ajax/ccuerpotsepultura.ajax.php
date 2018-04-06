<?php

require_once "../controladores/ccuerpo.controlador.php";
require_once "../modelos/ccuerpo.modelo.php";

class AjaxCcuerpoSepultura{

    /*=============================================
     CUARTEL CUERPO x T_SEPULTURA
    =============================================*/

    public $tipoSepultura;

	public function ajaxCuerpoSepultura(){

        $tipoSepultura = $this->tipoSepultura;
        $respuesta = ControladorCcuerpo::ctrMostrarCcuerpoTSepultura($tipoSepultura);
        //print_r($respuesta);
        echo json_encode($respuesta);

    }
}

/*=============================================
MOSTRAR CUARTEL CUERPO x SEPULTURA
=============================================*/
if(isset($_POST["tipo_sepultura"])){
    $ccuerpo = new AjaxCcuerpoSepultura();
    $ccuerpo -> tipoSepultura = $_POST["tipo_sepultura"];
    //print_r($ccuerpo);
    $ccuerpo -> ajaxCuerpoSepultura();
}