/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/

if(localStorage.getItem("capturarRango") != null){

	$("#daterange-btn span").html(localStorage.getItem("capturarRango"));


}else{

	$("#daterange-btn span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}


/*=============================================
CARGAR LA TABLA DINÁMICA
=============================================*/

var table3 = $('.tablaVentas').DataTable({

	"ajax":"ajax/datatable-ventas.ajax.php",
	"columnDefs": [

		{
			"targets": -1,
			 "data": null,
			 "defaultContent": '<div class="btn-group"><button class="btn btn-primary agregarProducto recuperarBoton" idItem>Agregar</button></div>'

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

/*=============================================
ACTIVAR LOS BOTONES CON LOS ID CORRESPONDIENTES
=============================================*/

$(".tablaVentas tbody").on( 'click', 'button.agregarProducto', function () {

	var data = table3.row( $(this).parents('tr') ).data();
	//console.log("data",data);
	$(this).attr("idItem",data[0]);
})


/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

	var idItem = $(this).attr("idItem");
	//console.log("idProducto",idItem);

	$(this).removeClass("btn-primary agregarProducto");

	$(this).addClass("btn-default");

	var datos = new FormData();
    datos.append("idItem", idItem);
     $.ajax({

     	url:"ajax/item.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
     		console.log("respuesta",respuesta);
      	    var descripcion = respuesta["nombre"];
          	var stock = respuesta["stock"];
          	var precio = Math.round(respuesta["precio"]	);

          	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          
	          '<div class="col-xs-5" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	              	'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idItem="'+idItem+'"><i class="fa fa-times"></i></button></span>'+

	          	    '<input type="text" class="form-control nuevaDescripcionProducto" idItem="'+idItem+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-2" style="padding-right:0px">'+
	            
	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+

	          '</div>' +

			  '<!-- Descuento del producto -->'+

			  '<div class="col-xs-2 ingresoDescuento " style="padding-right:5px">'+

                '<input type="number" min="0" class="form-control nuevoDescuentoProducto" name="nuevoDescuentoProducto" placeholder="Dcto" autocomplete="On" required>'+

              '</div>'+

	          '<!-- Precio del producto -->'+

	          '<div class="col-xs-3 ingresoPrecio" style="padding-left:5px">'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	                 
	              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+
	 
	            '</div>'+
	             
	          '</div>'+

	        '</div>') 

	        // SUMAR TOTAL DE PRECIOS

	        sumarTotalPrecios()

	        // AGREGAR IMPUESTO

	        //agregarImpuesto()

	        // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        $(".nuevoPrecioProducto").number(true,0);

      	}

     })

});

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

$(".formularioVenta").on("click", "button.quitarProducto", function(){

	$(this).parent().parent().parent().parent().remove();

	var idItem = $(this).attr("idItem");
	console.log("idItem",idItem);
	$("button.recuperarBoton[idItem='"+idItem+"']").removeClass('btn-default');

	$("button.recuperarBoton[idItem='"+idItem+"']").addClass('btn-primary agregarProducto');

	if($(".nuevoProducto").children().length == 0){

		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#nuevoTotalVenta").attr("total",0);

	}else{

		// SUMAR TOTAL DE PRECIOS

    	sumarTotalPrecios()

    	// AGREGAR IMPUESTO
	        
        //agregarImpuesto()

        // AGRUPAR PRODUCTOS EN FORMATO JSON

        listarProductos()

	}

})

/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/

$(".btnAgregarProducto").click(function(){

	var datos = new FormData();
	datos.append("traerItems", "ok");
	$.ajax({

		url:"ajax/item.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    console.log("respuesta",respuesta);
      	    	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+

	          '<div class="col-xs-5" style="padding-right:0px">'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idItem><i class="fa fa-times"></i></button></span>'+

	              '<select class="form-control nuevaDescripcionProducto" idItem name="nuevaDescripcionProducto" required>'+

	              '<option>Seleccione el producto</option>'+

	              '</select>'+

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-2 ingresoCantidad">'+

	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" cantidadProducto required>'+

	          '</div>' +
			  '<!-- Descuento del producto -->'+

			  '<div class="col-xs-2 ingresoDescuento" style="padding-right:10px ">'+
                    '<span class="input-group-addon"><i class="fa fa-percent"></i></span>'+

				'<input type="number" min="0" class="form-control nuevoDescuentoProducto" name="nuevoDescuentoProducto" min= "0" max="100" placeholder="Dcto" autocomplete="On" dctoProducto required>'+

			  '</div>'+

	          '<!-- Precio del producto -->'+

	          '<div class="col-xs-3 ingresoPrecio" style="padding-left:5px">'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

	              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" readonly required>'+

	            '</div>'+

	          '</div>'+

	        '</div>');


	        // AGREGAR LOS PRODUCTOS AL SELECT

	         respuesta.forEach(funcionForEach);

	         function funcionForEach(item, index){

	         	$(".nuevaDescripcionProducto").append(

					'<option idItem="'+item.id_item+'" value="'+item.nombre+'">'+item.nombre+'</option>'
	         	)

	         }

	         // SUMAR TOTAL DE PRECIOS

    		sumarTotalPrecios()

    		// AGREGAR IMPUESTO

	        //agregarImpuesto()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        $(".nuevoPrecioProducto").number(true, 0);

      	}


	})

})

/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

	var nombreProducto = $(this).val();

	var nuevaDescripcionProducto = $(this).parent().parent().parent().children().children().children(".nuevaDescripcionProducto");

	var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

	var nuevoDescuentoProducto = $(this).parent().parent().parent().children(".ingresoDescuento").children(".nuevoDescuentoProducto");

	//var nuevoDctoProducto = $(this).parent().parent().parent().children(".ingresoDescuento").children(".nuevoDescuento");




	var datos = new FormData();
    datos.append("nombreItem", nombreProducto);


	  $.ajax({

     	url:"ajax/item.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    console.log("respuestaa",respuesta);
      	    $(nuevaDescripcionProducto).attr("idItem", respuesta["id_item"]);
      	    $(nuevaCantidadProducto).attr("cantidadProducto",1);
      	    $(nuevoDescuentoProducto).attr("dctoProducto",0);
      	    //$(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
      	    //$(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])-1);
      	    $(nuevoPrecioProducto).val(Math.round(respuesta["precio"]));
      	    $(nuevoPrecioProducto).attr("precioReal", respuesta["precio"]);
			//cambiar precio por valor si se quiere en pesos (sino en utm)
  	      // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

      	}

      })
})

/*=============================================
MODIFICAR LA CANTIDAD
=============================================*/

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){

	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	var dcto = $("nuevoDescuentoProducto").attr("dctoProducto");
	dcto = (1-(dcto/100));
	$(this).attr("cantidadProducto",$(this).val());

	if(dcto){
        var precioFinal = $(this).val() * precio.attr("precioReal") * dcto ;
	}else {
        var precioFinal = $(this).val() * precio.attr("precioReal");
    }



	precio.val(precioFinal);

	//var nuevoStock = Number($(this).attr("stock")) - $(this).val();

	//$(this).attr("nuevoStock", nuevoStock);

	//if(Number($(this).val()) > Number($(this).attr("stock"))){

	//	$(this).val(1);

	//	swal({
	//      title: "La cantidad supera el Stock",
	//      text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",
	//      type: "error",
	//      confirmButtonText: "¡Cerrar!"
	//    });

	//}

	// SUMAR TOTAL DE PRECIOS

	sumarTotalPrecios()

	// AGREGAR IMPUESTO
	        
    //agregarImpuesto()

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos()

});

/*=============================================
MODIFICAR EL DESCUENTO
=============================================*/

$(".formularioVenta").on("change", "input.nuevoDescuentoProducto", function(){

   	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto ");
	var cantidad =  $(".nuevaCantidadProducto").attr("cantidadProducto");
    $(this).attr("dctoProducto",$(this).val());

	var preciof;
	if(cantidad){
		preciof = (1 - ($(this).val() / 100)) * precio.attr("precioReal") * cantidad ;
	}else {
        preciof = (1 - ($(this).val() / 100)) * precio.attr("precioReal");
    }
   	//console.log("val",$(this).val());
   	//console.log("porcentaje dcto",($(this).val()/100));
   	//console.log("preciof",preciof);
   	precio.val(preciof);

   	sumarTotalPrecios();

   	listarProductos();

});



/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/

function sumarTotalPrecios(){

	var precioItem = $(".nuevoPrecioProducto");
	var arraySumaPrecio = [];  

	for(var i = 0; i < precioItem.length; i++){

		 arraySumaPrecio.push(Number($(precioItem[i]).val()));
		 
	}

	function sumaArrayPrecios(total, numero){

		return total + numero;

	}

	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
	//console.log("sumaTotalPrecio", sumaTotalPrecio);
	aux = sumaTotalPrecio/10;
	//console.log ("aux", aux);
	aux = Math.round(aux);
	sumaTotalPrecio = aux * 10;
	//console.log("precio final",sumaTotalPrecio);

	$("#nuevoTotalVenta").val(sumaTotalPrecio);
	$("#totalVenta").val(sumaTotalPrecio);
	$("#nuevoTotalVenta").attr("total",sumaTotalPrecio);


}


/*=============================================
AUTOCOMPLETAR CLIENTES
=============================================*/
$(document).ready(function () {
    var datos = new FormData();
    datos.append("ultimoBoletin","ok");;
    $.ajax({

        url:"ajax/credito.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            $(".nuevaVenta").val(respuesta[0]);
        }

    })

});



/*=============================================
AUTOCOMPLETAR CLIENTES
=============================================*/

$(document).ready(function () {
    $(".seleccionarCliente").typeahead({
        source: function (query,result) {
            $.ajax({
                url: 'ajax/clientes.ajax.php',
                method: "POST",
                data:{query:query},
                dataType:"json",
                success: function(data){
                    //console.log("respuesta", data);
                    var len = data.length;
                    var send = [];
                    //console.log("largo array",len)
                    for(var i=0;i<len;i++) {
                        send[i] = data[i]['nombre'];
                        if((i+1) === len){//último
                            result($.map(send,function(item){
                                return item;
                            }));
                        }
                    }

                }

            });
        }
    });
});

/*=============================================
CUANDO CAMBIA EL IMPUESTO
=============================================*/
/*
$("#nuevoImpuestoVenta").change(function(){

	//agregarImpuesto();

});
*/
/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/

$("#nuevoTotalVenta").number(true, 0);

/*=============================================
SELECCIONAR MÉTODO DE PAGO
=============================================*/

/*
$("#nuevoMetodoPago").change(function(){

	var metodo = $(this).val();

	if(metodo == "Efectivo"){

		$(this).parent().parent().removeClass("col-xs-6");

		$(this).parent().parent().addClass("col-xs-4");

		$(this).parent().parent().parent().children(".cajasMetodoPago").html(

			 '<div class="col-xs-4">'+ 

			 	'<div class="input-group">'+ 

			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+ 

			 		'<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>'+

			 	'</div>'+

			 '</div>'+

			 '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+

			 	'<div class="input-group">'+

			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

			 		'<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>'+

			 	'</div>'+

			 '</div>'

		 )

		// Agregar formato al precio

		$('#nuevoValorEfectivo').number( true, 0);
      	$('#nuevoCambioEfectivo').number( true, 0);


      	// Listar método en la entrada
      	listarMetodos()

	}

	

})
*/
/*=============================================
CAMBIO EN EFECTIVO
=============================================*/

/*
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

	var efectivo = $(this).val();

	var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

	nuevoCambioEfectivo.val(cambio);

})
*/

/*=============================================
CAMBIO TRANSACCIÓN
=============================================*/
/*
$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function(){

	// Listar método en la entrada
     listarMetodos()


})
*/



/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductos() {

    var listaProductos = [];

    var descripcion = $(".nuevaDescripcionProducto");

    var cantidad = $(".nuevaCantidadProducto");

    var precio = $(".nuevoPrecioProducto");

    var descuento = $(".nuevoDescuentoProducto");

    for (var i = 0; i < descripcion.length; i++) {

        listaProductos.push({
            "id": $(descripcion[i]).attr("idItem"),
            "descripcion": $(descripcion[i]).val(),
            "cantidad": $(cantidad[i]).val(),
            "descuento": $(descuento[i]).val(),
            //"stock" : $(cantidad[i]).attr("nuevoStock"),
            "precio": $(precio[i]).attr("precioReal"),
            "total": $(precio[i]).val()
        })

    }
    console.log("lista productos", listaProductos);
    $("#listaProductos").val(JSON.stringify(listaProductos));

}




/*=============================================
LISTAR MÉTODO DE PAGO
=============================================*/

//function listarMetodos(){

//	var listaMetodos = "";

//	if($("#nuevoMetodoPago").val() == "Efectivo"){

//		$("#listaMetodoPago").val("Efectivo");

//	}else{

//		$("#listaMetodoPago").val($("#nuevoMetodoPago").val());
		//$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());

//	}

//}

/*=============================================
BOTON EDITAR VENTA
=============================================*/

$(".tablas").on("click", ".btnEditarVenta", function(){

	var idVenta = $(this).attr("idVenta");
	console.log("idVenta", idVenta);

	window.location = "index.php?ruta=editar-venta&idVenta="+idVenta;


})


/*=============================================
BORRAR VENTA
=============================================*/

$(".tablas").on("click", ".btnEliminarVenta", function(){

  var idVenta = $(this).attr("idVenta");

  swal({
        title: '¿Está seguro de borrar la venta?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar venta!'
      }).then(function(result) {
        if (result.value) {
          
            window.location = "index.php?ruta=ventas&idVenta="+idVenta;
        }

  })

})

/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(".tablas").on("click", ".btnImprimirFactura", function(){

	var codigoVenta = $(this).attr("codigoVenta");

	window.open("extensiones/tcpdf/pdf/factura.php?codigo="+codigoVenta, "_blank");

})

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn span").html();
   
   	localStorage.setItem("capturarRango", capturarRango);

   	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "ventas";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){


	var textoHoy = $(this).attr("data-range-key");

	if(textoHoy == "Hoy"){

		var d = new Date();
		
		var dia = d.getDate();
		var mes = d.getMonth()+1;
		var año = d.getFullYear();

		if(mes < 10){

			var fechaInicial = año+"-0"+mes+"-"+dia;

    		var fechaFinal = año+"-0"+mes+"-"+dia;

		}else if(dia < 10){

			var fechaInicial = año+"-"+mes+"-0"+dia;

    		var fechaFinal = año+"-"+mes+"-0"+dia;


		}else if(mes < 10 && dia < 10){

			var fechaInicial = año+"-0"+mes+"-0"+dia;

    		var fechaFinal = año+"-0"+mes+"-0"+dia;

		}else{

			var fechaInicial = año+"-"+mes+"-"+dia;

    		var fechaFinal = año+"-"+mes+"-"+dia;

		}

    	localStorage.setItem("capturarRango", "Hoy");

    	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})




