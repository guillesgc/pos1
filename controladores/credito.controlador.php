<?php

class ControladorCreditos{

    /*=============================================
    CREAR CREDITOS
    =============================================*/

    static public function ctrCrearCredito(){

        if(isset($_POST["nuevaFechap"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["nuevoDetalle"])){

                $tabla = "creditos";

                $datos = array("fecha"=> $_POST["nuevaFechap"],
                    "detalle"=> $_POST["nuevoDetalle"],
                    "pie"=> $_POST["nuevoPie"],
                    "numcuotas"=> $_POST["nuevoNumcuotas"],
                    "boletin"=> $_POST["nuevoBoletin"],
                    "valorcredito"=> $_POST["nuevoVcredito"],
                    "valorcuota"=> $_POST["nuevaCuota"],
                    "cliente"=>$_GET["idCliente"],
                    "estado"=>1);

                $respuesta = ModeloCredito::mdlIngresarCredito($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "El credito ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "index.php?creditos";

									}
								})

					</script>';

                }


            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡El credito no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "creditos";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    MOSTRAR CUARTEL_CUERPO
    =============================================*/

    static public function ctrMostrarCredito($item, $valor){

        $tabla = "creditos";

        $respuesta = ModeloCredito::mdlMostrarCredito($tabla, $item, $valor);

        return $respuesta;

    }


    /*=============================================
    EDITAR CREDITO
    =============================================*/

    static public function ctrEditarCredito(){

        if(isset($_POST["editarCcuerpo"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["editarCcuerpo"])){

                $tabla = "cuartel_cuerpos";

                $datos = array("nombre"=>$_POST["editarCcuerpo"],
                    "id_cementerio" =>$_POST["editarCementerio"],
                    "tipo_sep"=>$_POST["editarTproducto"],
                    "id_cuartel_cuerpo"=>$_POST["idCcuerpo"]);

                $respuesta = ModeloCredito::mdlEditarCredito($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "El credito ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "credito";

									}
								})

					</script>';

                }


            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡El credito no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "creditos";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    BORRAR CREDITO
    =============================================*/

    static public function ctrBorrarCredito(){

        if(isset($_GET["idCcuerpo"])){

            $tabla ="cuartel_cuerpos";
            $datos = $_GET["idCcuerpo"];

            $respuesta = ModeloCredito::mdlBorrarCredito($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

					swal({
						  type: "success",
						  title: "El credito ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "creditos";

									}
								})

					</script>';
            }
        }

    }
}
