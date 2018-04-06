<?php

require_once "../controladores/ccosto.controlador.php";
require_once "../modelos/ccosto.modelo.php";

class AjaxCategorias{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCcosto;

	public function ajaxEditarCategoria(){

		$item = "id";
		$valor = $this->idCcosto;

		$respuesta = ControladorCcosto::ctrMostrarCcosto($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCcosto"])){

	$categoria = new AjaxCategorias();
	$categoria -> idCcosto = $_POST["idCcosto"];
	$categoria -> ajaxEditarCategoria();
}
