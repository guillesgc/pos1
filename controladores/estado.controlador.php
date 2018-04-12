<?php

class ControladorEstado{

    /*=============================================
        MOSTRAR DIFUNTOS
    =============================================*/

    static public function ctrMostrarEstado($item,$valor){

        $tabla= "estado";

        $respuesta= ModeloEstado::mdlMostrarEstado($tabla,$item,$valor);

        return $respuesta;

    }
}