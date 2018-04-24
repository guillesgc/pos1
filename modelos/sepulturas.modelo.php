<?php

require_once "conexion.php";

class ModeloSepultura{

	/*=============================================
	CREAR SEPULTURA
	=============================================*/

	static public function mdlIngresarSepultura($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numero_sepultura, id_cuartel_cuerpo, estado, capacidad, id_cementerio, activo, corrida, piso, orden) VALUES (:numero_sepultura, :id_cuartel_cuerpo, :estado, :capacidad, :id_cementerio, :activo, :corrida, :piso, :orden)");

		$stmt->bindParam(":numero_sepultura", $datos["numero_sepultura"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cuartel_cuerpo", $datos["id_cuartel_cuerpo"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":capacidad", $datos["capacidad"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cementerio", $datos["id_cementerio"], PDO::PARAM_INT);
		$stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_INT);
		$stmt->bindParam(":corrida", $datos["corrida"], PDO::PARAM_INT);
		$stmt->bindParam(":piso", $datos["piso"], PDO::PARAM_INT);
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	/*=============================================
	MOSTRAR SEPULTURAS
	=============================================*/

	static public function mdlMostrarSepultura($tabla, $item, $valor){

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

	static public function mdlMostrarDifuntosEnSepultura($tabla, $item, $valor){

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

    static public function mdlMostrarSepulturaDisponible($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();


            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado != 2");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }



/*=============================================
	MOSTRAR ESTADO
	=============================================*/

	static public function mdlMostrarEstado($tabla, $item, $valor){

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
	EDITAR SEPULTURA
	=============================================*/

	static public function mdlEditarSepultura($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_sepultura = :id_sepultura, orden = :orden, numero_sepultura = :numero_sepultura, id_cuartel_cuerpo = :id_cuartel_cuerpo, estado = :estado, capacidad = :capacidad, activo = :activo, id_cementerio = :id_cementerio, corrida = :corrida, piso = :piso WHERE id_sepultura = :id_sepultura");

		$stmt -> bindParam(":id_sepultura", $datos["id_sepultura"], PDO::PARAM_INT);
		$stmt -> bindParam(":orden", $datos["orden"], PDO::PARAM_INT);
		$stmt -> bindParam(":numero_sepultura", $datos["numero_sepultura"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_cuartel_cuerpo", $datos["id_cuartel_cuerpo"], PDO::PARAM_INT);
		$stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		$stmt -> bindParam(":capacidad", $datos["capacidad"], PDO::PARAM_INT);
		$stmt -> bindParam(":activo", $datos["activo"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_cementerio", $datos["id_cementerio"], PDO::PARAM_INT);
		$stmt -> bindParam(":corrida", $datos["corrida"], PDO::PARAM_INT);
		$stmt -> bindParam(":piso", $datos["piso"], PDO::PARAM_INT);
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR SEPULTURA
	=============================================*/

	static public function mdlBorrarSepultura($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sepultura = :idSepultura");

		$stmt -> bindParam(":idSepultura", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

