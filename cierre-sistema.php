<?php
    session_start();

if (!isset($_SESSION['user']))
{
    header('Location: admin.php');
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

$_SESSION['id_mina']=$_GET['id_mina'];
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
              include('html/barraLateralAdmin-s.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">
                    <!-- Incluir aqui el contenido-->
                     <br>
                     <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Administrar periodos de la mina <?php echo $_GET['nombre_m'];?></a>
                              </div><!-- /.login-logo -->
                              <br>
                              <br>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">

                                <div class="box-body">
                                    <div style="text-align: center;">El periodo electivo en el sistema es <b><?php echo $facade->validarPeriodoActual();?> <b></b></B></div>
                                </div>
                            </div>
                        </div>
                        <form role="form" action="scripCambiarPeriodo.php" method="post">
                        <div class="col-md-7" >
                            <div class="col-xs-12" >

                                <div class="form-group">

                                    <div class="col-xs-12">
                                        <label style="color: #ffffff">Seleccione el nuevo periodo electivo</label>
                                        <div class="box">

                                            <div class="box-body">

                                                <table id="minas" class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Periodo</th>
                                                        <th>Seleccionar</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php echo $facade->cargarPeriodos();?>

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Periodo</th>
                                                        <th>Seleccionar</th>

                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div><!-- /.box-body -->

                                        </div><!-- /.box -->

                                    </div><!-- /.col -->
                                </div>

                                 </div>
                        </div>
                            <br><br><br><br><br><br>
                            <div class="col-md-5" style="display: flex;  justify-content: center; padding-bottom: 50px" >
                                <div class="col-xs-10" >
                                    <button type="submit" class="btn btn-info btn-block btn-flat" name="crear1" value="1">Seleccionar nuevo periodo</button>
                                </div>
                            </div>


                        </form>
                        <br>



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