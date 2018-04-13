

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarSepultura", function(){

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

    var table = $('.tablaSepulturas').DataTable({

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

    var table = $('.tablaSepulturas').DataTable({

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

$('.tablaSepulturas tbody').on( 'click', 'button', function () {

    if(window.matchMedia("(min-width:992px)").matches){

        var data = table.row( $(this).parents('tr') ).data();

    }else{

        var data = table.row( $(this).parents('tbody tr ul li')).data();

    }

    $(this).attr("id_sepultura", data[8])
    console.log("data[8]",data[8]);


} );