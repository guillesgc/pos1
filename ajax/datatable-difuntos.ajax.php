<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php

require_once "../controladores/difuntos.controlador.php";
require_once "../modelos/difuntos.modelo.php";

require_once "../controladores/tiposepultura.controlador.php";
require_once "../modelos/tiposepultura.modelo.php";

require_once "../controladores/ccuerpo.controlador.php";
require_once "../modelos/ccuerpo.modelo.php";


class tablaDifuntos{

    /*=============================================
    MOSTRAR LA TABLA DE DIFUNTOS
    =============================================*/

    public function mostrarTablaDifuntos(){

        $item = null;
        $valor = null;

        $difuntos = ControladorDifuntos::ctrMostrarDifuntosYNumSepultura($item, $valor);

        echo '{
            "data": [';

        for($i = 0; $i < count($difuntos)-1; $i++){

            //AGREGAR TIPO SEPULTURA
            $id_sep = $difuntos[$i]["id_sepultura"];
            $item = "id_tipo_sepultura";
            $x = ControladorTsepultura::ctrMostrarTsepultura($item, $id_sep);

            //AGREGAR CUARTEL CUERPO
            $id_cc = $difuntos[$i]["id_cuartel_cuerpo"];
            //print_r($id_cc);
            $item = "id_cuartel_cuerpo";
            $y = ControladorCcuerpo::ctrMostrarCcuerpo($item, $id_cc);

            echo '[
                "'.($i+1).'",
                "'.$difuntos[$i]["nombre"].'",
                "'.$difuntos[$i]["apellido_paterno"].'",
                "'.$difuntos[$i]["apellido_materno"].'",
                "'.$difuntos[$i]["rut"].'",
                "'.$x["nombre"].'",
                "'.$y["nombre"].'",
                "'.$difuntos[$i]["numero_sepultura"].'",
                "'.$difuntos[$i]["fecha_sepultacion"].'",
                "'.$difuntos[$i]["inscripcion"].'",
                "'.$difuntos[$i]["circunscripcion"].'",
                "'.$difuntos[$i]["id_boletin"].'",
                "'.$difuntos[$i]["id_difunto"].'"
            ],';
        }
        //AGREGAR TIPO SEPULTURA
        $id_sep = $difuntos[$i]["id_sepultura"];
        $item = "id_tipo_sepultura";
        $x = ControladorTsepultura::ctrMostrarTsepultura($item, $id_sep);

        //AGREGAR CUARTEL CUERPO
        $id_cc = $difuntos[$i]["id_cuartel_cuerpo"];
        $item = "id_cuartel_cuerpo";
        $y = ControladorCcuerpo::ctrMostrarCcuerpo($item, $id_cc);

        echo '[
                "'.count($difuntos).'",
                "'.$difuntos[count($difuntos)-1]["nombre"].'",
                "'.$difuntos[count($difuntos)-1]["apellido_paterno"].'",
                "'.$difuntos[count($difuntos)-1]["apellido_materno"].'",
                "'.$difuntos[count($difuntos)-1]["rut"].'",
                "'.$x["nombre"].'",
                "'.$y["nombre"].'",
                "'.$difuntos[count($difuntos)-1]["numero_sepultura"].'",
                "'.$difuntos[count($difuntos)-1]["fecha_sepultacion"].'",
                "'.$difuntos[count($difuntos)-1]["inscripcion"].'",
                "'.$difuntos[count($difuntos)-1]["circunscripcion"].'",
                "'.$difuntos[count($difuntos)-1]["id_boletin"].'",
                "'.$difuntos[$i]["id_difunto"].'"
              ]
           ]
        }';
    }
}

/*=============================================
ACTIVAR TABLA DE DIFUNTOS
=============================================*/
$activar = new tablaDifuntos();
$activar -> mostrarTablaDifuntos();
