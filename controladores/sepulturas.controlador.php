<?php

class ControladorSepultura{

	/*=============================================
	CREAR SEPULTURA
	=============================================*/

	static public function ctrCrearSepultura(){

		if(isset($_POST["nuevoNumero"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["nuevoNumero"])){

				$tabla = "sepulturas";

				$datos = array("numero_sepultura"=> $_POST["nuevoNumero"],
					           "id_cuartel_cuerpo"=> $_POST["nuevoCcuerpo"],
					           "estado"=> $_POST["nuevoEstado"],
					           "capacidad"=> $_POST["nuevaCapacidad"],
					           "id_cementerio"=> $_POST["nuevoCementerio"],
					           "activo"=>1,
					           "corrida"=> $_POST["nuevaCorrida"],
					           "piso"=> $_POST["nuevoPiso"],
					           "orden"=> $_POST["nuevoOrden"]);

				$respuesta = ModeloSepultura::mdlIngresarSepultura($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Sepultura ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sepulturas";

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

							window.location = "sepulturas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR SEPULTURAS
	=============================================*/

	static public function ctrMostrarSepultura($item, $valor){

		$tabla = "sepulturas";

		$respuesta = ModeloSepultura::mdlMostrarSepultura($tabla, $item, $valor);

		return $respuesta;
	
	}

	static public  function ctrMostrarDifuntosEnSepultura($item, $valor){

	    $tabla="difuntos";

	    $respuesta = ModeloDifuntos::mdlMostrarDifuntosEnSepultura("$tabla, $item, $valor");

	    return $respuesta;
    }

    /*=============================================
    MOSTRAR SEPULTURAS DISPONIBLES
    =============================================*/

    static public function ctrMostrarSepulturaDisponible($item, $valor){

        $tabla = "sepulturas";

        $respuesta = ModeloSepultura::mdlMostrarSepulturaDisponible($tabla, $item, $valor);

        return $respuesta;

    }


/*=============================================
	MOSTRAR ESTADOS
	=============================================*/

	static public function ctrMostrarEstado($item, $valor){

		$tabla = "estado";

		$respuesta = ModeloSepultura::mdlMostrarEstado($tabla, $item, $valor);

		return $respuesta;
	
	}


	/*=============================================
	EDITAR SEPULTURA
	=============================================*/

	static public function ctrEditarSepultura(){

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

									window.location = "sepulturas";

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

							window.location = "sepulturas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR SEPULTURA
	=============================================*/

	static public function ctrBorrarSepultura(){

		if(isset($_GET["idSepultura"])){

			$tabla ="sepulturas";
			$datos = $_GET["idSepultura"];

			$respuesta = ModeloSepultura::mdlBorrarSepultura($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La sepultura ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sepulturas";

									}
								})

					</script>';
			}
		}
		
	}
}
