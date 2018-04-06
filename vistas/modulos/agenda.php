<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Obituario y Citaciones
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Obituario y Citaciones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
    
    <?php
     
        if($_SESSION["perfil"] == "Administrador")
        {
    
          echo '<div class="box-header with-border">

             <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAgenda">
          
             Agregar obituario y citaciones

             </button>

            </div>';
      }
  ?>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Glosa</th>
           <th>Tipo</th>
           <th>Boletin</th>
           <th>Fecha Evento</th>
           <th>Hora</th>
           <th>Opciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $agenda = ControladorAgenda::ctrMostrarAgenda($item, $valor);

          foreach ($agenda as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["glosa"].'</td>';
                    if ($value["tipo_agenda"]==1){
                          $titulo="SEPULTACIÓN";
                      }else{
                          $titulo="REDUCCIÓN Y/O TRASLADO";
                      }

                    echo '<td>'.$titulo.'</td>
                    <td>'.$value["boletin"].'</td>
                    <td>'.$value["fecha_evento"].'</td>
                    <td>'.$value["hora"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarAgenda" idAgenda="'.$value["id_agenda"].'" data-toggle="modal" data-target="#modalEditarAgenda"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarAgenda" idAgenda="'.$value["id_agenda"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR AGENDA
======================================-->

<div id="modalAgregarAgenda" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar obituario y citaciones</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA GLOSA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-info"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaGlosa" placeholder="Ingresar Detalle" required>

              </div>

            </div>


            <!-- ENTRADA TIPO DE AGENDA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <select class="form-control" name="nuevoTipoagenda" required>
                  
                  <option value="">Selecionar tipo registro</option>
                  
                  <option value="1">Sepultación</option>
                 
                  <option value="2">Reducción y/o Traslado</option>
                
                </select>

              </div>

            </div>




            <!-- ENTRADA PARA BOLETIN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoBoletin" placeholder="Ingresar Boletin" required >

              </div>

            </div>


            <!-- ENTRADA PARA FECHA REGISTRO -->
            

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFecha" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Evento" required>

              </div>

            </div>


             <!-- ENTRADA PARA HORA REGISTRO -->
            

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 

                <input type="time" class="form-control input-lg" name="nuevaHora" required>

              </div>

            </div>

  

              <!-- ENTRADA TIPO DE AGENDA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <select class="form-control" name="nuevoActivo" required>
                  
                  <option value="">Selecionar si esta activo</option>
                  
                  <option value="1">Si</option>
                 
                  <option value="2">No</option>
                
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

          <button type="submit" class="btn btn-primary">Guardar Registro</button>

        </div>

        <?php

          $crearAgenda = new ControladorAgenda();
          $crearAgenda -> ctrCrearAgenda();

        ?>

      </form>

    </div>

  </div>

</div>






<!--=====================================
MODAL EDITAR AGENDA
======================================-->

<div id="modalEditarAgenda" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA GLOSA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-info"></i></span> 

                <input type="text" class="form-control input-lg" name="editarGlosa" id="editarGlosa" placeholder="Ingresar Detalle" required>
                <input type="hidden" name="idAgenda" id="idAgenda">

              </div>

            </div>


            <!-- ENTRADA TIPO DE AGENDA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <select class="form-control" name="editarTipoagenda" id="editarTipoagenda" required>
                  
                  <option value="">Selecionar tipo registro</option>
                  
                  <option value="1">Sepultación</option>
                 
                  <option value="2">Reducción y/o Traslado</option>
                
                </select>

              </div>

            </div>




            <!-- ENTRADA PARA BOLETIN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarBoletin" id="editarBoletin"  placeholder="Ingresar Boletin" required >

              </div>

            </div>


            <!-- ENTRADA PARA FECHA REGISTRO -->
            

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFecha" id="editarFecha"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask placeholder="Fecha Evento" required>

              </div>

            </div>


             <!-- ENTRADA PARA HORA REGISTRO -->
            

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span> 

                <input type="time" class="form-control input-lg" name="editarHora" id="editarHora" required>

              </div>

            </div>

  

              <!-- ENTRADA TIPO DE AGENDA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <select class="form-control" name="editarActivo" id="editarActivo" required>
                  
                  <option value="">Selecionar si esta activo</option>
                  
                  <option value="1">Si</option>
                 
                  <option value="2">No</option>
                
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

          <button type="submit" class="btn btn-primary">Editar Registro</button>

        </div>

        <?php

          $editarAgenda = new ControladorAgenda();
          $editarAgenda -> ctrEditarAgenda();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarAgenda = new ControladorAgenda();
  $borrarAgenda -> ctrBorrarAgenda();

?>


