<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

require_once "../../../controladores/credito.controlador.php";
require_once "../../../modelos/credito.modelo.php";

require_once "../../../controladores/item.controlador.php";
require_once "../../../modelos/item.modelo.php";

require_once "../../../controladores/utm.controlador.php";
require_once "../../../modelos/utm.modelo.php";



class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);
$fecha = substr($respuestaVenta["fecha"],0,-8);
$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"],2);
//$impuesto = number_format($respuestaVenta["impuesto"],2);
$total = number_format($respuestaVenta["total"],2);




//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);


//TRAEMOS LA INFORMACIÓN DEL CRÉDITO

$itemCredito = "boletin";
$valorCredito = $respuestaVenta["codigo"];

$respuestaCredito = ControladorCreditos::ctrMostrarCredito($itemCredito, $valorCredito);
if(!$respuestaCredito){
    $respuestaCredito["valor_credito"] = "no aplica";
    $respuestaCredito["numcuotas"] = "no aplica";
    $respuestaCredito["valor_cuota"] = "no aplica";
}

$totalVenta = number_format($respuestaVenta["total"],0);
//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
	    <br>
		<tr>
		<br>    
		    <td style="width:150px"><img src="images/logo_cmvalpo.jpg"></td>
			<td>
			<br>
			    <div style="font-size:10px; text-align: center; line-height:15px;" >
			        <strong><br><br>BOLETÍN DE INGRESOS CEMENTERIOS</strong>
			    </div>
            </td>
            <td style="font-size:10px; text-align: right; line-height:15px;"><strong>N° BOLETÍN: $respuestaVenta[codigo]</strong></td>
		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
	
		<tr>
			<td style="width:540px"><img src="images/back.jpg"></td>
		</tr>
	</table>
	
	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Cementerio</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:270px">Playa ancha</td>
			<td style="border: 1px solid #666; background-color:white; width:70px; text-align:center"><strong>Fecha</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:110px; text-align:center">$fecha</td>
		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Recibido de</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$respuestaVendedor[nombre]</td>
		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Domicilio</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$respuestaCliente[direccion]</td>
		</tr>
        <tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Rut</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:270px">$respuetaCliente[documento]</td>
            <td style="border: 1px solid #666; background-color:white; width:70px; text-align:right"><strong>Teléfono</strong></td>
            <td style="border: 1px solid #666; background-color:white; width:110px; text-align:right">$respuestaCliente[telefono]</td>
		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Email</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$respuestaCliente[email]</td>
		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>$</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$ $totalVenta</td>
		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Tipo de pago</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$respuestaVenta[metodo_pago]</td>
		</tr>
		
	</table>
	<br>
	<br>
	<table style="font-size:10px; padding:5px 10px;">
	    <tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Crédito</strong> </td>
			<td style="border: 1px solid #666; background-color:white; width:100px">$respuestaCredito[valor_credito] </td>
		</tr>
		<tr>
		    <td style="border: 1px solid #666; background-color:white; width:90px"><strong>Número de cuotas</strong> </td>
			<td style="border: 1px solid #666; background-color:white; width:100px">$respuestaCredito[numcuotas] </td>
        </tr>
        <tr>
            <td style="border: 1px solid #666; background-color:white; width:90px"><strong>Valor cuota </strong></td>
			<td style="border: 1px solid #666; background-color:white; width:100px">$respuestaCredito[valor_cuota] </td>
        </tr>
		
	</table>
	
	<br>
	<br>
	
	<table style="font-size:10px; padding:5px 10px;">
        <tr>    
            <td style="border: 1px solid #666; background-color:white; width:90px"><strong>Información adicional</strong> </td>
            <td style="border: 1px solid #666; background-color:white; width:450px">$respuestaVenta[info_adicional] </td>
        </tr>
        <tr>
            <td style="border: 1px solid #666; background-color:white; width:90px"><strong>Glosa</strong> </td>
            <td style="border: 1px solid #666; background-color:white; width:450px">$respuestaVenta[glosa]</td>
        </tr>
        <br>
        <br>
        
    </table>
    <br>
    <br>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:245px; text-align:center"><strong>Producto</strong></td>
		<td style="border: 1px solid #666; background-color:white; width:65px; text-align:center"><strong>Cantidad</strong></td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center"><strong>Valor Unit.</strong></td>
		<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center"><strong>Dcto</strong></td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center"><strong>Valor Total</strong></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
//var_dump($productos);
foreach ($productos as $key => $item) {

$itemProducto = "descripcion";
$valorProducto = $item["descripcion"];
$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$itemItem = "id_item";
$valorItem = $item["id"];

$respuestaItem = ControladorItem::ctrMostrarItem($itemItem,$valorItem);

$itemUtm = "null";
$valorUtm = "null";

$respuestaUtm = ControladorUtm::ctrMostrarUtmActual($itemUtm,$valorUtm);
//var_dump($respuestaItem);
//var_dump($respuestaUtm);

$valorUnitario = number_format($respuestaItem["precio"]*$respuestaUtm["valor"],0);
$precioTotal = number_format($item["total"], 2);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:245px; text-align:center">$item[descripcion]</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:65px; text-align:center">$item[cantidad]</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$ $valorUnitario</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center"> $item[descuento]</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$$precioTotal</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>
			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>
		</tr>
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center"><strong>Neto</strong></td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ $neto</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center"><strong>Total</strong></td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ $total</td>
		</tr>

    <br>
	</table>
	<br>
	

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');


    $bloque6 = <<<EOF
    
    <div style="font-size:9px;"><strong><u>AVISOS IMPORTANTES</u></strong></div>
	<div style="font-size:9px;">1.-SE PROHIBE PINTAR BÓVEDAS /O NICHOS Y COLOCAR ACCESORIOS QUE NO SEAN LOS QUE CORRESPONDAN A LA LÁPIDA RESPECTIVA.
	    <br>2.- EL VENCIMINETO DE LAS SEPULTACIONES ES RESPONSABILIDAD DE LOS DEUDOS.
	</div>
	<br>
	<div style="font-size:9px;"><strong><u>EN SEPULTACIONES DE TIERRA</u></strong></div>
	<div style="font-size:9px;">3.-SOLO PUEDEN INSTALARSE, EN UNA SUPERFICIE MÁXIMA DE 1,60 MTS DE LARGO POR 90 CMS DE ANCHO LA SIGUIENTE INFRAESTRUCTURA:
	    <br>A) UNA REJA PERIMETRAL DE FIERRO O MADERA (SIN TECHO) DE UNA ALTURA INFERIOR A 1 METRO.
	    <br>B) UNA CRUZ DE TAMAÑO MÁXIMO DE 90 CMS DE ALTO POR 60 CMS DE ANCHO.
	    <br>C) RESPALDO DE 90 CMS DE ALTO POR 60 CMS DE ANCHO. 
	</div>
EOF;
    $pdf->writeHTML($bloque6, false, false, false, false, '');
// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('factura.pdf');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>