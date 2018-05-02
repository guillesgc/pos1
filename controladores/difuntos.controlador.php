<?php

class ControladorDifuntos{

	/*=============================================
	CREAR DIFUNTOS
	=============================================*/

	static public function ctrCrearDifunto(){

		if(isset($_POST["nuevoDifunto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDifunto"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\. ]+$/', $_POST["nuevoApaterno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\. ]+$/', $_POST["nuevoAmaterno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\. ]+$/', $_POST["nuevaCmuerte"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\. ]+$/', $_POST["nuevaCircunscripcion"])){

			   	$tabla = "difuntos";

			   	$datos = array("nombre"=>$_POST["nuevoDifunto"],
					           "apellido_paterno"=>$_POST["nuevoApaterno"],
					           "apellido_materno"=>$_POST["nuevoAmaterno"],
					           "fecha_defuncion"=>$_POST["nuevaFdefuncion"],
					           "fecha_sepultacion"=>$_POST["nuevaFsepultacion"],
					           "causa_muerte"=>$_POST["nuevaCmuerte"],
					           "edad"=>$_POST["nuevaEdad"],
					           "sexo"=>$_POST["nuevoSexo"],
					           "inscripcion"=>$_POST["nuevaInscripcion"],
					           "circunscripcion"=>$_POST["nuevaCircunscripcion"],
					           "id_sepultura"=>$_POST["idNumSepultura"],
					           "id_boletin"=>$_POST["nuevoBoletin"],
					           "rut"=>$_POST["nuevoRut"]
					       );
                //var_dump($datos);
			   	$respuesta = ModeloDifuntos::mdlIngresarDifunto($tabla, $datos);
			   	//var_dump($respuesta);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El difunto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "difuntos";

									}
								})

					</script>';

				}else{
			   	    echo'<script>

					swal({
						  type: "error",
						  title: "¡El difunto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "difuntos";

							}
						})

			  	</script>';
                }

			}
		}

	}

	/*=============================================
	MOSTRAR DIFUNTOS
	=============================================*/

	static public function ctrMostrarDifuntos($item, $valor){

		$tabla = "difuntos";

		$respuesta = ModeloDifuntos::mdlMostrarDifuntos($tabla, $item, $valor);

		return $respuesta;

	}
    static public function ctrMostrarDifuntosYNumSepultura($item, $valor){

        $tabla = "difuntos";

        $respuesta = ModeloDifuntos::mdlMostrarDifuntosYNumSepultura($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrMostrarDifuntosYSepultura($item, $valor){

        $tabla = "difuntos";

        $respuesta = ModeloDifuntos::mdlMostrarDifuntosYSepultura($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrMostrarDifuntosEnSepultura($item, $valor){

        $tabla = "difuntos";

        $respuesta = ModeloDifuntos::mdlMostrarDifuntosEnSepultura($tabla, $item, $valor);

        return $respuesta;

    }

	/*=============================================
	EDITAR DIFUNTOS
	=============================================*/

	static public function ctrEditarDifunto(){

		if(isset($_POST["editarDifunto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDifunto"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApaterno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAmaterno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCircunscripcion"])){

			   	$tabla = "difuntos";
			   	$datos = array("iddifunto"=>$_POST["idDifunto"],
			   				   "nombre"=>$_POST["editarDifunto"],
					           "apaterno"=>$_POST["editarApaterno"],
					           "amaterno"=>$_POST["editarAmaterno"],
					           "fdefuncion"=>$_POST["editarFdefuncion"],
					           "fsepultacion"=>$_POST["editarFsepultacion"],
					       	   "cmuerte"=>$_POST["editarCmuerte"],
					   		   "edad"=>$_POST["editarEdad"],
			   				   "sexo"=>$_POST["editarSexo"],
                               "inscripcion"=>$_POST["editarInscripcion"],
			   				   "circunscripcion"=>$_POST["editarCircunscripcion"],
			   				   "id_sepultura"=>$_POST["editarIdNumSepultura"]);

			   	$respuesta = ModeloDifuntos::mdlEditarDifunto($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El difunto ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "difuntos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El difunto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "difuntos";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR DIFUNTOS
	=============================================*/

	static public function ctrEliminarDifunto(){

		if(isset($_GET["idDifunto"])){

			$tabla ="difuntos";
			$datos = $_GET["idDifunto"];

			$respuesta = ModeloDifuntos::mdlEliminarDifunto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El difunto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "difuntos";

								}
							})

				</script>';

			}		

		}

	}

}

