<?php

require_once "../controladores/ccuerpo.controlador.php";
require_once "../modelos/ccuerpo.modelo.php";

class AjaxCcuerpo{

	/*=============================================
	EDITAR CUARTEL CUERPO
	=============================================*/	

	public $idCcuerpo;

	public function ajaxEditarCcuerpo(){

		$item = "id_cuartel_cuerpo";
		$valor = $this->idCcuerpo;

		$respuesta = ControladorCcuerpo::ctrMostrarCcuerpo($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CUARTEL CUERPO
=============================================*/	
if(isset($_POST["idCcuerpo"])){
    var_dump($_POST);
	$ccuerpo = new AjaxCcuerpo();
	$ccuerpo -> idCcuerpo = $_POST["idCcuerpo"];
	$ccuerpo -> ajaxEditarCcuerpo();
}
