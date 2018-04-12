<?php

class ControladorCementerio{

    public static function ctrMostrarCementerio($item,$valor){

        $tabla = "cementerios";

        $respuesta = ModeloCementerio::mdlMostrarCementerio($tabla, $item, $valor);

        return $respuesta;

    }
}