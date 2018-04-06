<?php

require_once "../controladores/tiposepultura.controlador.php";
require_once "../modelos/tiposepultura.modelo.php";

class AjaxTsepultura{

	/*=============================================
	EDITAR TIPO SEPULTURA
	=============================================*/	

	public $idTsepultura;

	public function ajaxEditarTsepultura(){

		$item = "id_tipo_sepultura";
		$valor = $this->idTsepultura;

		$respuesta = ControladorTsepultura::ctrMostrarTsepultura($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR TIPO SEPULTURA
=============================================*/	

if(isset($_POST["idTsepultura"])){

	$sepultura = new AjaxTsepultura();
	$sepultura -> idTsepultura = $_POST["idTsepultura"];
	$sepultura -> ajaxEditarTsepultura();

}