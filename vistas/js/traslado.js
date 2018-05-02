/*=============================================
EDITAR TRASLADO
=============================================*/
$(".tabladxp").on("click", ".btnTraslado", function(){

    var idDifuntox = $(this).attr("idDifuntox");

    var datos = new FormData();
    datos.append("idDifuntox", idDifuntox);

    $.ajax({

        url:"ajax/traslado.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            console.log("respuesta",respuesta);

            $("#idDifuntox").val(respuesta["id_difunto"]);
            
        }

    })

});

