<?php

require_once "../controladores/item.controlador.php";
require_once "../modelos/item.modelo.php";

class AjaxItem{



	/*=============================================
	EDITAR ITEM
	=============================================*/	

	public $idItem;

	public function ajaxEditarItem(){

		$item = "id_item";
		$valor = $this->idItem;

		$respuesta = ControladorItem::ctrMostrarItem($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR ITEM
=============================================*/	
if(isset($_POST["idItem"])){

	$itemcc = new AjaxItem();
	$itemcc -> idItem = $_POST["idItem"];
	$itemcc -> ajaxEditarItem();
}
