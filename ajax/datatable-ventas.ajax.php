<?php

require_once "../controladores/item.controlador.php";
require_once "../modelos/item.modelo.php";

class TablaProductos{

  /*=============================================
  MOSTRAR LA TABLA DE ITEMS
  =============================================*/ 

  public function mostrarTabla(){

  	$item = null;
    $valor = null;
    $orden = "id";


    $items = ControladorItem::ctrMostrarItemYCategoria($item,$valor,$orden);

    echo '{
			"data": [';
			for($i = 0; $i < count($items)-1; $i++){

				 echo '[
			      "'.$items[$i]["id_item"].'",
			      "'.$items[$i]["nombre"].'",
			      "'.$items[$i]["categoria"].'",
			      "'.$items[$i]["precio"].'"
			    ],';

			}

		   echo'[
			      "'.$items[count($items)-1]["id_item"].'",
			      "'.$items[count($items)-1]["nombre"].'",
			      "'.$items[count($items)-1]["categoria"].'",
			      "'.$items[count($items)-1]["precio"].'"
			    ]
			]
		}';

  }

}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 

$activar = new TablaProductos();
$activar -> mostrarTabla();