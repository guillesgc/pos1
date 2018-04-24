<?php

require_once "../controladores/difuntos.controlador.php";
require_once "../modelos/difuntos.modelo.php";

class AjaxSepulturasYDifuntos{

    /*=============================================
    DATOS PARA TABLA
    =============================================*/

    public $idSepultura;

    public function ajaxMostrarDifuntosSep(){

        $item = "id_sepultura";
        $valor = $this->idSepultura;

        $difuntos = ControladorDifuntos::ctrMostrarDifuntosEnSepultura($item,$valor);
        //var_dump($difuntos);
        echo '{
            "data": [';

        for ($i = 0; $i < count($difuntos) - 1; $i++) {
            echo '[
              "' . ($i + 1) . '",
              "' . $difuntos[$i]["nombre"] . '",
              "' . $difuntos[$i]["edad"] . '", 
              "' . $difuntos[$i]["fecha_sepultacion"] . '",
              "' . $difuntos[$i]["inscripcion"] . '",
              "' . $difuntos[$i]["circunscripcion"] . '",
              "' . $difuntos[$i]["causa_muerte"] . '",
            ],';
        }

            echo '[
              "' . count($difuntos) . '",
              "' . $difuntos[count($difuntos) - 1]["nombre"] . '",
              "' . $difuntos[count($difuntos) - 1]["edad"] . '", 
              "' . $difuntos[count($difuntos) - 1]["fecha_sepultacion"] . '",
              "' . $difuntos[count($difuntos) - 1]["inscripcion"] . '",
              "' . $difuntos[count($difuntos) - 1]["circunscripcion"] . '",
              "' . $difuntos[count($difuntos) - 1]["causa_muerte"] . '",
              ]
            ]
        }';


    }

}

/*=============================================
EDITAR CLIENTE
=============================================*/

if(isset($_POST["idSepultura"])){

    $Sepultura = new AjaxSepulturasYDifuntos();
    $Sepultura -> idSepultura = $_POST["idSepultura"];
    $Sepultura -> ajaxMostrarDifuntosSep();

}