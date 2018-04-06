<?php

require_once "../controladores/agenda.controlador.php";
require_once "../modelos/agenda.modelo.php";

class ajaxAgenda{

	/*=============================================
	EDITAR AGENDA
	=============================================*/	

	public $idAgenda;

	public function ajaxEditarAgenda(){

		$item = "id_agenda";
		$valor = $this->idAgenda;

		$respuesta = ControladorAgenda::ctrMostrarAgenda($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR AGENDA
=============================================*/	

if(isset($_POST["idAgenda"])){

	$agenda = new ajaxAgenda();
	$agenda -> idAgenda = $_POST["idAgenda"];
	$agenda -> ajaxEditarAgenda();

}