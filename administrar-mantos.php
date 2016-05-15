<?php
    session_start();

if (!isset($_SESSION['user']))
{
    header('Location: admin.php');
    die();
}
if (!isset($_GET['id_mina']) & !isset($_GET['nombre_m']))
{
    header('Location: administrar-mina.php');
    die();
}
$muestra="";
if (isset($_GET['estado'])){
    if($_GET['estado']='eliminado'){
    $muestra= '<script type="text/javascript">alertify.success("Eliminacion correcta");</script>';
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
              include('html/headerIndex.php');
            ?>

            <!-- aca va la barra lateral -->
            <?php
              include('html/barraLateralAdmin.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">
                    <!-- Incluir aqui el contenido-->
                     <br>
                     <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Administrar mantos</a> <br>
                         <a>Mina <?php echo $_GET['nombre_m'];?></a>
                              </div><!-- /.login-logo -->
                              <br>
                              <br>

                    <div class="col-xs-12" style="display: flex;  justify-content: center; padding-bottom: 50px" >
                        <div class="col-xs-6" >

                            <a href=<?php echo 'registrarManto.php?id_mina='.$_GET['id_mina'].'&nombre_m='. str_replace(' ','%20',$_GET['nombre_m']) ;?> class="btn btn-info btn-block btn-flat">Crear nuevo manto</a>
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
                                            <th>Nombre del manto</th>
                                            <th>Acción</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php echo $facade->cargarMantosMina($_GET['id_mina'],$_GET['nombre_m']);?>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Nombre de trabajador</th>
                                            <th>Acción</th>

                                        </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                    </div><!-- /.row -->


                </section><!-- /.contenido principal-->
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