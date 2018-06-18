/*=============================================
EDITAR CUOTA
=============================================*/
$(".tablaCuotas").on("click", ".btnEditarCuota", function(){

    var idCredito = $(this).attr("idCredito");
    var idCuota = $(this).attr("idCuota");
    //console.log("idCredito",idCredito);
    //console.log("idCuota",idCuota);

    var datos = new FormData();
    datos.append("idCredito", idCredito);
    datos.append("idCuota", idCuota);

    $.ajax({

        url:"ajax/cuota.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            console.log("respuesta",respuesta);

            $("#editaFecha").val(respuesta["fecha_pago"]);
            $("#editaGlosa").val(respuesta["glosa"]);
            $("#editaMonto").val(respuesta["monto_cancelado"]);
            $("#editaBoletin").val(respuesta["boletin"]);
            $("#idCuota").val(respuesta["id_cuota"]);
            $("#idCredito").val(respuesta["id_credito"]);
        }

    })

});


/*=============================================
ELIMINAR CUOTA
=============================================*/
$(".tablaCuotas").on("click", ".btnEliminarCuotas", function(){
    var idCliente = $(this).attr("idCliente");
    var idCredito = $(this).attr("idCredito");

    swal({
        title: '¿Está seguro de borrar esta cuota?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cuota!'
    }).then(function(result){

        //alert(result.value);
        if(result.value){

            window.location = "index.php?ruta=cuotas&idCliente="+idCliente+"&idCredito="+idCredito;
          
        }

    })

});



/*=============================================
CREAR CUOTA DE CREDITOS
=============================================*/
$(".tablaCreditos").on("click", ".btnMostrarCuotas", function (){

    var idCliente= $(this).attr("idCliente");
    var idCredito= $(this).attr("idCredito");
 
    window.location = "index.php?ruta=cuotas&idCliente="+idCliente+"&idCredito="+idCredito;
})

/*=============================================
BUSCAR ÚLTIMO BOLETÍN
=============================================*/

$(".btnUltimoBoletin").on("click", function(){

    var datos = new FormData();
    datos.append("ultimoBoletin","ok");
    $.ajax({

        url:"ajax/cuota.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            var res;
            if (parseInt(respuesta[0]) > parseInt(respuesta[1])) {
                if (parseInt(respuesta[0]) > parseInt(respuesta[2])) {
                    console.log("0");
                    res = parseInt(respuesta[0]) + 1;
                    $(".nuevoBoletin").val(res);
                } else {
                    console.log("2");
                    res = parseInt(respuesta[2]) + 1;
                    $(".nuevoBoletin").val(res);
                }
            } else if (parseInt(respuesta[1]) > parseInt(respuesta[2])) {
                console.log("1");
                res = parseInt(respuesta[1]) + 1;
                $(".nuevoBoletin").val(res);
            } else {
                console.log(2);
                res = parseInt(respuesta[2]) + 1;
                $(".nuevoBoletin").val(res);
            }
        }

    })

});
