/*=============================================
EDITAR TIPO_ SEPULTURA
=============================================*/
$(".tablas").on("click", ".btnEditarTsepultura", function(){

	var idTsepultura = $(this).attr("idTsepultura");

	var datos = new FormData();
  datos.append("idTsepultura", idTsepultura);

    $.ajax({

      url:"ajax/tiposepultura.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        //console.log("respuesta",respuesta);
      
      	 $("#idTsepultura").val(respuesta["id_tipo_sepultura"]);
	       $("#editarTsepultura").val(respuesta["nombre"]);
	       $("#editarPfamiliar").val(respuesta["familiar"]);
	       $("#editarIccosto").val(respuesta["id_centro_costo"]);
	  }

  	})

})


/*=============================================
ELIMINAR TIPO SEPULTURA
=============================================*/
$(".tablas").on("click", ".btnEliminarTsepultura", function(){

   var idTsepultura = $(this).attr("idTsepultura");

   swal({
    title: '¿Está seguro de borrar el tipo de sepultura?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar tipo de sepultura!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=tipo-sepultura&idTsepultura="+idTsepultura;

    }

   })

})