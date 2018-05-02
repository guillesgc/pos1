<style>
    #mdialTamanio{
        width: 50% !important;
    }
</style>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Listar Sepulturas

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Listar Sepulturas</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablaSepultura" width="100%">

                    <thead>

                        <tr>
                            <th>Tipo Producto</th>
                            <th>Cuartel-Cuerpo</th>
                            <th># Sepultura</th>
                            <th>Estado</th>
                            <th>Piso</th>
                            <th>Corrida</th>
                            <th>Ver Fallecidos</th>

                        </tr>

                    </thead>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL MOSTRAR FALLECIDOS
======================================-->

<div id="modalFallecidos" class="modal fade" role="dialog">

    <div class="modal-dialog" id="mdialTamanio">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white; width:100%">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Fallecidos en...</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL CÓDIGO -->

                        <table class="table table-bordered table-striped table-responsive" width="100%">

                            <thead>

                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Nombre Fallecido</th>
                                    <th>Edad</th>
                                    <th>Fecha Sepultación</th>
                                    <th>Inscripción</th>
                                    <th>Circunscripción</th>
                                    <th>Causa Muerte</th>
                                </tr>
                            </thead>


                        </table>

                    </div>

                </div>



                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                </div>

            </form>

        </div>

    </div>

</div>


