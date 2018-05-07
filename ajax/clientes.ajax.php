<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idCliente, $query;

	public function ajaxEditarClientes(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);


	}

    public function ajaxMostrarNombreClientes(){

        $item = "null";
        $valor = $this->query;
        $respuesta = ControladorClientes::ctrMostrarNombreClientes($item, $valor);

        echo json_encode($respuesta);


    }

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarClientes();

}else if(isset($_POST["query"])){
    //var_dump($_POST);
    $clientes = new AjaxClientes();
    $clientes -> query = $_POST["query"];
    $clientes -> ajaxMostrarNombreClientes();


}