<?php

require_once "conexion.php";

class ModeloTraslado{

    /*=============================================
    CREAR CREDITO
    =============================================*/

    static public function mdlIngresarTraslado($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_cliente, fecha_pago, detalle, pie, numcuotas, boletin, valor_credito, valor_cuota, estado) VALUES (:cliente, :fecha, :detalle, :pie, :numcuotas, :boletin, :valorcredito, :valorcuota, :estado)");

        $stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
        $stmt->bindParam(":pie", $datos["pie"], PDO::PARAM_INT);
        $stmt->bindParam(":numcuotas", $datos["numcuotas"], PDO::PARAM_INT);
        $stmt->bindParam(":boletin", $datos["boletin"], PDO::PARAM_INT);
        $stmt->bindParam(":valorcredito", $datos["valorcredito"], PDO::PARAM_INT);
        $stmt->bindParam(":valorcuota", $datos["valorcuota"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }


    /*=============================================
    MOSTRAR DIFUNTO EN TRASLADO
    =============================================*/

    static public function mdlMostrarDtraslado($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();


            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }


}
