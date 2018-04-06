<?php

require_once "conexion.php";

class ModeloAgenda{

	/*=============================================
	CREAR AGENDA
	=============================================*/

	static public function mdlIngresarAgenda($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(glosa, tipo_agenda, boletin, fecha_evento, hora, activo) VALUES (:glosa, :tipo_agenda, :boletin, :fecha_registro, :hora, :activo)");

		$stmt->bindParam(":glosa", $datos["glosa"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_agenda", $datos["tipo_agenda"], PDO::PARAM_INT);
		$stmt->bindParam(":boletin", $datos["boletin"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);
		$stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
		$stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR AGENDA
	=============================================*/

	static public function mdlMostrarAgenda($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha_evento DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
			

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha_evento DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	EDITAR AGENDA
	=============================================*/

	static public function mdlEditarAgenda($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET glosa = :glosa, tipo_agenda= :tipo_agenda, boletin= :boletin, fecha_evento= :fecha_registro, hora= :hora, activo= :activo WHERE id_agenda = :idAgenda");

		$stmt -> bindParam(":idAgenda", $datos["idAgenda"], PDO::PARAM_INT);
		$stmt -> bindParam(":glosa", $datos["glosa"], PDO::PARAM_STR);
		$stmt -> bindParam(":tipo_agenda", $datos["tipo_agenda"], PDO::PARAM_INT);
		$stmt -> bindParam(":boletin", $datos["boletin"], PDO::PARAM_INT);
		$stmt -> bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);
		$stmt -> bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
		$stmt -> bindParam(":activo", $datos["activo"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR AGENDA
	=============================================*/

	static public function mdlBorrarAgenda($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_agenda = :idAgenda");

		$stmt -> bindParam(":idAgenda", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

