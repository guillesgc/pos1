/*=============================================
EDITAR CUARTEL CUERPO
=============================================*/
$(".tablas").on("click", ".btnEditarCcuerpo", function(){

	var idCcuerpo = $(this).attr("idCcuerpo");

	var datos = new FormData();
	datos.append("idCcuerpo", idCcuerpo);

	$.ajax({
		url: "ajax/ccuerpo.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarCcuerpo").val(respuesta["nombre"]);
     		$("#idCcuerpo").val(respuesta["id_cuartel_cuerpo"]);

     	}

	})


})

/*=============================================
ELIMINAR CUARTEL CUERPO
=============================================*/
$(".tablas").on("click", ".btnEliminarCcuerpo", function(){

	 var idCcuerpo = $(this).attr("idCcuerpo");

	 swal({
	 	title: '¿Está seguro de borrar el Cuartel Cuerpo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Cuartel Cuerpo!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=cuartel-cuerpo&idCcuerpo="+idCcuerpo;

	 	}

	 })

})

/*=============================================
COMBO ANIDADO PARA TIPO SEPULTURA - CUARTEL CUEPO
=============================================*/
$(".tablas").on("click", ".btnEliminarCcuerpo", function(){

    var idCcuerpo = $(this).attr("idCcuerpo");

    swal({
        title: '¿Está seguro de borrar el Cuartel Cuerpo?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Cuartel Cuerpo!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=cuartel-cuerpo&idCcuerpo="+idCcuerpo;

        }

    })

})


$(document).ready(function(){
    $('#idTipoSepultura').on('change',function(){
        var tipo_sepultura = $(this).val();
        //console.log("tipo_sepultura",tipo_sepultura);
        if(tipo_sepultura){
            $.ajax({
                type:'POST',
                url:'ajax/ccuerpotsepultura.ajax.php',
                data: "tipo_sepultura="+tipo_sepultura,
                success:function(html) {
                    //console.log("cuarteles_cuerpo", html);;
                    $("#idCuartelCuerpo").empty();
                    var aux = JSON.parse(html);
                    var len = aux.length;
                    //console.log("aux",aux);
                    $("#idCuartelCuerpo").append("<option value='" + "" + "'>" + "Selecciona un cuartel cuerpo" + "</option>");
                    for (var i = 0; i < len; i++) {
                        var id = aux[i]['id_cuartel_cuerpo'];
                        var name = aux[i]['nombre'];
                        $("#idCuartelCuerpo").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        }else{
            $('#idCuartelCuerpo').html('<option value="">Selecciona un tipo de sepultura primero</option>');
        }
    });
});


$(document).ready(function(){
    $('#idCuartelCuerpo').on('change',function(){
        var cuartel_cuerpo = $(this).val();
        //console.log("cuartel_cuerpo",cuartel_cuerpo);
        if(cuartel_cuerpo){
            $.ajax({
                type:'POST',
                url:'ajax/ccuerponsepultura.ajax.php',
                data: "cuartel_cuerpo="+cuartel_cuerpo,
                success:function(respuesta) {
                    //console.log("numero sepultura", respuesta);
                    var auxs = JSON.parse(respuesta);
                    //console.log("auxs", auxs);
                    var l = auxs.length;
                    $("#idNumSepultura").empty();
                    $("#idNumSepultura").append("<option value='" + "" + "'>" + "Selecciona un número de sepultura" + "</option>");
                    for (var i = 0; i < l; i++) {
                        var id = auxs[i]['id_sepultura'];
                        var num = auxs[i]['numero_sepultura'];
                        $("#idNumSepultura").append("<option value='" + id + "'>" + num + "</option>");
                    }
                }
            });
        }else{
            $('#idCuartelCuerpo').html('<option value="">Selecciona un cuartel cuerpo primero</option>');
        }
    });
});

