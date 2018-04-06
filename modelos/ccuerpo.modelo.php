<?php

require_once "conexion.php";

class ModeloCcuerpo{

	/*=============================================
	CREAR CUERPO CUARTEL
	=============================================*/

	static public function mdlIngresarCcuerpo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,id_cementerio,tipo_sep) VALUES (:nombre, :id_cementerio, :tipo_sep)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cementerio", $datos["id_cementerio"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo_sep", $datos["tipo_sep"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CUERPO CUARTEL
	=============================================*/

	static public function mdlMostrarCcuerpo($tabla, $item, $valor){

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


    static public function mdlMostrarCcuerpoTSepultura($tipo_sepultura){

	        $stmt = Conexion::conectar()->prepare(" SELECT cuartel_cuerpos.id_cuartel_cuerpo, cuartel_cuerpos.nombre, cuartel_cuerpos.tipo_sep 
                                                              FROM cuartel_cuerpos
                                                              JOIN tipo_sepultura
                                                              ON cuartel_cuerpos.tipo_sep=tipo_sepultura.id_tipo_sepultura
                                                              WHERE tipo_sepultura.id_tipo_sepultura = :tipo_sepultura");

	        $stmt -> bindParam(':tipo_sepultura',$tipo_sepultura,PDO::PARAM_INT);

            $stmt -> execute();

            return $stmt -> fetchAll();

            $stmt -> close();

            $stmt = null;

    }

    static public function mdlMostrarCcuerpoNumSepultura($cuartel_cuerpo){

        $stmt = Conexion::conectar()->prepare("SELECT id_sepultura, numero_sepultura, id_cuartel_cuerpo 
                                                         FROM sepulturas
                                                         WHERE id_cuartel_cuerpo = :cuartel_cuerpo");

        $stmt -> bindParam(':cuartel_cuerpo',$cuartel_cuerpo,PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }

/*=============================================
	MOSTRAR TIPO PRODUCTO
	=============================================*/

	static public function mdlMostrarTproducto($tabla, $item, $valor){

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
	MOSTRAR CEMENTERIO
	=============================================*/

	static public function mdlMostrarCementerio($tabla, $item, $valor){

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
	EDITAR CCOSTO
	=============================================*/

	static public function mdlEditarCcuerpo($tabla, $datos){

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
	BORRAR CCOSTO
	=============================================*/

	static public function mdlBorrarCcuerpo($tabla, $datos){

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

