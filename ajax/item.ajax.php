<?php

require_once "../controladores/item.controlador.php";
require_once "../modelos/item.modelo.php";

require_once "../controladores/utm.controlador.php";
require_once "../modelos/utm.modelo.php";

class AjaxItem{



	/*=============================================
	EDITAR ITEM
	=============================================*/	

	public $idItem;
	public $traerItems;
	public $nombreItem;

	public function ajaxEditarItem(){

		if(strcmp($this ->traerItems, "ok") == 0){ //TRAER TODOS LOS ITEMS
            //var_dump($_POST);

            $item = "null";
		    $valor = "null";

		    $respuesta = ControladorItem::ctrMostrarItem($item, $valor);

		    echo json_encode($respuesta);

        }else if(strcmp($this ->nombreItem, "") != 0){

		    $item = "nombre";
		    $valor = $this ->nombreItem;

		    $respuesta = ControladorItem::ctrMostrarItem($item, $valor);

            $utm = ControladorUtm::ctrMostrarUtmActual($item, $valor);

            $respuesta1 = array_merge($respuesta, $utm);

		    echo json_encode($respuesta1);

        }else{ //TRAER ITEM EN ESPECÍFICO

            $item = "id_item";
            $valor = $this->idItem;

            $respuesta = ControladorItem::ctrMostrarItem($item, $valor);

            $item = "null";
            $valor = "null";

            $utm = ControladorUtm::ctrMostrarUtmActual($item, $valor);

            $respuesta1 = array_merge($respuesta, $utm);
            echo json_encode($respuesta1);
        }
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
if(isset($_POST["traerItems"])){
    //var_dump($_POST);
    $items = new AjaxItem();
    $items -> traerItems = $_POST["traerItems"];
    $items -> ajaxEditarItem();
}
if(isset($_POST["nombreItem"])){
    //var_dump($_POST);
    $items = new AjaxItem();
    $items -> nombreItem = $_POST["nombreItem"];
    $items ->ajaxEditarItem();
}
