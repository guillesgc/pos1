<?php

class ControladorTraslado{

    /*=============================================
    CREAR TRASLADO
    =============================================*/

    static public function ctrCrearTraslado(){

        if(isset($_POST["nuevoBoletin"])){

            if(preg_match('/^[0-9]+$/', $_POST["nuevoBoletin"])){

                $tabla = "traslado";

                $datos = array("idSepultura"=> $_POST["idNumSepultura"],
                                "fecha_traslado"=> $_POST["nuevaFtraslado"],
                                "boletin"=> $_POST["nuevoBoletin"],
                                "reduccion"=> $_POST["nuevaReduccion"],
                                "idDifunto"=> $_POST["idDifuntox"]);
                var_dump($datos);

                $respuesta = ModeloTraslado::mdlIngresarTraslado($tabla, $datos);

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
    MOSTRAR DIFUNTOS EN TRASLADOS
    =============================================*/

    static public function ctrMostrarDtraslado($item, $valor){

        $tabla = "difuntos";

        $respuesta = ModeloTraslado::mdlMostrarDtraslado($tabla, $item, $valor);

        return $respuesta;

    }


}
