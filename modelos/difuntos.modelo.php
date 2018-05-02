<?php

require_once "conexion.php";

class ModeloDifuntos{

	/*=============================================
	CREAR DIFUNTOS
	=============================================*/

	static public function mdlIngresarDifunto($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido_paterno, apellido_materno, fecha_defuncion, fecha_sepultacion, causa_muerte, edad, sexo, inscripcion, circunscripcion, id_sepultura, id_boletin, rut) VALUES (:nombre, :apellido_paterno, :apellido_materno, :fecha_defuncion, :fecha_sepultacion, :causa_muerte, :edad, :sexo, :inscripcion, :circunscripcion, :id_sepultura, :id_boletin, :rut)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_defuncion", $datos["fecha_defuncion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_sepultacion", $datos["fecha_sepultacion"], PDO::PARAM_STR);
		$stmt->bindParam(":causa_muerte", $datos["causa_muerte"], PDO::PARAM_STR);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_INT);
		$stmt->bindParam(":inscripcion", $datos["inscripcion"], PDO::PARAM_INT);
		$stmt->bindParam(":circunscripcion", $datos["circunscripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_sepultura", $datos["id_sepultura"], PDO::PARAM_INT);
		$stmt->bindParam(":id_boletin", $datos["id_boletin"], PDO::PARAM_INT);
		$stmt->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
        //print_r($stmt);
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR DIFUNTOS
	=============================================*/

	static public function mdlMostrarDifuntos($tabla, $item, $valor){

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

    static public function mdlMostrarDifuntosYNumSepultura($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN sepulturas ON difuntos.id_sepultura = sepulturas.id_sepultura WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN sepulturas ON difuntos.id_sepultura = sepulturas.id_sepultura");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlMostrarDifuntosYSepultura($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN sepulturas ON difuntos.id_sepultura = sepulturas.id_sepultura
                                                              JOIN cuartel_cuerpos ON sepulturas.id_cuartel_cuerpos = cuartel_cuerpos.id_cuartel_cuerpos
                                                              WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN sepulturas ON difuntos.id_sepultura = sepulturas.id_sepultura
                                                             JOIN cuartel_cuerpos ON sepulturas.id_cuartel_cuerpos = cuartel_cuerpos.id_cuartel_cuerpos");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }


    /*=============================================
	MOSTRAR DIFUNTOS
	=============================================*/
    static public function mdlMostrarDifuntosEnSepultura($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }

	/*=============================================
	EDITAR DIFUNTOS
	=============================================*/

	static public function mdlEditarDifunto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido_paterno = :apaterno, apellido_materno = :amaterno, fecha_defuncion = :fdefuncion, fecha_sepultacion = :fsepultacion, causa_muerte = :cmuerte, edad= :edad, sexo= :sexo, inscripcion= :inscripcion, circunscripcion= :circunscripcion, id_sepultura= :id_sepultura WHERE id_difunto = :iddifunto");

		$stmt->bindParam(":iddifunto", $datos["iddifunto"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apaterno", $datos["apaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":amaterno", $datos["amaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":fdefuncion", $datos["fdefuncion"], PDO::PARAM_STR);
		$stmt->bindParam(":fsepultacion", $datos["fsepultacion"], PDO::PARAM_STR);
		$stmt->bindParam(":cmuerte", $datos["cmuerte"], PDO::PARAM_STR);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_INT);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_INT);
        $stmt->bindParam(":circunscripcion", $datos["circunscripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":inscripcion", $datos["inscripcion"], PDO::PARAM_INT);
		$stmt->bindParam(":id_sepultura", $datos["id_sepultura"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR DIFUNTOS
	=============================================*/

	static public function mdlEliminarDifunto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_difunto = :id");

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