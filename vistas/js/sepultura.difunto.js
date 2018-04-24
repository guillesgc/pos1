/*=============================================
CARGAR LA TABLA DINAMICA DE SEPULTURAS
=============================================*/


if($(".perfilUsuario").val() != "Administrador"){

    var botonesTabla = '<button class="btn btn-primary btnMostrarDif"  data-toggle="modal" data-target="#modalFallecidos" id_sepultura><i class="fa fa-search-plus"></i></button>';


}else{

    var botonesTabla = '<button class="btn btn-primary btnMostrarDif"  data-toggle="modal" data-target="#modalFallecidos" id_sepultura><i class="fa fa-search-plus"></i></button>';

}


if(window.matchMedia("(max-width:767px)").matches){

    var table2 = $('.tablaSepultura').DataTable({

        "ajax":"ajax/datatables-sepulturas.ajax.php",
        "columnDefs": [

            {
                "targets": -1  ,
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

    var table2 = $('.tablaSepultura').DataTable({

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

$('.tablaSepultura tbody').on( 'click', '.btnMostrarDif', function () {

    if(window.matchMedia("(min-width:992px)").matches){

        var data = table2.row( $(this).parents('tr ') ).data();
    }else{

        var data = table2.row( $(this).parents('tbody tr ul li')).data();
    }
    console.log("data",data);
    //$(this).attr("id_sepultura",data[7]);

} );