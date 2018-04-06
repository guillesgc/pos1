<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Cuartel-Cuerpos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Cuartel-Cuerpos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
    
    <?php
     
        if($_SESSION["perfil"] == "Administrador")
        {
    
          echo '<div class="box-header with-border">

             <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCcuerpo">
          
             Agregar Cuartel-Cuerpo

             </button>

            </div>';
      }
  ?>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           <th style="width:10px">#</th>
           <th>Cuartel-Cuerpo</th>
           <th>Tipo Sepultura</th>
           <th>Cementerio</th>
           <th>Opciones</th>
         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $ccuerpo = ControladorCcuerpo::ctrMostrarCcuerpo($item, $valor);

          foreach ($ccuerpo as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["nombre"].'</td>';

                    $item="id_tipo_sepultura";
                    $valor=$value["tipo_sep"];


                    $tipo_sep=ControladorCcuerpo::ctrMostrarTproducto($item,$valor);

                    echo '<td>'.$tipo_sep["nombre"].'</td>';

                    $item="id_cementerio";
                    $valor=$value["id_cementerio"];


                    $cementerio=ControladorCcuerpo::ctrMostrarCementerio($item,$valor);

                    echo '<td>'.$cementerio["cementerio"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCcuerpo" idCcuerpo="'.$value["id_cuartel_cuerpo"].'" data-toggle="modal" data-target="#modalEditarCcuerpo"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarCcuerpo" idCcuerpo="'.$value["id_cuartel_cuerpo"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR CUARTEL-CUERPO
======================================-->

<div id="modalAgregarCcuerpo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Cuartel - Cuerpo</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoCcuerpo" placeholder="Ingresar Cuartel-Cuerpo" required>

              </div>

            </div>

          <!-- ENTRADA PARA ID CEMENTERIO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control" name="nuevoCementerio" required>
                  
                  <option value="">Selecionar Cementerio</option>

                  <?php

                      $item = null;
                      $valor = null;

                      $productos = ControladorCcuerpo::ctrMostrarCementerio($item, $valor);

                       foreach ($productos as $key => $value) {

                         echo '<option value="'.$value["id_cementerio"].'">'.$value["cementerio"].'</option>';

                       }

                    ?>


                </select>

              </div>

            </div>


        <!-- ENTRADA PARA ID TIPO PRODUCTO -->

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" name="nuevoTproducto" required>

                    <option value="">Seleccionar Tipo de Producto</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $productos = ControladorCcuerpo::ctrMostrarTproducto($item, $valor);

                       foreach ($productos as $key => $value) {

                         echo '<option value="'.$value["id_tipo_sepultura"].'">'.$value["nombre"].'</option>';

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

          <button type="submit" class="btn btn-primary">Guardar cuartel-cuerpo</button>

        </div>

        <?php

          $crearCcuerpo = new ControladorCcuerpo();
          $crearCcuerpo -> ctrCrearCcuerpo();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CUARTEL-CUERPO
======================================-->

<div id="modalEditarCcuerpo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Cuartel Cuerpo</h4>

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

                <input type="text" class="form-control input-lg" name="editarCcuerpo" id="editarCcuerpo" required>

                 <input type="hidden" name="idCcuerpo" id="idCcuerpo">

              </div>

            </div>

            <!-- ENTRADA PARA ID CEMENTERIO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarCementerio">
                  
                  <option value="">Selecionar Cementerio</option>

                  <option value="1">Cementerio 1</option>

                  <option value="2">Cementerio 2</option>

                  <option value="3">Cementerio 3</option>

                </select>

              </div>

            </div>


        <!-- ENTRADA PARA ID TIPO PRODUCTO -->

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" name="editarTproducto" required>

                    <option value="">Seleccionar Tipo de Producto</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $productos = ControladorCcuerpo::ctrMostrarTproducto($item, $valor);

                       foreach ($productos as $key => $value) {

                         echo '<option value="'.$value["id_tipo_sepultura"].'">'.$value["nombre"].'</option>';

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

          $editarCcosto = new ControladorCcuerpo();
          $editarCcosto -> ctrEditarCcuerpo();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCcuerpo = new ControladorCcuerpo();
  $borrarCcuerpo -> ctrBorrarCcuerpo();

?>


