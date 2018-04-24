
<style>
    #mdialTamanio{
      width: 50% !important;
    }
  </style>


<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Sepulturas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Sepulturas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
    
    <?php
     
        if($_SESSION["perfil"] == "Administrador")
        {
    
          echo '<div class="box-header with-border">

             <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaSepultura">
          
             Agregar Sepulturas

             </button>

            </div>';
      }
  ?>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaSep" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Número Nicho</th>
           <th>Cuartel-Cuerpo</th>
           <th>Estado</th>
           <th>Capacidad</th>
           <th>Cementerio</th>
           <th>Corrida</th>
           <th>Piso</th>
           <th>Opciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $sepulturas = ControladorSepultura::ctrMostrarSepultura($item, $valor);
          //    print_r($sepulturas);
          foreach ($sepulturas as $key => $value) {

              //AGREGAR CUARTEL CUERPO
              $id_cc = $value["id_cuartel_cuerpo"];
              $item = "id_cuartel_cuerpo";
              $x = ControladorCcuerpo::ctrMostrarCcuerpo($item,$id_cc);

              //AGREGAR ESTADO
              $id_e = $value["estado"];
              $item = "id_estado";
              $y = ControladorEstado::ctrMostrarEstado($item,$id_e);
              //print_r($y);

              //AGREGAR CEMENTERIO
              $id_c = $value["id_cementerio"];
              $item = "id_cementerio";
              $z = ControladorCementerio::ctrMostrarCementerio($item,$id_c);
              //print_r($y);

            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["numero_sepultura"].'</td>
                    <td>'.$x["nombre"].'</td>
                    <td>'.$y["estado"].'</td>
                    <td>'.$value["capacidad"].'</td>
                    <td>'.$z["cementerio"].'</td>
                    <td>'.$value["corrida"].'</td>
                    <td>'.$value["piso"].'</td>
                    <td>'.$value["id_sepultura"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarSepultura" idSepultura="'.$value["id_sepultura"].'" data-toggle="modal" data-target="#modalEditarSepultura"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarSepultura" idSepultura="'.$value["id_sepultura"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR SEPULTURA
======================================-->

<div id="modalAgregaSepultura" class="modal fade" role="dialog">
  
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

            
            <!-- ENTRADA PARA Nº SEPULTURA -->
            

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNumero" placeholder="Nº Sepultura" required>

              </div>

            </div>


      <!-- ENTRADA PARA ID CUARTEL CUERPO -->


              <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" name="nuevoCcuerpo" required>

                    <option value="">Seleccionar Cuartel Cuerpo</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $productos = ControladorCcuerpo::ctrMostrarCcuerpo($item, $valor);

                       foreach ($productos as $key => $value) {

                         echo '<option value="'.$value["id_cuartel_cuerpo"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                  
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

<div id="modalEditarSepultura" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Sepultura</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA Nº SEPULTURA -->


            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg editarNumero" id="editarNumero" name="editarNumero" placeholder="Nº Sepultura" required>
                    <input type="hidden" name="idSepultura" class="idSepultura" id="idSepultura">
                </div>

            </div>

              <!-- ENTRADA PARA ID CUARTEL CUERPO -->


              <div class="form-group">

                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control editarSepultura" id="editarSepultura" name="editarSepultura" required>

                          <option value="">Seleccionar Cuartel Cuerpo</option>

                          <?php

                          $item = null;
                          $valor = null;

                          $productos = ControladorCcuerpo::ctrMostrarCcuerpo($item, $valor);

                          foreach ($productos as $key => $value) {

                              echo '<option value="'.$value["id_cuartel_cuerpo"].'">'.$value["nombre"].'</option>';

                          }

                          ?>

                      </select>

                  </div>

              </div>


              <!-- ENTRADA PARA ID ESTADO -->


              <div class="form-group">

                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control editarEstado" id="editarEstado" name="editarEstado" required>

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

                      <input type="number" class="form-control input-lg editarCapacidad" id="editarCapacidad" min="1" name="editarCapacidad" placeholder="Capacidad" required>

                  </div>

              </div>



              <!-- ENTRADA PARA ID CEMENTERIO -->

              <div class="form-group">

                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control input-lg editarCementerio" id="editarCementerio" name="editarCementerio">

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

                      <input type="number" class="form-control input-lg editarCorrida" id="editarCorrida" name="editarCorrida" min="1" placeholder="Corrida" required>

                  </div>

              </div>




              <div class="form-group">
                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-th"></i></span>

                      <input type="number" class="form-control input-lg editarPiso" id="editarPiso" name="editarPiso" min="1" placeholder="Piso" required>

                  </div>
              </div>




              <div class="form-group">
                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-th"></i></span>

                      <input type="number" class="form-control input-lg editarOden" id="editarOrden" min="1" name="editarOrden" placeholder="Orden" required>

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

          $editarSepultura = new ControladorSepultura();
          $editarSepultura -> ctrEditarSepultura();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarSepultura = new ControladorSepultura();
  $borrarSepultura -> ctrBorrarSepultura();

?>


