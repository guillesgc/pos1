<?php

require_once "conexion.php";

class ModeloItem{

	/*=============================================
	CREAR ITEM
	=============================================*/

	static public function mdlIngresarItem($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, id_centro_costo, precio) VALUES (:nombre, :id_centro_costo, :precio)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":id_centro_costo", $datos["id_centro_costo"], PDO::PARAM_INT);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ITEM
	=============================================*/

	static public function mdlMostrarItem($tabla, $item, $valor){

		if(strcmp($item, 'null') != 0){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY nombre");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
			

			return $stmt -> fetch();

		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


    /*=============================================
    MOSTRAR ITEM
    =============================================*/

    static public function mdlMostrarItemYCategoria($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM items JOIN categorias ON items.id_centro_costo = categorias.id WHERE $item = :$item ORDER BY nombre");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();


            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM items JOIN categorias ON items.id_centro_costo = categorias.id");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }


	/*=============================================
	EDITAR ITEM
	=============================================*/

	static public function mdlEditarItem($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, id_centro_costo = :id_centro_costo, precio = :precio WHERE id_item = :idItem");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_centro_costo", $datos["id_centro_costo"], PDO::PARAM_INT);
		$stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt -> bindParam(":idItem", $datos["idItem"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR ITEM
	=============================================*/

	static public function mdlBorrarItem($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_item = :idItem");

		$stmt -> bindParam(":idItem", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

