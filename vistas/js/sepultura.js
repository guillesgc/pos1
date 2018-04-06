





/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarSepultura", function(){

  var idSepultura = $(this).attr("idSepultura");

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