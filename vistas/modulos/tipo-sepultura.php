<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Tipos Sepultura
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Tipos Sepultura</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
    
    <?php
     
        if($_SESSION["perfil"] == "Administrador")
        {
    
          echo '<div class="box-header with-border">

             <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTsepultura">
          
             Agregar tipo sepultura

             </button>

            </div>';
      }
  ?>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Tipo Sepultura</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $tsepultura = ControladorTsepultura::ctrMostrarTsepultura($item, $valor);

          foreach ($tsepultura as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["nombre"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarTsepultura" idTsepultura="'.$value["id_tipo_sepultura"].'" data-toggle="modal" data-target="#modalEditarTsepultura"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarTsepultura" idTsepultura="'.$value["id_tipo_sepultura"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR TIPO SEPULTURA
======================================-->

<div id="modalAgregarTsepultura" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Tipo Sepultura</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoTsepultura" placeholder="Ingresar tipo sepultura" required>

              </div>

            </div>

            <!-- ENTRADA PARA DEFINIR SI ES PRODUCTO FAMILIAR O NO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <select class="form-control" name="nuevoPfamiliar" required>
                  
                  <option value="">Selecionar si es Producto Familiar</option>
                  
                  <option value="1">Si</option>
                 
                  <option value="2">No</option>
                
                </select>

              </div>

            </div>


            <!-- ENTRADA PARA CATEGORIZAR POR C.COSTO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                 <select class="form-control" name="nuevoIccosto" required>
                  
                  <option value="">Selecionar Item C.Costo</option>

                  <?php

                      $item = null;
                      $valor = null;

                      $items = ControladorCcosto::ctrMostrarCcosto($item, $valor);

                       foreach ($items as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';

                       }

                    ?>


                </select>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Tipo Sepultura</button>

        </div>

        <?php

          $crearTsepultura = new ControladorTsepultura();
          $crearTsepultura -> ctrCrearTsepultura();

        ?>

      </form>

    </div>

  </div>

</div>



<!--=====================================
MODAL EDITAR TIPO SEPULTURA
======================================-->

<div id="modalEditarTsepultura" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Tipo Sepultura</h4>

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

                <input type="text" class="form-control input-lg" name="editarTsepultura" id="editarTsepultura" placeholder="Ingresar tipo sepultura" required>
                <input type="hidden" id="idTsepultura" name="idTsepultura">

              </div>

            </div>

            <!-- ENTRADA PARA DEFINIR SI ES PRODUCTO FAMILIAR O NO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <select class="form-control" name="editarPfamiliar" id="editarPfamiliar" required>
                  
                  <option value="">Selecionar si es Producto Familiar</option>
                  
                  <option value="1">Si</option>
                 
                  <option value="2">No</option>
                
                </select>

              </div>

            </div>


            <!-- ENTRADA PARA CATEGORIZAR POR C.COSTO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                 <select class="form-control"  name="editarIccosto" id="editarIccosto" required>
                  
                  <option value="">Selecionar Item C.Costo</option>

                  <?php

                      $item = null;
                      $valor = null;

                      $items = ControladorCcosto::ctrMostrarCcosto($item, $valor);

                       foreach ($items as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';

                       }

                    ?>


                </select>
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

          $editarTsepultura = new ControladorTsepultura();
          $editarTsepultura -> ctrEditarTsepultura();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarTsepultura = new ControladorTsepultura();
  $borrarTsepultura -> ctrBorrarTsepultura();

?>


