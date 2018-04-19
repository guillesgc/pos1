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

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_credito = :id_credito, id_cliente = :id_cliente, fecha_pago = :fecha_pago, detalle = :detalle, pie= :pie, numcuotas = :numcuotas, boletin = :boletin, valor_credito = :valor_credito, valor_cuota = :valor_cuota, estado = :estado WHERE id_credito = :id_credito");

        $stmt -> bindParam(":id_credito", $datos["id_credito"], PDO::PARAM_INT);
        $stmt -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt -> bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
        $stmt -> bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
        $stmt -> bindParam(":pie", $datos["pie"], PDO::PARAM_INT);
        $stmt -> bindParam(":numcuotas", $datos["numcuotas"], PDO::PARAM_INT);
        $stmt -> bindParam(":boletin", $datos["boletin"], PDO::PARAM_INT);
        $stmt -> bindParam(":valor_credito", $datos["valor_credito"], PDO::PARAM_INT);
        $stmt -> bindParam(":valor_cuota", $datos["valor_cuota"], PDO::PARAM_INT);
        $stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

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

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_credito = :id_credito");

        $stmt -> bindParam(":id_credito", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;

    }

}
