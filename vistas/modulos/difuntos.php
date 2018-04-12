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
      
      Administrar Difuntos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Difuntos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDifunto">
          
          Agregar Difunto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombres</th>
           <th>Apellido Paterno</th>
           <th>Apellido Materno</th>
           <th>Rut</th>
           <th>Tipo de Sepultura</th>
           <th>Cuartel-Cuerpo</th>
           <th>Número de Sepultura</th>
           <th>Fecha Sepultación</th> 
           <th>Inscripción</th>
           <th>Circunscripción</th>
           <th>Boletín</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $difuntos = ControladorDifuntos::ctrMostrarDifuntosYNumSepultura($item, $valor);
          //print_r($difuntos );
          foreach ($difuntos as $key => $value) {
              //AGREGAR TIPO SEPULTURA
              $id_sep = $value["id_sepultura"];
              $item = "id_tipo_sepultura";
              $x = ControladorTsepultura::ctrMostrarTsepultura($item,$id_sep);

              //AGREGAR CUARTEL CUERPO
              $id_cc = $value["id_cuartel_cuerpo"];
              //print_r($id_cc);
              $item = "id_cuartel_cuerpo";
              $y = ControladorCcuerpo::ctrMostrarCcuerpo($item,$id_cc);
              //print_r($value["tipo_sep"]);
              //print_r($x);

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td class=text-uppercase>'.$value["nombre"].'</td>

                    <td class=text-uppercase>'.$value["apellido_paterno"].'</td>

                    <td class=text-uppercase>'.$value["apellido_materno"].'</td>

                    <td>'.$value["rut"].'</td>
                    
                    <td>'.$x["nombre"].'</td>
                    
                    <td>'.$y["nombre"].'</td>
                    
                    <td>'.$value["numero_sepultura"].'</td>

                    <td>'.$value["fecha_sepultacion"].'</td>

                    <td>'.$value["inscripcion"].'</td>

                    <td class=text-uppercase>'.$value["circunscripcion"].'</td>

                    <td>'.$value["id_boletin"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarDifunto" data-toggle="modal" data-target="#modalEditarDifunto" idDifunto="'.$value["id_difunto"].'"><i class="fa fa-pencil"></i></button>';
                      

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarDifunto" idDifunto="'.$value["id_difunto"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR DIFUNTO
======================================-->

<div id="modalAgregarDifunto" class="modal fade" role="dialog">
  
  <div class="modal-dialog" id="mdialTamanio">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Difunto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
           <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDifunto" placeholder="Nombre Difunto" autocomplete="given_name" required>

              </div>

            </div>

          </div>

            <!-- ENTRADA PARA EL APELLIDO PATERNO -->
            
            <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoApaterno" placeholder="Apellido Paterno" autocomplete="family-name" required>

              </div>

            </div>

          </div>


             <!-- ENTRADA PARA EL APELLIDO MATERNO -->
            
            <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span> 

                <input type="text"  class="form-control input-lg" name="nuevoAmaterno" placeholder="Apellido Materno" autocomplete="additional-name" required>

              </div>

            </div>

          </div>

            <!-- ENTRADA FECHA DEFUNCION -->
            
            <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFdefuncion" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Defunción" autocomplete="family-name" required>

              </div>

            </div>

          </div>

          <!-- ENTRADA PARA CAUSA MUERTE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaCmuerte" placeholder="Causa Muerte" autocomplete="On" required>

              </div>

            </div>

          <!-- ENTRADA PARA TIPO DE SEPULTURA -->

              <div class="col-lg-4 col-xs-12">

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

              <!-- ENTRADA PARA CAURTEL CUERPO -->

              <div class="col-lg-4 col-xs-12">

                  <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                          <select class="form-control" name="idCuartelCuerpo" id="idCuartelCuerpo" autocomplete="On" required>

                              <option value="">Cuartel Cuerpo</option>

                          </select>

                      </div>

                  </div>

              </div>

              <!-- ENTRADA PARA NÚMERO DE SEPULTURA -->

              <div class="col-lg-4 col-xs-12">

                  <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                          <select class="form-control" name="idNumSepultura" id="idNumSepultura" autocomplete="On" required>

                              <option value="">Número de sepultura</option>

                          </select>

                      </div>

                  </div>

              </div>



            <!-- ENTRADA FECHA SEPULTACION -->
            
          <div class="col-lg-4 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaFsepultacion" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Sepultación" autocomplete="On" required>

              </div>

            </div>

          </div>



            <!-- ENTRADA PARA LA EDAD -->
            
            <div class="col-lg-4 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-blind"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevaEdad" placeholder="Edad" autocomplete="On" required>

              </div>

            </div>

          </div>

            

            <!-- ENTRADA PARA EL SEXO -->
            
            <div class="col-lg-4 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-male"></i></span> 

                <select class="form-control input-lg" name="nuevoSexo" autocomplete="On">

                  <option value="">Selecionar Sexo</option>

                  <option value="1">Masculino</option>

                  <option value="2">Femenino</option>

                </select>

              </div>

            </div>

          </div>


             <!-- ENTRADA PARA INSCRIPCION -->
            
            <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span> 

                <input type="number" min="1" class="form-control input-lg" name="nuevaInscripcion" placeholder="Inscripción"  required>

              </div>

            </div>

          </div>



             <!-- ENTRADA PARA CIRCUNSCRIPCION -->
            
            <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text"  class="form-control input-lg" name="nuevaCircunscripcion" placeholder="Circunscripción" autocomplete="On" required>

              </div>

            </div>

          </div>



             <!-- ENTRADA PARA BOLETIN -->
            
            <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span> 

                <input type="number" min="1" class="form-control input-lg" name="nuevoBoletin" placeholder="Boletin" autocomplete="On" required>

              </div>

            </div>

          </div>


        <!-- ENTRADA PARA CLIENTE
           
           <div class="col-lg-6 col-xs-12">

           <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" name="idCliente" autocomplete="On" required>

                    <option value="">Seleccionar cliente</option>

                    <?php

                      //$item = null;
                      //$valor = null;

                      //$cliente = ControladorClientes::ctrMostrarClientes($item, $valor);

                       //foreach ($cliente as $key => $value) {

                            //echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       //}

                    ?>

                    </select>
                  
                  </div>
                
                </div>

              </div>


             -->
               <!-- ENTRADA PARA RUT -->
           
           <div class="col-lg-6 col-xs-12">

              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoRut" placeholder="Rut" autocomplete="On" required>

                </div>

              </div>

          </div>




  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Difunto</button>

        </div>

      </form>

       <?php

        $crearDifunto = new ControladorDifuntos();
        $crearDifunto -> ctrCrearDifunto();

      ?>

    </div>

  </div>

</div>



<!--=====================================
MODAL EDITAR DIFUNTO
======================================-->

<div id="modalEditarDifunto" class="modal fade" role="dialog">
  
  <div class="modal-dialog" id="mdialTamanio">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Difunto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
           <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDifunto" id="editarDifunto" placeholder="Nombre Difunto" required>
                <input type="hidden" name="idDifunto" id="idDifunto">

              </div>

            </div>

          </div>

            <!-- ENTRADA PARA EL APELLIDO PATERNO -->
            
            <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span> 

                <input type="text" class="form-control input-lg" name="editarApaterno" id="editarApaterno" placeholder="Apellido Paterno" required>

              </div>

            </div>

          </div>


             <!-- ENTRADA PARA EL APELLIDO MATERNO -->
            
            <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span> 

                <input type="text"  class="form-control input-lg" name="editarAmaterno"  id="editarAmaterno"placeholder="Apellido Materno" required>

              </div>

            </div>

          </div>

            <!-- ENTRADA FECHA DEFUNCION -->
            
            <div class="col-lg-6 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFdefuncion" id="editarFdefuncion" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Defunción" required>

              </div>

            </div>

          </div>

          <!-- ENTRADA PARA CAUSA MUERTE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span> 

                <input type="text" class="form-control input-lg"  name="editarCmuerte" id="editarCmuerte" placeholder="Causa Muerte" required>

              </div>

            </div>

              <!-- ENTRADA PARA TIPO SEPULTURA -->

              <div class="col-lg-4 col-xs-12">

                  <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                          <select class="form-control input-lg" name="editarIdTipoSepultura" id="editarIdTipoSepultura"  required>

                              <option value="">Seleccionar Sepultura</option>

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


              <!-- ENTRADA PARA CAURTEL-CUERPO -->

              <div class="col-lg-4 col-xs-12">

                  <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                          <select class="form-control input-lg" name="editarIdCuartelCuerpo" id="editarIdCuartelCuerpo"  required>

                              <option value="">Cuartel Cuerpo</option>

                          </select>

                      </div>

                  </div>

              </div>


              <!-- ENTRADA PARA NÚMERO DE SEPULTURA -->

              <div class="col-lg-4 col-xs-12">

                  <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                          <select class="form-control input-lg" name="editarIdNumSepultura" id="editarIdNumSepultura"  required>

                              <option value="">Número de sepultura</option>

                          </select>

                      </div>

                  </div>

              </div>


            <!-- ENTRADA FECHA SEPULTACION -->
            
          <div class="col-lg-4 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFsepultacion" id="editarFsepultacion" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Sepultación" required>

              </div>

            </div>

          </div>



            <!-- ENTRADA PARA LA EDAD -->
            
            <div class="col-lg-4 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-blind"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editarEdad" id="editarEdad" placeholder="Edad" required>

              </div>

            </div>

          </div>

            

            <!-- ENTRADA PARA EL SEXO -->
            
            <div class="col-lg-4 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-male"></i></span> 

                <select class="form-control input-lg" name="editarSexo" id="editarSexo">
                  
                  <option value="">Selecionar Sexo</option>

                  <option value="1">Masculino</option>

                  <option value="2">Femenino</option>

                </select>

              </div>

            </div>

          </div>


             <!-- ENTRADA PARA INSCRIPCION -->
            
            <div class="col-lg-4 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span> 

                <input type="number" min="1" class="form-control input-lg" name="editarInscripcion" id="editarInscripcion" placeholder="Inscripción" required>

              </div>

            </div>

          </div>



             <!-- ENTRADA PARA CIRCUNSCRIPCION -->
          <div class="col-lg-4 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text"  class="form-control input-lg" name="editarCircunscripcion" id="editarCircunscripcion" placeholder="Circunscripción" required>

              </div>

            </div>

          </div>



             <!-- ENTRADA PARA BOLETIN 
            
            <div class="col-lg-4 col-xs-12">

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span> 

                <input type="number" min="1" class="form-control input-lg" name="editarBoletin" id="editarBoletin" placeholder="Boletin" required>

              </div>

            </div>

          </div>-->


        <!-- ENTRADA PARA CLIENTE
           
           <div class="col-lg-6 col-xs-12">

           <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" name="idCliente" id="idCliente" required>

                    <option value="">Seleccionar cliente</option>

                    //<?php

                      //$item = null;
                     // $valor = null;

                      //$cliente = ControladorClientes::ctrMostrarClientes($item, $valor);

                       //foreach ($cliente as $key => $value) {

                         //echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       //}

                    //?>

                    </select>
                  
                  </div>
                
                </div>

              </div>
-->


               <!-- ENTRADA PARA RUT 
           
           <div class="col-lg-6 col-xs-12">

              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span> 

                  <input type="text" class="form-control input-lg" name="editarRut" id="editarRut" placeholder="Rut" required>

                </div>

              </div>

          </div>
-->



  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

      </form>

       <?php

        $editarDifunto = new ControladorDifuntos();
        $editarDifunto -> ctrEditarDifunto();

      ?>

    </div>

  </div>

</div>

<?php

  $borrarDifunto = new ControladorDifuntos();
  $borrarDifunto -> ctrEliminarDifunto();

?>