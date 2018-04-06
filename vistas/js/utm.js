/*=============================================
EDITAR UTM
=============================================*/
$(".tablas").on("click", ".btnEditarUtm", function(){

	var idUtm = $(this).attr("idUtm");

	var datos = new FormData();
	datos.append("idUtm", idUtm);

	$.ajax({
		url: "ajax/utm.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarAnno").val(respuesta["anno"]);
     		$("#editarMes").val(respuesta["mes"]);
     		$("#editarValor").val(respuesta["valor"]);
     		$("#idUtm").val(respuesta["idutm"]);

     	}

	})


})

/*=============================================
ELIMINAR UTM
=============================================*/
$(".tablas").on("click", ".btnEliminarUtm", function(){

	 var idUtm = $(this).attr("idUtm");

	 swal({
	 	title: '¿Está seguro de borrar la U.T.M.?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar U.T.M.!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=utm&idUtm="+idUtm;

	 	}

	 })

})