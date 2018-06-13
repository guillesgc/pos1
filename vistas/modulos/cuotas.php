<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

    <style>
        #mdialTamanio{
            width: 30% !important;
        }
    </style>


    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Cuotas del Cliente:

            </h1>

            <ol class="breadcrumb">

                <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

                <li class="active">Cuotas Cliente</li>

            </ol>

            <?php
            if (isset($_GET["idCliente"]) && isset($_GET["idCredito"])){

                $item="id";
                $valor1=$_GET["idCliente"];
                $clientes=ControladorClientes::ctrMostrarClientes($item,$valor1);


                $item2="id_credito";
                $valor2=$_GET["idCredito"];
                $glosa=ControladorCuota::ctrMostrarCredito2($item2, $valor2);
                
            }
            ?>

            <div class="row">
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-blue">
                            <!-- /.widget-user-image -->                            
                            <h3 class="widget-user-username"><?php echo $clientes["nombre"]; ?></h3>
                            <h5 class="widget-user-desc"><?php echo strtoupper($glosa["detalle"]);?></h5>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
        </section>


        <section class="content">

            <div class="box">

                <?php

                if($_SESSION["perfil"] == "Administrador")
                {

                    echo '<div class="box-header with-border">

             <button class="btn btn-primary btnUltimoBoletin" id="btnUltimoBoletin" data-toggle="modal" data-target="#modalAgregaCuota">
             
          
             Agregar Cuota Cliente

             </button>

            </div>';
                }
                ?>


                <div class="box-body">

                    <table class="table table-bordered table-striped dt-responsive tablaCuotas" width="100%">

                        <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Fecha Pago</th>
                            <th>Glosa</th>
                            <th>Monto Cancelado</th>
                            <th>Boletín</th>
                            <th>Opciones</th>

                        </tr>

                        </thead>

                        <tbody>
                        <?php

                        $item = "id_credito";
                        $valor = $_GET["idCredito"];

                        $cuotas = ControladorCuota::ctrMostrarCuotaCC($item, $valor);

                        foreach ($cuotas as $key => $value) {

                            echo ' <tr>

                                    <td>'.($key+1).'</td>
                                    <td>'.$value["fecha_pago"].'</td>
                                    <td>'.strtoupper($value["glosa"]).'</td>
                                    <td>$'.number_format($value["monto_cancelado"]).'</td>
                                    <td>'.$value["boletin"].'</td>
                                    <td>

                                        <div class="btn-group">
                          
                                            <button class="btn btn-warning btnEditarCuota" idCuota="'.$value["id_cuota"].'" idCredito="'.$value["id_credito"].'" idCliente="'.$_GET["idCliente"].'" data-toggle="modal" data-target="#modalEditarCuota"><i class="fa fa-pencil"></i></button>
                                            
                                            <button class="btn btn-success btnImprimirCuota" idCuota="'.$value["id_cuota"].'" idCredito="'.$value["id_credito"].'" idCliente="'.$_GET["idCliente"].'"><i class="fa fa-print"></i></button>';
                                            if($_SESSION["perfil"] == "Administrador"){

                                        echo '<button class="btn btn-danger btnEliminarCuotas" idCredito="'.$_GET["idCredito"].'" idCuota="'.$value["id_cuota"].'" idCliente="'.$_GET["idCliente"].'"><i class="fa fa-times"></i></button>';

                                            }

                                        echo '</div>  

                                    </td>

                            </tr>';
                        }
                        ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </div>

    <!--=====================================
    MODAL AGREGAR CUOTA
    ======================================-->

    <div id="modalAgregaCuota" class="modal fade" role="dialog">

        <div class="modal-dialog" id="mdialTamanio">

            <div class="modal-content">

                <form role="form" method="post">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                    <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Agregar Cuota</h4>

                    </div>

                    <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

                    <div class="modal-body">

                        <div class="box-body">


                            <!-- ENTRADA PARA FECHA DE PAGO -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="text" class="form-control input-lg " name="nuevaFecha"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Pago" required>
                                    <input type="hidden" name="idCredito" id="idCredito" value=<?php echo $_GET["idCredito"];?> >

                                </div>

                            </div>


                            <!-- ENTRADA PARA DETALLE DE CUOTA -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="text" class="form-control input-lg" name="nuevaGlosa" placeholder="Glosa" required>

                                </div>

                            </div>



                            <!-- ENTRADA PARA PIE -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="number" class="form-control input-lg" min="1" name="nuevoMonto" placeholder="Monto a Cancelar" required>

                                </div>

                            </div>



                            <!-- ENTRADA PARA BOLETÍN -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="number" id="nuevoBoletin"  class="form-control input-lgv nuevoBoletin" name="nuevoBoletin" min="1" placeholder="Boletin" required>

                                </div>

                            </div>


                        </div>

                    </div>

                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary">Guardar Cuota</button>

                    </div>

                    <?php

                    $crearCuota = new ControladorCuota();
                    $crearCuota -> ctrCrearCuota();

                    ?>

                </form>

            </div>

        </div>

    </div>

    <!--=====================================
    MODAL EDITAR CUOTA
    ======================================-->

    <div id="modalEditarCuota" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <div class="modal-content">

                <form role="form" method="post">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                    <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Editar Cuota</h4>

                    </div>

                    <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

                    <div class="modal-body">

                        <div class="box-body">


                            <!-- ENTRADA PARA FECHA DE PAGO -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="text" class="form-control input-lg " name="editaFecha" id="editaFecha" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Pago" required>
                                    <input type="hidden" name="idCredito" id="idCredito" value=<?php echo $_GET["idCredito"];?> >
                                    <input type="hidden" name="idCuota" id="idCuota">

                                </div>

                            </div>


                            <!-- ENTRADA PARA DETALLE DE CUOTA -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="text" class="form-control input-lg" name="editaGlosa" id="editaGlosa" placeholder="Glosa" required>

                                </div>

                            </div>



                            <!-- ENTRADA PARA PIE -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="number" class="form-control input-lg" min="1" name="editaMonto" id="editaMonto" placeholder="Monto a Cancelar" required>

                                </div>

                            </div>



                            <!-- ENTRADA PARA NUMERO DE CUOTAS -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="number" class="form-control input-lg" name="editaBoletin" id="editaBoletin" min="1" placeholder="Boletin" required>

                                </div>

                            </div>


                        </div>

                    </div>


                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary">Guardar cambios</button>

                    </div>

                    <?php

                    $editarCuota = new ControladorCuota();
                    $editarCuota   -> ctrEditarCuota();

                    ?>

                </form>

            </div>

        </div>

    </div>

<?php

    $eliminaCuota = new ControladorCuota();
    $eliminaCuota   -> ctrBorrarCuota();

?>