

/*=============================================
CARGAR LA TABLA DINAMICA DE DIFUNTOS
=============================================*/



if($(".perfilUsuario").val() != "Administrador"){

    var botonesTabla = '<div class="btn-group"><button class="btn btn-warning btnEditarDifunto" data-toggle="modal" data-target="#modalEditarDifunto" idDifunto><i class="fa fa-pencil"></i></button><button class="btn btn-danger btnEliminarDifunto" idDifunto><i class="fa fa-times"></i></button></i></button></div>';


}else{

    var botonesTabla = '<div class="btn-group"><button class="btn btn-warning btnEditarDifunto" data-toggle="modal" data-target="#modalEditarDifunto" idDifunto><i class="fa fa-pencil"></i></button><button class="btn btn-danger btnEliminarDifunto" idDifunto><i class="fa fa-times"></i></button></i></button></div>';

}


if(window.matchMedia("(max-width:767px)").matches){

    var table = $('.tablaDifuntos').DataTable({

        "ajax":"ajax/datatable-difuntos.ajax.php",
        "columnDefs": [

            {
                "targets": -1,
                "data": null,
                "defaultContent": botonesTabla

            }

        ],

        "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }
    })

}else{

    var table = $('.tablaDifuntos').DataTable({

        "ajax":"ajax/datatable-difuntos.ajax.php",
        "columnDefs": [

            {
                "targets": -1,
                "data": null,
                "defaultContent": botonesTabla

            }

        ],

        "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }


    })

}

/*=============================================
ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
=============================================*/

$('.tablaDifuntos tbody').on( 'click', 'button', function () {
   if(window.matchMedia("(min-width:992px)").matches){

        var data = table.row( $(this).parents('tr') ).data();

   }else{

        var data = table.row( $(this).parents('tbody tr ul li')).data();

   }
   console.log("data",data);
   $(this).attr("idDifunto", data[0]);
   //console.log("idDifunto",idDifunto);
   // console.log("data[8]",data[0]);


} );



/*=============================================
EDITAR DIFUNTOS
=============================================*/
$(".tablaDifuntos tbody").on("click", ".btnEditarDifunto", function(){

    var data = table.row( $(this).parents('tr') ).data();
    console.log("data",data);
    var idDifunto= $(this).attr("idDifunto");
    //var id_cc=$(this).attr("idCuartelCuerpo");
    //var id_tsep=$(this).attr("idTipoSepultura");

	var datos = new FormData();

    datos.append('idDifunto', idDifunto);
    //datos.append('idCuartelCuerpo', id_tsep);
    //datos.append('idTipoSep', id_cc);

    console.log("datoos",idDifunto);

    $.ajax({
        url:"ajax/difuntos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            $("#idDifunto").val(respuesta["id_difunto"]);
	        $("#editarDifunto").val(respuesta["nombre"]);
            $("#editarApaterno").val(respuesta["apellido_paterno"]);
	        $("#editarAmaterno").val(respuesta["apellido_materno"]);
	        $("#editarCmuerte").val(respuesta["causa_muerte"]);
            $("#editarFsepultacion").val(respuesta["fecha_sepultacion"]);
            $("#editarFdefuncion").val(respuesta["fecha_defuncion"]);
            $("#editarEdad").val(respuesta["edad"]);
            $("#editarSexo").val(respuesta["sexo"]);
            $("#editarInscripcion").val(respuesta["inscripcion"]);
            $("#editarCircunscripcion").val(respuesta["circunscripcion"]);

            $("#editarIdTipoSepultura").empty();
            $("#editarIdTipoSepultura").append("<option value='" + respuesta["id_tipo_sepultura"] + "'>" + respuesta[30] + "</option>");

            $("#editarIdCuartelCuerpo").empty();
            $("#editarIdCuartelCuerpo").append("<option value='" + respuesta["id_cuartel_cuerpo"] + "'>" + respuesta[26] + "</option>");

            $("#editarIdNumSepultura").empty();
            $("#editarIdNumSepultura").append("<option value='" + respuesta["id_sepultura"] + "'>" + respuesta["numero_sepultura"] + "</option>");



	  }

  	})

})


/*=============================================
ELIMINAR DIFUNTOS
=============================================*/
$(".tablaDifuntos").on("click", ".btnEliminarDifunto", function(){

   var idDifunto = $(this).attr("idDifunto");

   swal({
    title: '¿Está seguro de borrar al Difunto?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar Difunto!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=difuntos&idDifunto="+idDifunto;

    }

   })

})


$(document).ready(function(){
    $('#editarIdTipoSepultura').on('change',function(){
        var tipo_sepultura = $(this).val();
        //console.log("tipo_sepultura",tipo_sepultura);
        if(tipo_sepultura){
            $.ajax({
                type:'POST',
                url:'ajax/ccuerpotsepultura.ajax.php',
                data: "tipo_sepultura="+tipo_sepultura,
                success:function(html) {
                    //console.log("cuarteles_cuerpo", html);;
                    $("#editarIdCuartelCuerpo").empty();
                    var aux = JSON.parse(html);
                    var len = aux.length;
                    //console.log("aux",aux);
                    $("#editarIdCuartelCuerpo").append("<option value='" + "" + "'>" + "Selecciona un cuartel cuerpo" + "</option>");
                    for (var i = 0; i < len; i++) {
                        var id = aux[i]['id_cuartel_cuerpo'];
                        var name = aux[i]['nombre'];
                        $("#editarIdCuartelCuerpo").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        }else{
            $('#editarIdCuartelCuerpo').html('<option value="">Selecciona un tipo de sepultura primero</option>');
        }
    });
});


$(document).ready(function(){
    $('#editarIdCuartelCuerpo').on('change',function(){
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
                    $("#editarIdNumSepultura").empty();
                    $("#editarIdNumSepultura").append("<option value='" + "" + "'>" + "Selecciona un número de sepultura" + "</option>");
                    for (var i = 0; i < l; i++) {
                        var id = auxs[i]['id_sepultura'];
                        var num = auxs[i]['numero_sepultura'];
                        $("#editarIdNumSepultura").append("<option value='" + id + "'>" + num + "</option>");
                    }
                }
            });
        }else{
            $('#editarIdCuartelCuerpo').html('<option value="">Selecciona un cuartel cuerpo primero</option>');
        }
    });
});