<?php

class ControladorCcosto{

	/*=============================================
	CREAR CCOSTO
	=============================================*/

	static public function ctrCrearCcosto(){

		if(isset($_POST["nuevaCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

				$tabla = "categorias";

				$datos = $_POST["nuevaCategoria"];

				$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Centro de costo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ccosto";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Centro de costo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ccosto";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CCOSTO
	=============================================*/

	static public function ctrMostrarCcosto($item, $valor){

        $tabla = "categorias";

        $respuesta = ModeloCcosto::mdlMostrarCcosto($tabla, $item, $valor);

        return $respuesta;

    }



	/*=============================================
	EDITAR CCOSTO
	=============================================*/

	static public function ctrEditarCcosto(){

		if(isset($_POST["editarCcosto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCcosto"])){

				$tabla = "categorias";

				$datos = array("categoria"=>$_POST["editarCcosto"],
							   "id"=>$_POST["idCcosto"]);

				$respuesta = ModeloCcosto::mdlEditarCcosto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Centro de costo ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ccosto";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Centro de costo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ccosto";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CCOSTO
	=============================================*/

	static public function ctrBorrarCcosto(){

		if(isset($_GET["idCategoria"])){

			$tabla ="Categorias";
			$datos = $_GET["idCategoria"];

			$respuesta = ModeloCcosto::mdlBorrarCcosto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Centro de costo ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ccosto";

									}
								})

					</script>';
			}
		}
		
	}
}
