<?php

require_once "../controladores/sepulturas.controlador.php";
require_once "../modelos/sepulturas.modelo.php";

class AjaxSepulturas{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idSepultura;

	public function ajaxEditarSepultura(){

		$item = "id_sepultura";
		$valor = $this->idSepultura;

		$respuesta = ControladorSepultura::ctrMostrarSepultura($item, $valor);

        echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idSepultura"])){

	$sepultura = new AjaxSepulturas();
	$sepultura -> idSepultura = $_POST["idSepultura"];
	$sepultura -> ajaxEditarSepultura();

}