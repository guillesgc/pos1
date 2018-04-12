
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
                        <th>Calor Cuota</th>
                        <th>Monto Pagado</th>
                        <th>Saldo</th>
                        <th>Boletin</th>
                        <th>Opciones</th>


                    </tr>

                    </thead>

                    <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>


                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR SEPULTURA
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



                        <!-- ENTRADA PARA TIPO DE SEPULTURA -->

                        <div class="col-xs-12">

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                    <select class="form-control" name="idTipoSepultura" id="idTipoSepultura"  required>

                                        <option value="">Tipo Sepultura</option>

                                        <?php

                                        $item = null;
                                        $valor = null;

                                        $tipo_sepulturas = ControladorTsepultura::ctrMostrarTsepultura($item,$valor);

                                        foreach ($tipo_sepulturas as $key => $value) {

                                            echo '<option value="'.$value["id_tipo_sepultura"].'">'.$value["nombre"].'</option>';

                                        }

                                        ?>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- ENTRADA PARA CUARTEL CUERPO -->

                        <div class="col-xs-12">

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                    <select class="form-control" name="idCuartelCuerpo" id="idCuartelCuerpo" autocomplete="On" required>

                                        <option value="">Cuartel Cuerpo</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- ENTRADA PARA Nº SEPULTURA -->


                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoNumero" placeholder="Nº Sepultura" required>

                            </div>

                        </div>


                        <!-- ENTRADA PARA ID ESTADO -->


                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control" name="nuevoEstado" required>

                                    <option value="">Seleccionar Estado</option>

                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $estado = ControladorSepultura::ctrMostrarEstado($item, $valor);

                                    foreach ($estado as $key => $value) {

                                        echo '<option value="'.$value["id_estado"].'">'.$value["estado"].'</option>';

                                    }

                                    ?>

                                </select>

                            </div>

                        </div>


                        <!-- ENTRADA PARA CAPACIDAD -->


                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="number" class="form-control input-lg" min="1" name="nuevaCapacidad" placeholder="Capacidad" required>

                            </div>

                        </div>



                        <!-- ENTRADA PARA ID CEMENTERIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoCementerio">

                                    <option value="">Selecionar Cementerio</option>

                                    <option value="1">Cementerio 1</option>

                                    <option value="2">Cementerio 2</option>

                                    <option value="3">Cementerio 3</option>

                                </select>

                            </div>

                        </div>



                        <!-- ENTRADA PARA CORRIDA -->


                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="number" class="form-control input-lg" name="nuevaCorrida" min="1" placeholder="Corrida" required>

                            </div>

                        </div>




                        <div class="form-group">
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="number" class="form-control input-lg" name="nuevoPiso" min="1" placeholder="Piso" required>

                            </div>
                        </div>




                        <div class="form-group">
                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="number" class="form-control input-lg" min="1" name="nuevoOrden" placeholder="Orden" required>

                            </div>

                        </div>


                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar Sepultura</button>

                </div>

                <?php

                $crearSepultura = new ControladorSepultura();
                $crearSepultura -> ctrCrearSepultura();

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


