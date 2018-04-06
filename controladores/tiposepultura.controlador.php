<?php

class ControladorTsepultura{

	/*=============================================
	CREAR CCOSTO
	=============================================*/

	static public function ctrCrearTsepultura(){

		if(isset($_POST["nuevoTsepultura"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTsepultura"])){

				$tabla = "tipo_sepultura";

				$datos = array("nombre"=> $_POST["nuevoTsepultura"],
					           "familiar"=> $_POST["nuevoPfamiliar"],
					           "id_centro_costo"=> $_POST["nuevoIccosto"]);

				$respuesta = ModeloTsepultura::mdlIngresarTsepultura($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de sepultura ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipo-sepultura";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El tipo de sepultura no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipo-sepultura";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR TIPO SEPULTURA
	=============================================*/

	static public function ctrMostrarTsepultura($item, $valor){

		$tabla = "tipo_sepultura";

		$respuesta = ModeloTsepultura::mdlMostrarTsepultura($tabla, $item, $valor);

		return $respuesta;
	
	}


	/*=============================================
	EDITAR TIPO SEPULTURA
	=============================================*/

	static public function ctrEditarTsepultura(){

		if(isset($_POST["editarTsepultura"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTsepultura"])){

				$tabla = "tipo_sepultura";

				$datos = array("id_tipo_sepultura"=>$_POST["idTsepultura"],
							   "nombre"=>$_POST["editarTsepultura"],
							   "familiar"=>$_POST["editarPfamiliar"],
							   "id_centro_costo"=>$_POST["editarIccosto"]);

				$respuesta = ModeloTsepultura::mdlEditarTsepultura($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de sepultura ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipo-sepultura";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El tipo de sepultura no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipo-sepultura";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TIPO SEPULTURA
	=============================================*/

	static public function ctrBorrarTsepultura(){

		if(isset($_GET["idTsepultura"])){

			$tabla ="tipo_sepultura";
			$datos = $_GET["idTsepultura"];

			$respuesta = ModeloTsepultura::mdlBorrarTsepultura($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de sepultura ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipo-sepultura";

									}
								})

					</script>';
			}
		}
		
	}
}
