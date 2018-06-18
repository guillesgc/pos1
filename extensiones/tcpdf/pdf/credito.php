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

require_once "../../../controladores/cuota.controlador.php";
require_once "../../../modelos/cuota.modelo.php";



class imprimirCredito{

    public $codigo;

    public function traerImpresionCredito(){

        //BUSCAR CUOTA
        $itemCuota = "id_cuota";
        $valorCuota = $this->codigo;

        $respuestaCuota = ControladorCuota::ctrMostrarCuota($itemCuota,$valorCuota);

        //var_dump($respuestaCuota);

        //BUSCAR CRÉDITO

        $itemCredito = "id_credito";
        $valorCredito = $respuestaCuota["id_credito"];

        $respuestaCredito = ControladorCreditos::ctrMostrarCredito2($itemCredito,$valorCredito);

        //var_dump($respuestaCredito);

        //BUSCAR CLIENTE
        $itemCliente = "id";
        $valorCliente = $respuestaCredito['id_cliente'];

        $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

        //var_dump($respuestaCliente);

        //BUSCAR TODAS LAS CUOTAS DEL CRÉDITO
        $itemCuotas = "id_credito";
        $valorCuotas = $respuestaCuota['id_credito'];

        $respuestaCuotas = ControladorCuota::ctrMostrarCuota2($itemCredito,$valorCredito);

        //var_dump($respuestaCuotas);

        //BUASCAR VENTA ASOCIADA
        //$itemVenta = "codigo";
        //$valorVenta = $respuestaCredito['boletin'];

        //$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

        //var_dump($respuestaVenta);


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
            <td style="font-size:10px; text-align: right; line-height:15px;"><strong>N° BOLETÍN: $respuestaCuota[boletin]</strong></td>
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
			<td style="border: 1px solid #666; background-color:white; width:110px; text-align:center">$respuestaCredito[fecha_pago]</td>
		</tr>
		<tr> 
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Recibido de</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$respuestaCliente[nombre]</td>
		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Domicilio</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$respuestaCliente[direccion]</td>
		</tr>
        <tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Rut</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:270px">$respuestaCliente[documento]</td>
            <td style="border: 1px solid #666; background-color:white; width:70px; text-align:right"><strong>Teléfono</strong></td>
            <td style="border: 1px solid #666; background-color:white; width:110px; text-align:right">$respuestaCliente[telefono]</td>
		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Email</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$respuestaCliente[email]</td>
		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>$</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$$respuestaCuota[monto_cancelado]</td>
		</tr>
		<tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Tipo de pago</strong></td>
			<td style="border: 1px solid #666; background-color:white; width:450px">$</td>
		</tr>
		
	</table>
	<br>
	<br>
	<table style="font-size:10px; padding:5px 10px;">
	    <tr>
			<td style="border: 1px solid #666; background-color:white; width:90px"><strong>Crédito</strong> </td>
			<td style="border: 1px solid #666; background-color:white; width:100px">$$respuestaCredito[valor_credito]</td>
		</tr>
		<tr>
		    <td style="border: 1px solid #666; background-color:white; width:90px"><strong>Número de cuotas</strong> </td>
			<td style="border: 1px solid #666; background-color:white; width:100px">$respuestaCredito[numcuotas]</td>
        </tr>
        <tr>
            <td style="border: 1px solid #666; background-color:white; width:90px"><strong>Valor cuota </strong></td>
			<td style="border: 1px solid #666; background-color:white; width:100px">$respuestaCredito[valor_cuota]</td>
        </tr>
		
	</table>
	
	<br>
	<br>

EOF;

        $pdf->writeHTML($bloque2, false, false, false, false, '');


//---------------------------------------------------------------------
        $bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
	    <tr>
		
		<td style="border: 1px solid #666; background-color:white; width:540px; text-align:center">$respuestaCredito[detalle]</td>
		<!--<td style="border: 1px solid #666; background-color:white; width:110px; text-align:center">Monto</td>-->
		</tr>
		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:540px; text-align:center">Pie - $respuestaCredito[pie]</td>    
		</tr>

	</table>

EOF;

        $pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
//var_dump($productos);
        $i=0;
        $pagado=$respuestaCredito['pie'];
        $saldo=0;
        foreach ($respuestaCuotas as $key => $item) {
            $i++;
            $pagado = $pagado + $item['monto_cancelado'];

            $bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:540px; text-align:center">Cuota #$i - $$item[monto_cancelado] -  Boletín $item[boletin] - $item[fecha_pago]</td>

			<!--<td style="border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center"></td> -->



		</tr>

	</table>
        
             

EOF;

            $saldo = $respuestaCredito['valor_credito'] - $pagado;
            $pdf->writeHTML($bloque4, false, false, false, false, '');
            if(strcmp($respuestaCuota['boletin'],$item['boletin']) == 0){
                break;
            }
        }

// ---------------------------------------------------------


// ---------------------------------------------------------

        $bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>
			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>
		</tr>
		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center;"></td>
			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center"><strong>Monto</strong></td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$$pagado</td>
		</tr>

    <br>
	</table>
	<br>
	<br>
	<br>
	

EOF;

        $pdf->writeHTML($bloque5, false, false, false, false, '');


        $bloque6 = <<<EOF
    
    <div style="font-size:9px;"><strong><u>AVISOS IMPORTANTES</u></strong></div>
	<div style="font-size:9px;">1.-SE PROHIBE PINTAR BÓVEDAS /O NICHOS Y COLOCAR ACCESORIOS QUE NO SEAN LOS QUE CORRESPONDAN A LA LÁPIDA RESPECTIVA.
	    <br>2.- EL VENCIMINETO DE LAS SEPULTACIONES ES RESPONSABILIDAD DE LOS DEUDOS.
	    <br>3.- CONSTRUCCIÓN SE PODRÁ REALIZAR UNA VEZ CANCELADA LA ÚLTIMA CUOTA.
	    <br>4.- EL TIEMPO PARA PODER CONSTRUIR ES ANTES DEL PRIMER AÑO.
	    <br>5.- LA SEPULTURA NO PODRÁ SER VENDIDA ANTES DE LOS CINCO AÑOS.
	</div>
	<br>
	<div style="font-size:9px;"><strong><u>EN SEPULTACIONES DE TIERRA</u></strong></div>
	<div style="font-size:9px;">6.-SOLO PUEDEN INSTALARSE, EN UNA SUPERFICIE MÁXIMA DE 1,60 MTS DE LARGO POR 90 CMS DE ANCHO LA SIGUIENTE INFRAESTRUCTURA:
	    <br>A) UNA REJA PERIMETRAL DE FIERRO O MADERA (SIN TECHO) DE UNA ALTURA INFERIOR A 1 METRO.
	    <br>B) UNA CRUZ DE TAMAÑO MÁXIMO DE 90 CMS DE ALTO POR 60 CMS DE ANCHO.
	    <br>C) RESPALDO DE 90 CMS DE ALTO POR 60 CMS DE ANCHO. 
	</div>
EOF;

        $pdf->writeHTML($bloque6, false, false, false, false, '');

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO

        $pdf->Output('credito.pdf');

    }

}

$credito = new imprimirCredito();
$credito -> codigo = $_GET["codigo"];
$credito -> traerImpresionCredito();

?>