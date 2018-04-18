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
            $("#nuevoVcredito").val(respuesta["valor_credito"]);
            $("#nuevaCuota").val(respuesta["valor_cuota"]);
        }

    })

});


/*=============================================
ELIMINAR TIPO SEPULTURA
=============================================*/
$(".tablaCreditos").on("click", ".btnEliminarCredito", function(){

    var idCredito = $(this).attr("idCredito");

    swal({
        title: '¿Está seguro de borrar el tipo de sepultura?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar tipo de sepultura!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=credito&idCredito="+idCredito;

        }

    })

});