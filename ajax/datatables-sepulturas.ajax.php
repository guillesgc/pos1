<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

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

            //saco el id tiposepultura dependiendo del id cuartel cuerpo
            $item = "id_cuartel_cuerpo";
            $valor = $productos[$i]["id_cuartel_cuerpo"];
            $tiposepultura = ControladorCcuerpo::ctrMostrarCcuerpo($item, $valor);
            $id=$tiposepultura["tipo_sep"];

            //saco el tipo de sepultura con el $id retornado
            $item = "id_tipo_sepultura";
            $valor = $id;
            $nombre = ControladorTsepultura::ctrMostrarTsepultura($item, $valor);

            //saca el estado
            $item = "id_estado";
            $valor = $productos[$i]["estado"];
            $estado = ControladorSepultura::ctrMostrarEstado($item, $valor);

            $item = "id_cuartel_cuerpo";
            $valor = $productos[$i]["id_cuartel_cuerpo"];

            $CCuerpo = ControladorCcuerpo::ctrMostrarCcuerpo($item, $valor);

        echo '[
              "'.($i+1).'",
              "'.$nombre["nombre"].'",
              "'.$CCuerpo["nombre"].'", 
              "'.$productos[$i]["numero_sepultura"].'",
              "'.$estado["estado"].'",
              "'.$productos[$i]["corrida"].'",
              "'.$productos[$i]["piso"].'",
              "'.$productos[$i]["id_sepultura"].'"
        ],';

        }

        //saco el tipo de sepultura dependiento del id cuartel cuerpo
        $item = "id_cuartel_cuerpo";
        $valor = $productos[$i]["id_cuartel_cuerpo"];
        $tiposepultura = ControladorCcuerpo::ctrMostrarCcuerpo($item, $valor);
        $id=$tiposepultura["tipo_sep"];

        //saco el tipo de sepultura con el $tiposepultura retornado
        $item = "id_tipo_sepultura";
        $valor = $id;
        $nombre = ControladorTsepultura::ctrMostrarTsepultura($item, $valor);

        //saca el estado
        $item = "id_estado";
        $valor = $productos[$i]["estado"];
        $estado = ControladorSepultura::ctrMostrarEstado($item, $valor);

        $item = "id_cuartel_cuerpo";
        $valor = $productos[$i]["id_cuartel_cuerpo"];
        $CCuerpo = ControladorCcuerpo::ctrMostrarCcuerpo($item, $valor);

        echo'[
			      "'.count($productos).'",
			      "'.$nombre["nombre"].'",
			      "'.$CCuerpo["nombre"].'",
			      "'.$productos[count($productos)-1]["numero_sepultura"].'",
			      "'.$estado["estado"].'",
			      "'.$productos[count($productos)-1]["corrida"].'",
			      "'.$productos[count($productos)-1]["piso"].'",
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





