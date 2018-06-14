<?php

class ControladorCreditos{

    /*=============================================
    CREAR CREDITOS
    =============================================*/

    static public function ctrCrearCredito(){

        if(isset($_POST["nuevaFechap"])){

            if(preg_match('/^[0-9]+$/', $_POST["nuevoPie"])){

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
						  title: "El crédito ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "index.php?ruta=creditos&idCliente='.$_GET["idCliente"].'";

									}
								})

					</script>';

                }


            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡El crédito no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?ruta=creditos&idCliente='.$_GET["idCliente"].'";

							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    MOSTRAR CREDITO
    =============================================*/

    static public function ctrMostrarCredito($item, $valor){

        $tabla = "creditos";

        $respuesta = ModeloCredito::mdlMostrarCredito($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrMostrarCredito2($item, $valor){

        $tabla = "creditos";

        $respuesta = ModeloCredito::mdlMostrarCredito2($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    MOSTRAR CREDITOE
    =============================================*/

    static public function ctrMostrarCreditoE($item, $valor){

        $tabla = "creditos";

        $respuesta = ModeloCredito::mdlMostrarCreditoE($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    ÚLTIMO BOLETÍN
    =============================================*/

    static public function ctrMostrarUltimoBoletin(){

        $tabla = "creditos";

        $respuesta = ModeloCredito::mdlMostrarUltimoBoletin($tabla);

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
                                "estado"=>1);
                //var_dump($_POST);
               
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

									window.location = "index.php?ruta=creditos&idCliente='.$_GET["idCliente"].'";

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

							window.location = "index.php?ruta=creditos&idCliente='.$_GET["idCliente"].'";

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

        if(isset($_GET["idCredito"])){
           // print_r($_POST);
            $tabla ="creditos";
            $datos = $_GET["idCredito"];

            $respuesta = ModeloCredito::mdlBorrarCredito($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

					swal({
						  type: "success",
						  title: "El crédito ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
                          allowEscapeKey: false,
                          allowOutsideClick: false,
						  }).then(function(result){
									if (result.value) {

									window.location = "index.php?ruta=creditos&idCliente='.$_GET["idCliente"].'";

									}
								})

					</script>';
            }
        }

    }
}
