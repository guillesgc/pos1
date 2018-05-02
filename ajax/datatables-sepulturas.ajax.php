
<?php

require_once "../controladores/sepulturas.controlador.php";
require_once "../modelos/sepulturas.modelo.php";

require_once "../controladores/tiposepultura.controlador.php";
require_once "../modelos/tiposepultura.modelo.php";

require_once "../controladores/ccuerpo.controlador.php";
require_once "../modelos/ccuerpo.modelo.php";

class TablaProductosS{

    /*=============================================
    MOSTRAR LA TABLA DE PRODUCTO
    =============================================*/

    public function mostrarTablaS(){

        $item = null;
        $valor = null;

        $productos = ControladorSepultura::ctrMostrarSepultura($item, $valor);

        echo '{
			"data": [';

        for($i = 0; $i < count($productos)-1; $i++){
            
        echo '[
              "'.$productos[$i]["nombretp"].'",
              "'.$productos[$i]["nombrecc"].'", 
              "'.$productos[$i]["numero_sepultura"].'",
              "'.$productos[$i]["estado"].'",
              "'.$productos[$i]["piso"].'",
              "'.$productos[$i]["corrida"].'",
              "'.$productos[$i]["id_sepultura"].'"
        ],';

        }
    

        echo'[
			      
			      "'.$productos[count($productos)-1]["nombretp"].'",
			      "'.$productos[count($productos)-1]["nombrecc"].'",
			      "'.$productos[count($productos)-1]["numero_sepultura"].'",
			      "'.$productos[count($productos)-1]["estado"].'",
			      "'.$productos[count($productos)-1]["piso"].'",
            "'.$productos[count($productos)-1]["corrida"].'",
			      "'.$productos[count($productos)-1]["id_sepultura"].'"
			    ]
			]
		}';


    }


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activar = new TablaProductosS();
$activar -> mostrarTablaS();





