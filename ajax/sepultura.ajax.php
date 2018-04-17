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

		// AGREGAR FUNCIÓN PARA OBTENER MUERTOS X SEPULTURA

        $valor = $respuesta["id_sepultura"];
        $respuesta2 = ControladorDifuntos::ctrMostrarDifuntosEnSepultura($item,$valor);

        $respuesta1= array_merge($respuesta,$respuesta2);
		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idSepultura"])){

	$Sepultura = new AjaxSepulturas();
	$Sepultura -> idSepultura = $_POST["idSepultura"];
	$Sepultura -> ajaxEditarSepultura();

}