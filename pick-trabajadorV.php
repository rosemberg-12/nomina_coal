<?php

session_start();
$mina='';
$nomina='active';
$muestra="";

if (!isset($_SESSION['id'])) 
{
    header('Location: index.php');
    die();
}
if( !isset($_SESSION['id_mina']) )
{
    header('Location: pick-mina.php');
    die();
}
if (isset($_GET['estado'])){


    if(strcmp($_GET['estado'], "lregistrado") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Labor registrada correctamente");</script>';
    }
    if(strcmp($_GET['estado'], "dregistrado") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Descuento registrado correctamente");</script>';
    }
    if(strcmp($_GET['estado'], "bregistrado") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Bono registrado correctamente");</script>';
    }

}

require_once 'php/facade/facade.php';
$facade = new facade();

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
                                    <a href="#">Empleados de la mina</a>

                              </div><!-- /.login-logo -->
                              <br>
                              <br>
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <div style="text-align: center;">El periodo electivo en el sistema es <b><?php echo $facade->validarPeriodoActual();?> <b></b></B></div>
                    </div>
                </div>
            </div>
            <br>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">

                <div class="box-body">

                  <table id="empleados" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Nombre de trabajador</th>
                          <th>Labores</th>
                          <th>Descuentos</th>
                          <th>Bonos</th>
                          <th>Total</th>
                          <th>Acción</th>

                      </tr>
                    </thead>
                    <tbody>

                    <?php echo $facade->cargarEmpleadosV();?>

                    </tbody>
                    <tfoot>
                       <tr>
                           <th>Nombre de trabajador</th>
                           <th>Labores</th>
                           <th>Descuentos</th>
                           <th>Bonos</th>
                           <th>Total</th>
                           <th>Acción</th>

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