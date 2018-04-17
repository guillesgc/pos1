

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarSepultura", function(){
  var data = table.row( $(this).parents('tr') ).data();
  console.log("data",data);
  var idSepultura = $(this).attr("id_sepultura");

  swal({
    title: '¿Está seguro de borrar la Sepultura?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Sepultura!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=sepulturas&idSepultura="+idSepultura;

    }

  })

})


/*=============================================
CARGAR LA TABLA DINAMICA DE SEPULTURAS
=============================================*/


if($(".perfilUsuario").val() != "Administrador"){

    var botonesTabla = '<div class="btn-group"><button class="btn btn-primary btnMostrarTarjeta" id_sepultura data-toggle="modal" data-target="#modalFallecidos"><i class="fa fa-search-plus"></i></button></div>';


}else{

    var botonesTabla = '<div class="btn-group"><button class="btn btn-primary btnMostrarTarjeta" id_sepultura data-toggle="modal" data-target="#modalFallecidos"><i class="fa fa-search-plus"></i></button></div>';

}


if(window.matchMedia("(max-width:767px)").matches){

    var table = $('.tablaSepultura').DataTable({

        "ajax":"ajax/datatables-sepulturas.ajax.php",
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

    var table = $('.tablaSepultura').DataTable({

        "ajax":"ajax/datatables-sepulturas.ajax.php",
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

$('.tablaSepultura tbody').on( 'click', 'button', function () {

    if(window.matchMedia("(min-width:992px)").matches){

        var data = table.row( $(this).parents('tr') ).data();

    }else{

        var data = table.row( $(this).parents('tbody tr ul li')).data();

    }
    console.log("data",data);


} );

/*=============================================
MOSTRAR DIFUNTOS EN SEPULTURA
=============================================*/
$(".tablaSepultura tbody").on("click", ".btnMostrarTarjeta", function(){
    var data = table.row( $(this).parents('tr') ).data();
    console.log("ahhh",data);
    var id_sepultura = $(this).attr("id_sepultura");
    //console.log("idDifunto",idDifunto);
    var datos = new FormData();
    datos.append('id_sepultura', id_sepultura);
    console.log("datoos",id_sepultura);
    $.ajax({
        url:"ajax/sepultura.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
           // $("#idDifunto").val(respuesta["id_difunto"]);
           // $("#editarDifunto").val(respuesta["nombre"]);
           // $("#editarApaterno").val(respuesta["apellido_paterno"]);
           // $("#editarAmaterno").val(respuesta["apellido_materno"]);
           // $("#editarCmuerte").val(respuesta["causa_muerte"]);
           // $("#editarFsepultacion").val(respuesta["fecha_sepultacion"]);
           // $("#editarFdefuncion").val(respuesta["fecha_defuncion"]);
           // $("#editarEdad").val(respuesta["edad"]);
           // $("#editarSexo").val(respuesta["sexo"]);
           // $("#editarInscripcion").val(respuesta["inscripcion"]);
           // $("#editarCircunscripcion").val(respuesta["circunscripcion"]);
            //$("#editarIdCuartelCuerpo").val(respuesta["id_cuartel_cuerpo"]);
            //$("#editarIdTipoSepultura").val(respuesta["tipo_sep"]);
            //$("#editarIdNumSepultura").val(respuesta["numero_sepultura"]);
           // $("#editarIdNumSepultura").empty();
           // $("#editarIdNumSepultura").append("<option value='" + respuesta["id_sepultura"] + "'>" + respuesta["numero_sepultura"] + "</option>");



        }

    })

})