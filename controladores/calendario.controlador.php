<?php

class ControladorCalendario{

	/*=============================================
	MOSTRAR AGENDA
	=============================================*/

	static public function ctrMostrarCalendario($item, $valor){

		$tabla = "agenda";

		$respuesta = ModeloCalendario::mdlMostrarCalendario($tabla, $item, $valor);

		return $respuesta;
	
	}

}
