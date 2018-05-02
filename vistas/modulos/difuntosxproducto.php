    <style>
        #mdialTamanio{
            width: 30% !important;
        }
    </style>


    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Difuntos por Sepultura

            </h1>

            <ol class="breadcrumb">

                <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

                <li class="active">Difuntos por Sepultura</li>

            </ol>

            <?php
            if (isset($_GET["idSepultura"])){

                $item="id_sepultura";
                $valor=$_GET["idSepultura"];

                $prod=ControladorDifuntosxProducto::ctrMostrarDatosSepultura($item,$valor);

                $estado=$prod["nombre_estado"];
            }
            ?>

            <div class="row">
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-red">
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">PRODUCTO: <b><?php echo $prod["nombretp"]; ?></b></h3>
                            <h3 class="widget-user-username">CUARTEL-CUERPO: <b><?php echo $prod["nombrecc"]; ?></b></h3>
                            <h3 class="widget-user-username">N° SEPULTURA: <b><?php echo $prod["numero"]; ?></b></h3>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
        </section>


        <section class="content">

            <div class="box">

                <div class="box-body">

                    <table class="table table-bordered table-striped dt-responsive tabladxp" width="100%">

                        <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Fecha Sepultación</th>
                            <th>Fecha Vencimiento</th>
                            <th>Nombre</th>
                            <th>A. Paterno</th>
                            <th>A. Materno</th>
                            <th>Edad</th>
                            <th>Causa Muerte</th>
                            <th>Inscripción</th>
                            <th>Circunscripción</th>
                            <th>Boletin</th>
                            <th>Opciones</th>


                        </tr>

                        </thead>

                        <tbody>
                        <?php

                        $item = "id_sepultura";
                        $valor = $_GET["idSepultura"];

                        $difuntos = ControladorDifuntosxProducto::ctrMostrarDifuntosxproducto($item, $valor);

                        foreach ($difuntos as $key => $value) {

                            echo ' <tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["fecha_sepultacion"].'</td>
                                    <td>'.$estado.'</td>
                                    <td>'.strtoupper($value["nombre"]).'</td>
                                    <td>'.strtoupper($value["apellido_paterno"]).'</td>
                                    <td>'.strtoupper($value["apellido_materno"]).'</td>
                                    <td>'.$value["edad"].'</td>
                                    <td>'.strtoupper($value["causa_muerte"]).'</td>
                                    <td>'.$value["inscripcion"].'</td>
                                    <td>'.$value["circunscripcion"].'</td>
                                    <td>'.$value["id_boletin"].'</td>
                                    <td>

                                        <div class="btn-group">
                          
                                            <button class="btn btn-success btnTraslado" idDifuntox="'.$value["id_difunto"].'" data-toggle="modal" data-target="#modalTraslado" title="Traslado"><i class="fa fa-sign-in"></i></button>

                                            <button class="btn btn-warning btnReduccion" idDifunto="'.$value["id_difunto"].'" data-toggle="modal" data-target="#modalReduccion" title="Reduccion"><i class="fa fa-hand-lizard-o"></i></button>
                                            
                                            <button class="btn btn-danger btnRetiro" idDifunto="'.$value["id_difunto"].'" data-toggle="modal" title="Retiro" data-target="#modalRetiro"><i class="fa fa-sign-out"></i></button>';

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

    <div id="modalTraslado" class="modal fade" role="dialog">

        <div class="modal-dialog" >

            <div class="modal-content">

                <form role="form" method="post">

                    <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                    <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Traslado de Difunto</h4>

                    </div>

                    <!--=====================================
                    CUERPO DEL MODAL
                    ======================================-->

                    <div class="modal-body">

                        <div class="box-body">


                           <!-- ENTRADA PARA TIPO DE SEPULTURA -->


                      <div class="form-group">

                          <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                              <input type="text" name="idDifuntox" id="idDifuntox">

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



                  <!-- ENTRADA PARA CUARTEL CUERPO -->



                      <div class="form-group">

                          <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                              <select class="form-control" name="idCuartelCuerpo" id="idCuartelCuerpo" autocomplete="On" required>

                                  <option value="">Cuartel Cuerpo</option>

                              </select>

                          </div>

                      </div>



                  <!-- ENTRADA PARA NÚMERO DE SEPULTURA -->



                      <div class="form-group">

                          <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                              <select class="form-control" name="idNumSepultura" id="idNumSepultura" autocomplete="On" required>

                                  <option value="">Número de sepultura</option>

                              </select>

                          </div>

                      </div>



                            <!-- ENTRADA PARA FECHA TRASLADO -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                    <input type="text" class="form-control input-lg" name="nuevaFtraslado" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Traslado" autocomplete="family-name" required>


                                </div>

                            </div>




                            <!-- ENTRADA PARA BOLETIN -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>

                                    <input type="number" class="form-control input-lg" name="nuevoBoletin" min="1" placeholder="Boletin" required>

                                </div>

                            </div>


                            <!-- ENTRADA PARA INDICAR SI ES REDUCIDO -->


                            <div class="form-group">

                                <div class="input-group">


                                    <input type="checkbox" name="nuevaReduccion"> Indicar si es con reducción

                                </div>

                            </div>



                        </div>

                    </div>

                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary">Trasladar</button>

                    </div>

                    <?php

                    $crearTraslado = new ControladorTraslado();
                    $crearTraslado -> ctrCrearTraslado();

                    ?>

                </form>

            </div>

        </div>

    </div>

