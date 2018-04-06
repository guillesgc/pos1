<?php

require_once "conexion.php";

class ModeloTsepultura{

	/*=============================================
	CREAR TIPO SEPULTURA
	=============================================*/

	static public function mdlIngresarTsepultura($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,familiar,id_centro_costo) VALUES (:nombre, :familiar, :id_centro_costo)");
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":familiar", $datos["familiar"], PDO::PARAM_INT);
		$stmt->bindParam(":id_centro_costo", $datos["id_centro_costo"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR TIPO SEPULTURA
	=============================================*/

	static public function mdlMostrarTsepultura($tabla, $item, $valor){

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
	EDITAR TIPO SEPULTURA
	=============================================*/

	static public function mdlEditarTsepultura($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, familiar = :familiar, id_centro_costo = :id_centro_costo WHERE id_tipo_sepultura = :id_tipo_sepultura");

		$stmt -> bindParam(":id_tipo_sepultura", $datos["id_tipo_sepultura"], PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":familiar", $datos["familiar"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_centro_costo", $datos["id_centro_costo"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR TIPO SEPULTURA
	=============================================*/

	static public function mdlBorrarTsepultura($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tipo_sepultura = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

