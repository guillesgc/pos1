/*=============================================
CARGAR LA TABLA DINAMICA DE SEPULTURAS
=============================================*/




if(window.matchMedia("(max-width:767px)").matches){

    var table2 = $('.tablaSepultura').DataTable({

        "ajax":"ajax/datatables-sepulturas.ajax.php",
        "columnDefs": [

            {
                "targets": -1  ,
                "data": null,
                "defaultContent": '<button class="btn btn-primary btnMostrarDif" idSepultura><i class="fa fa-search-plus"></i></button>'

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
                "defaultContent": '<button class="btn btn-primary btnMostrarDif" idSepultura><i class="fa fa-search-plus"></i></button>'

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

$('.tablaSepultura tbody').on( 'click', 'button.btnMostrarDif', function () {

    if(window.matchMedia("(min-width:992px)").matches){

        var data = table2.row( $(this).parents('tr') ).data();
    }else{

        var data = table2.row( $(this).parents('tbody tr ul li')).data();
    }
    //console.log("data",data[6]);
    $(this).attr("idSepultura",data[6]);

    var valor=$(this).val();

    var datos = new FormData();
    datos.append("valor",valor);

   window.location = "index.php?ruta=difuntosxproducto&idSepultura=1";
} );

/*=============================================
MOSTRAR DIFUNTOS EN SEPULTURA
=============================================*/
//$(".tablaSepultura tbody").on("click", ".btnMostrarDif", function(){
   
    //var idSepultura = $(this).attr("id_sepultura");
   /* console.log("idDifunto",idSepultura);
    var datos = new FormData();
    datos.append('idSepultura', idSepultura);
    console.log("datoos",datos);
    $.ajax({
        url:"ajax/sepultura.difuntos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            // $("#editarIdNumSepultura").append("<option value='" + respuesta["id_sepultura"] + "'>" + respuesta["numero_sepultura"] + "</option>");
*/

    

       // });