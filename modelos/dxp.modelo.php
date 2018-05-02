<?php

require_once "conexion.php";

class ModeloDxp{

 
    /*=============================================
    MOSTRAR DATOS DE LA SEPULTUTA
    =============================================*/

    static public function mdlMostrarDatosSepultura($item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT tipo_sepultura.nombre AS nombretp, cuartel_cuerpos.nombre AS nombrecc, sepulturas.numero_sepultura AS numero, sepulturas.id_sepultura AS idsepultura, sepulturas.estado AS estado, estado.estado as nombre_estado FROM tipo_sepultura INNER JOIN cuartel_cuerpos ON cuartel_cuerpos.tipo_sep = tipo_sepultura.id_tipo_sepultura INNER JOIN sepulturas ON sepulturas.id_cuartel_cuerpo = cuartel_cuerpos.id_cuartel_cuerpo INNER JOIN estado ON sepulturas.estado = estado.id_estado WHERE sepulturas.id_sepultura= $valor");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();


            return $stmt -> fetch();

        }

        $stmt -> close();

        $stmt = null;

    }


 /*=============================================
    MOSTRAR CREDITO PARA EDITAR
    =============================================*/

    static public function mdlMostrarDatosDifunto($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();


            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }



}
