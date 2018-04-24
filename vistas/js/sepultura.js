

/*=============================================
EDITAR SEPULTURA
=============================================*/

$(".tablaSep").on("click", ".btnEditarSepultura", function(){

    var idSepultura = $(this).attr("idSepultura");
    console.log("idSepultura", idSepultura);
    var datos = new FormData();
    datos.append("idSepultura", idSepultura);

    $.ajax({

        url:"ajax/sepultura.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            console.log("respuesta",respuesta);

            document.getElementById("idSepultura").value = respuesta["id_sepultura"];

            $("#editarNumero").val(respuesta["numero_sepultura"]);

            $("#editarSepultura").val(respuesta["id_cuartel_cuerpo"]);

            $("#editarEstado").val(respuesta["estado"]);

            $("#editarCapacidad").val(respuesta["capacidad"]);

            $("#editarCementerio").val(respuesta["id_cementerio"]);

            $("#editarCorrida").val(respuesta["corrida"]);

            $("#editarPiso").val(respuesta["piso"]);

            $("#editarOrden").val(respuesta["orden"]);
        }

    })

})

/*=============================================
ELIMINAR SEPULTURA
=============================================*/
$(".tablaSep").on("click", ".btnEliminarSepultura", function(){
  var idSepultura = $(this).attr("idSepultura");
  console.log("idSepultura",idSepultura);

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

});


