<?php

class ControladorDifuntosxProducto{

   

    /*=============================================
    MOSTRAR DATOS DE SEPULTURA DONDE ESTA DIFUNTO
    =============================================*/

    static public function ctrMostrarDatosSepultura($item, $valor){

        $respuesta = ModeloDxp::mdlMostrarDatosSepultura($item, $valor);

        return $respuesta;

    }


   /*=============================================
    MOSTRAR DIFUNTOS POR PRODUCTO
    =============================================*/

    static public function ctrMostrarDifuntosxproducto($item, $valor){

        $tabla="difuntos";

        $respuesta = ModeloDxp::mdlMostrarDatosDifunto($tabla, $item, $valor);

        return $respuesta;

    }
   
}
