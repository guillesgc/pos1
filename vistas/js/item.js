/*=============================================
EDITAR ITEM
=============================================*/
$(".tablas").on("click", ".btnEditarItem", function(){

	var idItem = $(this).attr("idItem");

	var datos = new FormData();
	datos.append("idItem", idItem);

	$.ajax({
		url: "ajax/item.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarItem").val(respuesta["nombre"]);
     		$("#editarCcosto").val(respuesta["id_centro_costo"]);
     		$("#editarPrecio").val(respuesta["precio"]);
     		$("#idItem").val(respuesta["id_item"]);

     	}

	})


})

/*=============================================
ELIMINAR ITEM
=============================================*/
$(".tablas").on("click", ".btnEliminarItem", function(){

	 var idItem = $(this).attr("idItem");

	 swal({
	 	title: '¿Está seguro de borrar el Item?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Item!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=item&idItem="+idItem;

	 	}

	 })

})