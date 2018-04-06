<?php

require_once "../controladores/utm.controlador.php";
require_once "../modelos/utm.modelo.php";

class AjaxUtm{

	/*=============================================
	EDITAR UTM
	=============================================*/	

	public $idUtm;

	public function ajaxEditarUtm(){

		$item = "idutm";
		$valor = $this->idUtm;

		$respuesta = ControladorUtm::ctrMostrarUtm($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR UTM
=============================================*/	
if(isset($_POST["idUtm"])){

	$utme = new AjaxUtm();
	$utme -> idUtm = $_POST["idUtm"];
	$utme -> ajaxEditarUtm();
}
