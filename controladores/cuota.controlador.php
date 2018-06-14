<?php

class ControladorCuota{

    /*=============================================
    CREAR CUOTAS
    =============================================*/

    static public function ctrCrearCuota(){

        if(isset($_POST["nuevaFecha"])){

            if(preg_match('/^[0-9]+$/', $_POST["nuevoMonto"])){

                $tabla = "cuotas";

                $datos = array("fecha"=> $_POST["nuevaFecha"],
                                "glosa"=> $_POST["nuevaGlosa"],
                                "monto"=> $_POST["nuevoMonto"],
                                "boletin"=> $_POST["nuevoBoletin"],
                                "idCredito"=>$_POST["idCredito"]);

                $respuesta = ModeloCuota::mdlIngresarCuota($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La cuota ha sido guardada correctamente",
						  showConfirmButton: true,
                          allowEscapeKey: false,
                          allowOutsideClick: false,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "index.php?ruta=cuotas&idCliente='.$_GET["idCliente"].'&idCredito='.$_GET["idCredito"].'";

									}
								})

					</script>';

                }


            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡La Cuota no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index.php?ruta=cuotas&idCliente="+idCliente +"&idCredito="+idCredito;


							}
						})

			  	</script>';

            }

        }

    }

    /*=============================================
    MOSTRAR CUOTA CON ID DE CREDITO
    =============================================*/

    static public function ctrMostrarCuotaCC($item, $valor){

        $tabla = "cuotas";

        $respuesta = ModeloCuota::mdlMostrarCuotaCC($tabla, $item, $valor);

        return $respuesta;

    }


 /*=============================================
    MOSTRAR CUOTA SIN ID DE CREDITO
    =============================================*/

    static public function ctrMostrarCuota($item, $valor){

        $tabla = "cuotas";

        $respuesta = ModeloCuota::mdlMostrarCuota($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrMostrarCuota2($item, $valor){

        $tabla = "cuotas";

        $respuesta = ModeloCuota::mdlMostrarCuota2($tabla, $item, $valor);

        return $respuesta;

    }



    /*=============================================
    CUOTAS PAGADAS
    =============================================*/

    static public function ctrCuotasPagadas($item, $valor){

        $tabla = "cuotas";

        $respuesta = ModeloCuota::mdlCuotasPagadas($tabla, $item, $valor);

        return $respuesta;

    }


    /*=============================================
    MOSTRAR DETALLE DE CREDITO EN VISTA CUOTAS
    =============================================*/

    static public function ctrMostrarCredito2($item, $valor){

        $tabla = "creditos";

        $respuesta = ModeloCuota::mdlMostrarCredito2($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
    ÚLTIMO BOLETÍN
    =============================================*/

    static public function ctrMostrarUltimoBoletin(){

        $tabla = "cuotas";

        $respuesta = ModeloCuota::mdlMostrarUltimoBoletin($tabla);

        return $respuesta;


    }


    /*=============================================
    EDITAR CUOTA
    =============================================*/

    static public function ctrEditarCuota(){

        if(isset($_POST["editaFecha"])){

            if(preg_match('/^[0-9\- ]+$/', $_POST["editaMonto"])){

                $tabla = "cuotas";

                $datos = array( "fecha"=>$_POST["editaFecha"],
                                "glosa"=>$_POST["editaGlosa"],
                                "monto"=>$_POST["editaMonto"],
                                "boletin" =>$_POST["editaBoletin"],
                                "idCredito"=>$_POST["idCredito"],
                                "idCuota"=> $_POST["idCuota"]);
               // var_dump($_POST);
                $respuesta = ModeloCuota::mdlEditarCuota($tabla, $datos);
               // echo "respuesta".$respuesta;

                if($respuesta == "ok"){

                    echo'<script>  
					swal({
						  type: "success",
						  title: "La cuota ha sido cambiada correctamente",
						  showConfirmButton: true,
                          allowEscapeKey: false,
                          allowOutsideClick: false,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "index.php?ruta=cuotas&idCliente='.$_GET["idCliente"].'&idCredito='.$_GET["idCredito"].'";

									}
								})
                            
					</script>';

                }


            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡La Cuota no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
                          allowEscapeKey: false,
                          allowOutsideClick: false,
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
    BORRAR CUOTA
    =============================================*/

    static public function ctrBorrarCuota(){

        if(isset($_GET["idCuota"])){
            $tabla ="cuotas";
            $datos = $_GET["idCuota"];

            $respuesta = ModeloCuota::mdlBorrarCuota($tabla, $datos);
 
             if($respuesta == "ok"){

                echo'<script>

					swal({
						  type: "success",
						  title: "La Cuota ha sido borrada correctamente",
						  showConfirmButton: true,
                          allowEscapeKey: false,
                          allowOutsideClick: false,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "index.php?ruta=cuotas&idCliente='.$_GET["idCliente"].'&idCredito='.$_GET["idCredito"].'";

									}
								})

					</script>';
            }
        }

    }
}
