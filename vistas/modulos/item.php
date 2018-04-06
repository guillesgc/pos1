<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Item x Centro Costo
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Item Centro Costo</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
    
    <?php
     
        if($_SESSION["perfil"] == "Administrador")
        {
    
          echo '<div class="box-header with-border">

             <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarItem">
          
             Agregar Item Centro Costo

             </button>

            </div>';
      }
  ?>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           <th style="width:10px">#</th>
           <th>Item</th>
           <th>Centro Costo</th>
           <th>Valor (UTM)</th>
           <th>Opciones</th>
         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $itemcc = ControladorItem::ctrMostrarItem($item, $valor);

          foreach ($itemcc as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["nombre"].'</td>';

                    $item="id";
                    $valor=$value["id_centro_costo"];


                    $cc=ControladorCcosto::ctrMostrarCcosto($item,$valor);

                    echo '<td>'.$cc["categoria"].'</td>
                    <td>'.$value["precio"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarItem" idItem="'.$value["id_item"].'" data-toggle="modal" data-target="#modalEditarItem"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarItem" idItem="'.$value["id_item"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR ITEM
======================================-->

<div id="modalAgregarItem" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Item</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoItem" placeholder="Ingresar Item" required>

              </div>

            </div>

          <!-- ENTRADA PARA CENTRO COSTO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control" name="nuevoCcosto" required>
                  
                  <option value="">Selecionar Centro Costo</option>

                  <?php

                      $item = null;
                      $valor = null;

                      $ccosto = ControladorCcosto::ctrMostrarCcosto($item, $valor);

                       foreach ($ccosto as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';

                       }

                    ?>


                </select>

              </div>

            </div>


        <!-- ENTRADA PARA PRECIO -->

 
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoPrecio" placeholder="Ingresar Precio" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Item</button>

        </div>

        <?php

          $crearItem = new ControladorItem();
          $crearItem -> ctrCrearItem();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ITEM
======================================-->

<div id="modalEditarItem" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Item</h4>

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

                <input type="text" class="form-control input-lg" name="editarItem" id="editarItem" required>
                <input type="hidden" name="idItem" id="idItem">

              </div>

            </div>

          <!-- ENTRADA PARA CENTRO COSTO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control" name="editarCcosto" id="editarCcosto" required>
                  
                  <option value="">Selecionar Centro Costo</option>

                  <?php

                      $item = null;
                      $valor = null;

                      $ccosto = ControladorCcosto::ctrMostrarCcosto($item, $valor);

                       foreach ($ccosto as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';

                       }

                    ?>


                </select>

              </div>

            </div>


        <!-- ENTRADA PARA PRECIO -->

 
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarPrecio" id="editarPrecio" required>

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

          $editarItem = new ControladorItem();
          $editarItem -> ctrEditarItem();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarItem = new ControladorItem();
  $borrarItem -> ctrBorrarItem();

?>


