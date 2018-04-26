<?php

class ControladorUtm{

	/*=============================================
	CREAR UTM
	=============================================*/

	static public function ctrCrearUtm(){

		if(isset($_POST["nuevoValor"])){

			if(preg_match('/^[0-9\- ]+$/', $_POST["nuevoValor"])){

				$tabla = "utm";

				$datos = array("valor"=> $_POST["nuevoValor"],
					           "anno"=> $_POST["nuevoAnno"],
					           "mes"=> $_POST["nuevoMes"]);

				$respuesta = ModeloUtm::mdlIngresarUtm($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La UTM ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "utm";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La UTM no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "utm";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR UTM
	=============================================*/

	static public function ctrMostrarUtm($item, $valor){

		$tabla = "utm";

		$respuesta = ModeloUtm::mdlMostrarUtm($tabla, $item, $valor);

		return $respuesta;
	
	}


/*=============================================
	MOSTRAR MESES
	=============================================*/

	static public function ctrMostrarMeses($item, $valor){

		$tabla = "meses";

		$respuesta = ModeloUtm::mdlMostrarMeses($tabla, $item, $valor);

		return $respuesta;
	
	}

    /*=============================================
    MOSTRAR VALOR UTM ACTUAL
    =============================================*/

    static public function ctrMostrarUtmActual($item, $valor){

        $tabla = "utm";

        $respuesta = ModeloUtm::mdlMostrarUtmActual($tabla, $item, $valor);

        return $respuesta;

    }


	/*=============================================
	EDITAR UTM
	=============================================*/

	static public function ctrEditarUtm(){

		if(isset($_POST["editarValor"])){

			if(preg_match('/^[0-9\- ]+$/', $_POST["editarValor"])){

				$tabla = "utm";

				$datos = array("valor"=>$_POST["editarValor"],
								"anno" =>$_POST["editarAnno"],
								"mes"=>$_POST["editarMes"],
							    "idUtm"=>$_POST["idUtm"]);

				$respuesta = ModeloUtm::mdlEditarUtm($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La UTM ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "utm";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La UTM no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "utm";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR UTM
	=============================================*/

	static public function ctrBorrarUtm(){

		if(isset($_GET["idUtm"])){

			$tabla ="utm";
			$datos = $_GET["idUtm"];

			$respuesta = ModeloUtm::mdlBorrarUtm($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La UTM ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "utm";

									}
								})

					</script>';
			}
		}
		
	}
}
