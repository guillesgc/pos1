/*=============================================
EDITAR TIPO_ SEPULTURA
=============================================*/
$(".tablaCreditos").on("click", ".btnEditarCredito", function(){

    var idCredito = $(this).attr("idCredito");
    console.log("idCredito",idCredito);

    var datos = new FormData();
    datos.append("idCredito", idCredito);

    $.ajax({

        url:"ajax/credito.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            //console.log("respuesta",respuesta);

            $("#editarFechap").val(respuesta["fecha_pago"]);
            $("#editarDetalle").val(respuesta["detalle"]);
            $("#editarPie").val(respuesta["pie"]);
            $("#editarNumcuotas").val(respuesta["numcuotas"]);
            $("#editarBoletin").val(respuesta["boletin"]);
            $("#editarVcredito").val(respuesta["valor_credito"]);
            $("#editarCuota").val(respuesta["valor_cuota"]);
            $("#idCredito").val(respuesta["id_credito"])
        }

    })

});


/*=============================================
ELIMINAR TIPO SEPULTURA
=============================================*/
$(".tablaCreditos").on("click", ".btnEliminarCredito", function(){
    var idCliente = $(this).attr("idCliente");
    var idCredito = $(this).attr("idCredito");

    swal({
        title: '¿Está seguro de borrar este crédito?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar crédito!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=creditos&idCliente="+idCliente+"&idCredito="+idCredito;

        }

    })

});