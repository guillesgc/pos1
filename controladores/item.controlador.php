<?php

class ControladorItem{

	/*=============================================
	CREAR ITEM
	=============================================*/

	static public function ctrCrearItem(){

		if(isset($_POST["nuevoItem"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\() ]+$/', $_POST["nuevoItem"])){

				$tabla = "items";

				$datos = array("nombre"=> $_POST["nuevoItem"],
					           "id_centro_costo"=> $_POST["nuevoCcosto"],
					           "precio"=> $_POST["nuevoPrecio"]);

				$respuesta = ModeloItem::mdlIngresarItem($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El item ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "item";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El item no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "item";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR ITEM
	=============================================*/

	static public function ctrMostrarItem($item, $valor){

		$tabla = "items";

		$respuesta = ModeloItem::mdlMostrarItem($tabla, $item, $valor);

		return $respuesta;
	
	}

    /*=============================================
    MOSTRAR ITEM CON STOCK
    =============================================*/

    static public function ctrMostrarItemYCategoria($item, $valor){

        $tabla = "items";

        $respuesta = ModeloItem::mdlMostrarItemYCategoria($tabla, $item, $valor);

        return $respuesta;

    }

	/*=============================================
	EDITAR ITEM
	=============================================*/

	static public function ctrEditarItem(){

		if(isset($_POST["editarItem"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\() ]+$/', $_POST["editarItem"])){

				$tabla = "items";

				$datos = array("nombre"=>$_POST["editarItem"],
							   "id_centro_costo"=>$_POST["editarCcosto"],
							    "precio"=>$_POST["editarPrecio"],
								"idItem"=>$_POST["idItem"]);

				$respuesta = ModeloItem::mdlEditarItem($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El item ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "item";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El item no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "item";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ITEM
	=============================================*/

	static public function ctrBorrarItem(){

		if(isset($_GET["idItem"])){

			$tabla ="items";
			$datos = $_GET["idItem"];

			$respuesta = ModeloItem::mdlBorrarItem($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El item ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "item";

									}
								})

					</script>';
			}
		}
		
	}
}
