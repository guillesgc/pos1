<?php

class ControladorAgenda{

	/*=============================================
	CREAR AGENDA
	=============================================*/

	static public function ctrCrearAgenda(){

		if(isset($_POST["nuevaGlosa"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/ - - ]+$/', $_POST["nuevaGlosa"])){

				$tabla = "agenda";

				$datos = array("glosa"=> $_POST["nuevaGlosa"],
					           "tipo_agenda"=> $_POST["nuevoTipoagenda"],
					           "boletin"=> $_POST["nuevoBoletin"],
					           "fecha_registro"=> $_POST["nuevaFecha"],
					           "hora"=> $_POST["nuevaHora"],
					       	   "activo"=> $_POST["nuevoActivo"]);

				$respuesta = ModeloAgenda::mdlIngresarAgenda($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "agenda";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "agenda";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR AGENDA
	=============================================*/

	static public function ctrMostrarAgenda($item, $valor){

		$tabla = "agenda";

		$respuesta = ModeloAgenda::mdlMostrarAgenda($tabla, $item, $valor);

		return $respuesta;
	
	}

	

	/*=============================================
	EDITAR AGENDA
	=============================================*/

	static public function ctrEditarAgenda(){

		if(isset($_POST["editarGlosa"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/ - - ]+$/', $_POST["editarGlosa"])){

				$tabla = "agenda";

				$datos = array("idAgenda"=>$_POST["idAgenda"],
								"glosa"=>$_POST["editarGlosa"],
								"tipo_agenda" =>$_POST["editarTipoagenda"],
								"boletin"=>$_POST["editarBoletin"],
							    "fecha_registro"=>$_POST["editarFecha"],
							    "hora"=>$_POST["editarHora"],
							    "activo"=>$_POST["editarActivo"]);

				$respuesta = ModeloAgenda::mdlEditarAgenda($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "agenda";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "agenda";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR AGENDA
	=============================================*/

	static public function ctrBorrarAgenda(){

		if(isset($_GET["idAgenda"])){

			$tabla ="agenda";
			$datos = $_GET["idAgenda"];

			$respuesta = ModeloAgenda::mdlBorrarAgenda($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "agenda";

									}
								})

					</script>';
			}
		}
		
	}
}
