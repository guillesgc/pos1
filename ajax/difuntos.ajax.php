<?php

require_once "../controladores/difuntos.controlador.php";
require_once "../modelos/difuntos.modelo.php";

class AjaxDifunto{

	/*=============================================
	EDITAR DIFUNTO
	=============================================*/	

	public $idDifunto;

	public function ajaxEditarDifunto(){

		$item = "id_difunto";
		$valor = $this->idDifunto;

		$respuesta = ControladorDifuntos::ctrMostrarDifuntosYNumSepultura($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR DIFUNTO
=============================================*/	

if(isset($_POST["idDifunto"])){

	$difunto = new AjaxDifunto();
	$difunto -> idDifunto = $_POST["idDifunto"];
	$difunto -> ajaxEditarDifunto();

}