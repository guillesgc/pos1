/*=============================================
EDITAR AGENDA
=============================================*/
$(".tablas").on("click", ".btnEditarAgenda", function(){

	var idAgenda = $(this).attr("idAgenda");

	var datos = new FormData();
  datos.append("idAgenda", idAgenda);

    $.ajax({

      url:"ajax/agenda.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        //console.log("respuesta",respuesta);
      
      	 $("#idAgenda").val(respuesta["id_agenda"]);
	       $("#editarGlosa").val(respuesta["glosa"]);
         $("#editarTipoagenda").val(respuesta["tipo_agenda"]);
	       $("#editarBoletin").val(respuesta["boletin"]);
	       $("#editarFecha").val(respuesta["fecha_evento"]);
         $("#editarHora").val(respuesta["hora"]);
         $("#editarActivo").val(respuesta["activo"]);
  
	  }

  	})

})


/*=============================================
ELIMINAR AGENDA
=============================================*/
$(".tablas").on("click", ".btnEliminarAgenda", function(){

   var idAgenda = $(this).attr("idAgenda");

   swal({
    title: '¿Está seguro de borrar el registro?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar Registro!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=agenda&idAgenda="+idAgenda;

    }

   })

})