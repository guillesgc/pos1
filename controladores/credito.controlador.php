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

        if(isset($_POST["editarFechap"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["editarBoletin"])){

                $tabla = "creditos";

                $datos = array( "id_credito"=>$_POST["idCredito"],
                                "id_cliente"=>$_GET["idCliente"],
                                "fecha_pago"=>$_POST["editarFechap"],
                                "detalle" =>$_POST["editarDetalle"],
                                "pie"=>$_POST["editarPie"],
                                "numcuotas"=>$_POST["editarNumcuotas"],
                                "boletin"=>$_POST["editarBoletin"],
                                "valor_credito"=>$_POST["editarVcredito"],
                                "valor_cuota"=>$_POST["editarCuota"],
                                "estado"=>1
                              );
                var_dump($_POST);
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

									window.location = "clientes";

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

							window.location = "clientes";

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

        if(isset($_POST["idCredito"])){
            var_dump($_POST);
            $tabla ="creditos";
            $datos = $_POST["idCredito"];

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

									window.location = "clientes";

									}
								})

					</script>';
            }
        }

    }
}
