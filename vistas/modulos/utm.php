<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar U.T.M.
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar U.T.M.</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
    
    <?php
     
        if($_SESSION["perfil"] == "Administrador")
        {
    
          echo '<div class="box-header with-border">

             <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUtm">
          
             Agregar U.T.M.

             </button>

            </div>';
      }
  ?>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           <th style="width:10px">#</th>
           <th>Año</th>
           <th>Mes</th>
           <th>Valor</th>
           <th>Opciones</th>
         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $vutm = ControladorUtm::ctrMostrarUtm($item, $valor);

          foreach ($vutm as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>
                    <td>'.$value["anno"].'</td>';

                    $item="id_mes";
                    $valor=$value["mes"];

                    $vmeses=ControladorUtm::ctrMostrarMeses($item,$valor);

              echo '<td>'.$vmeses["mes"].'</td>

                    <td>'.$value["valor"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarUtm" idUtm="'.$value["idutm"].'" data-toggle="modal" data-target="#modalEditarUtm"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarUtm" idUtm="'.$value["idutm"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR UTM
======================================-->

<div id="modalAgregarUtm" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar U.T.M.</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL AÑO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <select class="form-control" name="nuevoAnno" required>
                  
                  <option value="">Selecionar Año</option>

                  <?php
                  

                      for ($i = 2018; $i <= date("Y"); $i++) {
                          echo '<option value="'.$i.'">'.$i.'</option>';
                      }

                    ?>


                </select>

              </div>

            </div>

          <!-- ENTRADA PARA EL MES -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <select class="form-control" name="nuevoMes" required>
                  
                  <option value="">Selecionar Mes</option>

                  <?php

                      $item = null;
                      $valor = null;

                      $productos = ControladorUtm::ctrMostrarMeses($item, $valor);

                       foreach ($productos as $key => $value) {

                         echo '<option value="'.$value["id_mes"].'">'.$value["mes"].'</option>';

                       }

                    ?>


                </select>

              </div>

            </div>


        <!-- ENTRADA PARA EL VALOR -->

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <div class="form-group">
                    
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                        <input type="number" class="form-control input-lg" name="nuevoValor" placeholder="Ingresar Valor" required>

                      </div>

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

          <button type="submit" class="btn btn-primary">Guardar U.T.M</button>

        </div>

        <?php

          $crearUtm = new ControladorUtm();
          $crearUtm -> ctrCrearUtm();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR UTM
======================================-->

<div id="modalEditarUtm" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar U.T.M.</h4>

        </div>

         <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL AÑO -->
            
            <div class="form-group">
              
              <div class="input-group">

                <input type="hidden" name="idUtm" id="idUtm">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <select class="form-control" name="editarAnno" id="editarAnno" required>
                  
                  <option value="">Selecionar Año</option>

                  <?php
                  

                      for ($i = 2018; $i <= date("Y"); $i++) {
                          echo '<option value="'.$i.'">'.$i.'</option>';
                      }

                    ?>


                </select>

              </div>

            </div>

          <!-- ENTRADA PARA EL MES -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <select class="form-control" name="editarMes" id="editarMes" required>
                  
                  <option value="">Selecionar Mes</option>

                  <?php

                      $item = null;
                      $valor = null;

                      $productos = ControladorUtm::ctrMostrarMeses($item, $valor);

                       foreach ($productos as $key => $value) {

                         echo '<option value="'.$value["id_mes"].'">'.$value["mes"].'</option>';

                       }

                    ?>


                </select>

              </div>

            </div>


        <!-- ENTRADA PARA EL VALOR -->

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <div class="form-group">
                    
                      <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                        <input type="number" class="form-control input-lg" name="editarValor" id="editarValor" required>

                      </div>

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

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarUtm = new ControladorUtm();
          $editarUtm -> ctrEditarUtm();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUtem = new ControladorUtm();
  $borrarUtem -> ctrBorrarUtm();

?>


