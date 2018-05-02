<?php

require_once "conexion.php";

class ModeloCuota{

    /*=============================================
    CREAR CUOTA
    =============================================*/

    static public function mdlIngresarCuota($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_credito, boletin, fecha_pago, monto_cancelado, glosa) VALUES (:idCredito, :boletin, :fecha, :monto, :glosa)");

        $stmt->bindParam(":idCredito", $datos["idCredito"], PDO::PARAM_INT);
        $stmt->bindParam(":boletin", $datos["boletin"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_INT);
        $stmt->bindParam(":glosa", $datos["glosa"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

 /*=============================================
    MOSTRAR CUOTA SIN ID DE CREDITO
    =============================================*/

    static public function mdlMostrarCuota($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

            $stmt -> execute();


            return $stmt -> fetch();

        }

        $stmt -> close();

        $stmt = null;

    }


    /*=============================================
    MOSTRAR CUOTA CON ID DE CREDITO
    =============================================*/

    static public function mdlMostrarCuotaCC($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

            $stmt -> execute();


            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }


 /*=============================================
    CUOTAS PAGADAS
    =============================================*/

    static public function mdlCuotasPagadas($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT SUM(monto_cancelado) as total_pagado FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

            $stmt -> execute();


            return $stmt -> fetch();

        }
}

/*=============================================
    MOSTRAR GLOSA DEL CREDITO
    =============================================*/

    static public function mdlMostrarCredito2($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

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
    EDITAR CUOTA
    =============================================*/

    static public function mdlEditarCuota($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha_pago = :fecha, glosa = :glosa, monto_cancelado = :monto, boletin= :boletin WHERE id_cuota = :idCuota");
        //var_dump($stmt);
        $stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt -> bindParam(":glosa", $datos["glosa"], PDO::PARAM_STR);
        $stmt -> bindParam(":monto", $datos["monto"], PDO::PARAM_INT);
        $stmt -> bindParam(":boletin", $datos["boletin"], PDO::PARAM_INT);
        $stmt -> bindParam(":idCuota", $datos["idCuota"], PDO::PARAM_INT);
        //var_dump($stmt);
        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    BORRAR CUOTA
    =============================================*/

    static public function mdlBorrarCuota($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cuota = :xx");

        $stmt -> bindParam(":xx", $datos, PDO::PARAM_INT);

        //echo "stmt".$stmt;

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;

    }

}
