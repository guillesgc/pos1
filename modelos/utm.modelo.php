<?php

require_once "conexion.php";

class ModeloUtm{

	/*=============================================
	CREAR UTM
	=============================================*/

	static public function mdlIngresarUtm($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(anno,mes,valor) VALUES (:anno, :mes, :valor)");

		$stmt->bindParam(":anno", $datos["anno"], PDO::PARAM_INT);
		$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_INT);
		$stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR UTM
	=============================================*/

	static public function mdlMostrarUtm($tabla, $item, $valor){

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
	MOSTRAR MESES
=============================================*/

    static public function mdlMostrarMeses($tabla, $item, $valor){

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
        MOSTRAR MESES
    =============================================*/

    static public function mdlMostrarUtmActual($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT valor FROM $tabla ORDER BY idutm DESC");

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
	EDITAR UTM
	=============================================*/

	static public function mdlEditarUtm($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET anno = :anno, mes= :mes, valor= :valor WHERE idutm = :idUtm");

		$stmt -> bindParam(":anno", $datos["anno"], PDO::PARAM_INT);
		$stmt -> bindParam(":mes", $datos["mes"], PDO::PARAM_INT);
		$stmt -> bindParam(":valor", $datos["valor"], PDO::PARAM_INT);
		$stmt -> bindParam(":idUtm", $datos["idUtm"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR UTM
	=============================================*/

	static public function mdlBorrarUtm($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idutm = :idUtm");

		$stmt -> bindParam(":idUtm", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

