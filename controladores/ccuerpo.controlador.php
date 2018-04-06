<?php

class ControladorCcuerpo{

	/*=============================================
	CREAR CUARTEL CUERPO
	=============================================*/

	static public function ctrCrearCcuerpo(){

		if(isset($_POST["nuevoCcuerpo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["nuevoCcuerpo"])){

				$tabla = "cuartel_cuerpos";

				$datos = array("nombre"=> $_POST["nuevoCcuerpo"],
					           "id_cementerio"=> $_POST["nuevoCementerio"],
					           "tipo_sep"=> $_POST["nuevoTproducto"]);

				$respuesta = ModeloCcuerpo::mdlIngresarCcuerpo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Cuartel-Cuerpo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cuartel-cuerpo";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Cuartel-Cuerpo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cuartel-cuerpo";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CUARTEL_CUERPO
	=============================================*/

	static public function ctrMostrarCcuerpo($item, $valor){

		$tabla = "cuartel_cuerpos";

		$respuesta = ModeloCcuerpo::mdlMostrarCcuerpo($tabla, $item, $valor);

		return $respuesta;
	
	}

    static public function ctrMostrarCcuerpoTSepultura($tipo_sepultura){
        //$tabla = "cuartel_cuerpos";
        $respuesta = ModeloCcuerpo::mdlMostrarCcuerpoTSepultura($tipo_sepultura);
        //print_r($respuesta);
        return $respuesta;

    }

    static public function ctrMostrarCcuerpoNumSepultura($cuartel_cuerpo){
        $respuesta = ModeloCcuerpo::mdlMostrarCcuerpoNumSepultura($cuartel_cuerpo);
        return $respuesta;

    }


/*=============================================
	MOSTRAR TIPO PRODUCTO
	=============================================*/

	static public function ctrMostrarTproducto($item, $valor){

		$tabla = "tipo_sepultura";

		$respuesta = ModeloCcuerpo::mdlMostrarTproducto($tabla, $item, $valor);

		return $respuesta;
	
	}


	/*=============================================
	MOSTRAR CEMENTERIO
	=============================================*/

	static public function ctrMostrarCementerio($item, $valor){

		$tabla = "cementerios";

		$respuesta = ModeloCcuerpo::mdlMostrarCementerio($tabla, $item, $valor);

		return $respuesta;
	
	}


	/*=============================================
	EDITAR CCUERPO
	=============================================*/

	static public function ctrEditarCcuerpo(){

		if(isset($_POST["editarCcuerpo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["editarCcuerpo"])){

				$tabla = "cuartel_cuerpos";

				$datos = array("nombre"=>$_POST["editarCcuerpo"],
								"id_cementerio" =>$_POST["editarCementerio"],
								"tipo_sep"=>$_POST["editarTproducto"],
							    "id_cuartel_cuerpo"=>$_POST["idCcuerpo"]);

				$respuesta = ModeloCcuerpo::mdlEditarCcuerpo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Cuartel Cuerpo ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cuartel-cuerpo";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Cuartel Cuerpo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cuartel-cuerpo";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CUARTEL CUERPO
	=============================================*/

	static public function ctrBorrarCcuerpo(){

		if(isset($_GET["idCcuerpo"])){

			$tabla ="cuartel_cuerpos";
			$datos = $_GET["idCcuerpo"];

			$respuesta = ModeloCcuerpo::mdlBorrarCcuerpo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Cuartel Cuerpo ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cuartel-cuerpo";

									}
								})

					</script>';
			}
		}
		
	}
}
