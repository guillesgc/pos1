<?php

require_once "../controladores/difuntos.controlador.php";
require_once "../modelos/difuntos.modelo.php";

require_once "../controladores/tiposepultura.controlador.php";
require_once "../modelos/tiposepultura.modelo.php";

require_once "../controladores/ccuerpo.controlador.php";
require_once "../modelos/ccuerpo.modelo.php";

class AjaxDifunto{

	/*=============================================
	EDITAR DIFUNTO
	=============================================*/	

	public $idDifunto, $idTipoSep, $idCuartelCuerpo;

	public function ajaxEditarDifunto(){

		$item = "id_difunto";
		$valor = $this->idDifunto;
		$respuesta = ControladorDifuntos::ctrMostrarDifuntosYNumSepultura($item, $valor);

		$item = "id_cuartel_cuerpo";
		$valor = $respuesta["id_cuartel_cuerpo"];
		$respuesta3 = ControladorCcuerpo::ctrMostrarCcuerpo($item, $valor);

        $item = "id_tipo_sepultura";
        $valor = $respuesta3["tipo_sep"];
        $respuesta2 = ControladorTsepultura::ctrMostrarTsepultura($item,$valor);

		//array_push($respuesta,$respuesta2);
		$respuesta4 = array_merge($respuesta,$respuesta3);
        $respuesta1= array_merge($respuesta4,$respuesta2);

       // var_dump($respuesta1);

		echo json_encode($respuesta1);


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