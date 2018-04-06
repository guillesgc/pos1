<?php

require_once "../controladores/ccuerpo.controlador.php";
require_once "../modelos/ccuerpo.modelo.php";

class AjaxCcuerpoNumSepultura{

    /*=============================================
     N SEPULTUTA X CUARTEL CUERPO
    =============================================*/

    public $cuartelCuerpo;

    public function ajaxCuerpoNumSepultura(){
        $cuartelCuerpo = $this->cuartelCuerpo;
        $respuesta = ControladorCcuerpo::ctrMostrarCcuerpoNumSepultura($cuartelCuerpo);
        echo json_encode($respuesta);

    }
}

/*=============================================
MOSTRAR  N SEPULTUTA X CUARTEL CUERPO
=============================================*/
if(isset($_POST["cuartel_cuerpo"])){
    $numSep = new ajaxCcuerpoNumSepultura();
    $numSep -> cuartelCuerpo = $_POST["cuartel_cuerpo"];
    $numSep -> ajaxCuerpoNumSepultura();
}