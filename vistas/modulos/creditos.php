<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

    <style>
        #mdialTamanio{
            width: 50% !important;
        }
    </style>


    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Créditos Cliente

            </h1>

            <ol class="breadcrumb">

                <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

                <li class="active">Créditos Cliente</li>

            </ol>

            <?php
            if (isset($_GET["idCliente"])){

                $item="id";
                $valor=$_GET["idCliente"];

                $clientes=ControladorClientes::ctrMostrarClientes($item,$valor);
            }
            ?>

            <div class="row">
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username"><?php echo $clientes["nombre"]; ?></h3>
                            <h5 class="widget-user-desc">RUT: <?php echo $clientes["documento"]; ?></h5>
                            <h5 class="widget-user-desc">DIRECCIÓN: <?php echo strtoupper($clientes["direccion"]); ?></h5>
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

             <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCredito">
          
             Crear Nuevo Crédito

             </button>

            </div>';
                }
                ?>

                <div class="box-body">

                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                        <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Fecha Pago</th>
                            <th>Glosa</th>
                            <th>Valor Crédito</th>
                            <th>Pie</th>
                            <th>Nº Cuotas</th>
                            <th>Valor Cuota</th>
                            <th>Monto Pagado</th>
                            <th>Saldo</th>
                            <th>Boletin</th>
                            <th>Opciones</th>


                        </tr>

                        </thead>

                        <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $creditos = ControladorCreditos::ctrMostrarCredito($item, $valor);

                        foreach ($creditos as $key => $value) {

                            echo ' <tr>

                    <td>'.($key+1).'</td>
                    <td>'.$value["fecha_pago"].'</td>
                    <td>'.$value["detalle"].'</td>
                    <td>'.$value["valor_credito"].'</td>
                    <td>'.$value["pie"].'</td>
                    <td>'.$value["numcuotas"].'</td>
                    <td>'.$value["valor_cuota"].'</td>
                    <td></td>
                    <td></td>
                    <td>'.$value["boletin"].'</td>
                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCredito" idCredito="'.$value["id_credito"].'" data-toggle="modal" data-target="#modalEditarCredito"><i class="fa fa-pencil"></i></button>';

                            if($_SESSION["perfil"] == "Administrador"){

                                echo '<button class="btn btn-danger btnEliminarCredito" idCredito="'.$value["id_credito"].'"><i class="fa fa-times"></i></button>';

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
    MODAL AGREGAR CREDITO
    ======================================-->

    <div id="modalAgregaCredito" class="modal fade" role="dialog">

        <div class="modal-dialog" id="mdialTamanio">

            <div class="modal-content">

                <form role="form" method="post">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                    <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Agregar Sepultura</h4>

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

                                    <input type="text" class="form-control input-lg" name="nuevaFechap" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Pago" required>

                                </div>

                            </div>


                            <!-- ENTRADA PARA DETALLE DE CREDITO -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="text" class="form-control input-lg" name="nuevoDetalle" placeholder="Glosa" required>

                                </div>

                            </div>



                            <!-- ENTRADA PARA PIE -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="number" class="form-control input-lg" min="1" name="nuevoPie" placeholder="Pie" required>

                                </div>

                            </div>



                            <!-- ENTRADA PARA NUMERO DE CUOTAS -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="number" class="form-control input-lg" name="nuevoNumcuotas" min="1" placeholder="Número de Cuotas" required>

                                </div>

                            </div>




                            <!-- ENTRADA PARA BOLETIN -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="number" class="form-control input-lg" name="nuevoBoletin" min="1" placeholder="Boletin" required>

                                </div>

                            </div>


                            <!-- ENTRADA PARA VALOR CREDITO -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="number" class="form-control input-lg" name="nuevoVcredito" min="1" placeholder="Valor Credito" required>

                                </div>

                            </div>


                            <!-- ENTRADA PARA VALOR CUOTA -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="number" class="form-control input-lg" name="nuevaCuota" min="1" placeholder="Valor Cuota" required>

                                </div>

                            </div>


                        </div>

                    </div>

                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary">Guardar Crédito</button>

                    </div>

                    <?php

                    $crearCredito = new ControladorCreditos();
                    $crearCredito -> ctrCrearCredito();

                    ?>

                </form>

            </div>

        </div>

    </div>

    <!--=====================================
    MODAL EDITAR SEPULTURA
    ======================================-->

    <div id="modalEditarCcosto" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <div class="modal-content">

                <form role="form" method="post">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                    <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Editar Centro Costo</h4>

                    </div>

                    <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

                    <div class="modal-body">

                        <div class="box-body">

                            <!-- ENTRADA PARA EL NOMBRE -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <input type="text" class="form-control input-lg" name="editarCcosto" id="editarCcosto" required>

                                    <input type="hidden"  name="idCcosto" id="idCcosto" required>

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

                    $editarCcosto = new ControladorCcosto();
                    $editarCcosto -> ctrEditarCcosto();

                    ?>

                </form>

            </div>

        </div>

    </div>

<?php

$borrarSepultura = new ControladorSepultura();
$borrarSepultura -> ctrBorrarSepultura();

?>