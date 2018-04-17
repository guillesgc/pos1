<?php

require_once "conexion.php";

class ModeloCredito{

    /*=============================================
    CREAR CREDITO
    =============================================*/

    static public function mdlIngresarCredito($tabla, $datos){

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
    MOSTRAR CREDITO
    =============================================*/

    static public function mdlMostrarCredito($tabla, $item, $valor){

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





    /*=============================================
    EDITAR CREDITO
    =============================================*/

    static public function mdlEditarCredito($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, id_cementerio= :id_cementerio, tipo_sep= :tipo_sep WHERE id_cuartel_cuerpo = :id_cuartel_cuerpo");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_cementerio", $datos["id_cementerio"], PDO::PARAM_INT);
        $stmt -> bindParam(":tipo_sep", $datos["tipo_sep"], PDO::PARAM_INT);
        $stmt -> bindParam(":id_cuartel_cuerpo", $datos["id_cuartel_cuerpo"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    BORRAR CREDITO
    =============================================*/

    static public function mdlBorrarCredito($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cuartel_cuerpo = :idCcuerpo");

        $stmt -> bindParam(":idCcuerpo", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;

    }

}
