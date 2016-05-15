<?php

session_start();
$mina='';
$nomina='active';

if (!isset($_SESSION['id'])) 
{
    header('Location: index.php');
    die();
}
elseif( !isset($_SESSION['id_mina']) )
{
    header('Location: pick-mina.php');
    die();
}
elseif( !isset($_GET['id']) ) {
    header('Location: pick-trabajador.php');
}

require_once 'php/facade/facade.php';
$facade = new facade();
$muestra="";
if (isset($_GET['estado'])){


    if(strcmp($_GET['estado'], "eliminados") == 0){
        $muestra= '<script type="text/javascript">alertify.success("bono eliminado exitosamente");</script>';
    }


}


?>
<!DOCTYPE html>
<html>
     <?php
         include('html/head.html');
      ?>

    <body class="skin-yellow">
        <div class="wrapper">
            <!-- Encabezado -->
            
            <?php
              include('html/headerUser.php');
            ?>

            <!-- aca va la barra lateral -->
            <?php
              include('html/barraLateralUserV.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                    <!-- Main content -->
        <section class="content">

            <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Bonos otorgados a  <?php echo $_GET['nombre']; ?></a>
                                    
                              </div><!-- /.login-logo -->
                              <br>
                              <br>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
               
                <div class="box-body">
                  <table id="empleados" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Fecha de registro(MM/DD/AA)</th>
                        <th>Tipo de bono</th>
                        <th>Cantidad</th>
                        <th>Comentario</th>

                        
                      </tr>
                    </thead>
                    <tbody>
<!-- aca va la carga de las labores de la persona en especifico -->
                        <?php echo $facade->cargarBonosV($_GET['id'], $_GET['nombre'])?>
                    </tbody>
                    <tfoot>
                    <th>Fecha de registro(MM/DD/AA)</th>
                    <th>Tipo de bono</th>
                    <th>Cantidad</th>
                    <th>Comentario</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            
            <!-- Pie de pagina -->
            
        <?php
              include('html/footer.php');
            ?>
        </div><!-- wrapper-->


        <!-- Funciones js -->

        <!-- jQuery 2.1.3 -->
        <script src="./js/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="./js/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="./js/bootstrap/bootstrap.min.js" type="text/javascript"></script>   
        <!-- AdminLTE App Oculta el menu-->
        <script src="./js/app/app.min.js" type="text/javascript"></script>
        <script src="./js/alertify.min.js"></script>
        <script src="./js/app/main.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="./js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="./js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <?php echo $muestra;?>
    </body>

</html>