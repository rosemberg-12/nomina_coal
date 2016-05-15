<?php


session_start();

if (!isset($_SESSION['user']))
{
    header('Location: admin.php');
    die();
}

require_once 'php/facade/facade.php';
$facade = new facade();

$muestra="";
if (isset($_GET['estado'])){


    if(strcmp($_GET['estado'], "error") == 0){
        $muestra= '<script type="text/javascript">alertify.error("Error, revise que todos los campos estan completos");</script>';
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
    include('html/headerIndex.php');
    ?>

    <!-- aca va la barra lateral -->
    <?php
    include('html/barraLateralAdmin-e.php');
    ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">

                    <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Registrar Empleado</a>
                              </div><!-- /.login-logo -->
                    <!-- Incluir aqui el contenido-->
                <div class="box" style="width: 70%; margin: 3% auto;">
                  
                        
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="login-box-body">
                  <form role="form" action="scripRegistrarEmpleado.php" method="post">
                    <!-- text input -->

                    <div class="form-group">
                      <label>Nombre y apellidos del empleado</label>
                      <input type="text" class="form-control" placeholder="Digite el nombre y apellido del empleado" id="nombre" name="nombre" required>
                    </div>

                      <div class="form-group">
                          <label>Codigo del empleado</label>
                          <input type="text" class="form-control" placeholder="Digite el codigo del empleado" id="codigo" name="codigo" required>
                      </div>

                      <div class="form-group">
                          <label>cedula del empleado</label>
                          <input type="number" class="form-control" placeholder="Digite la cedula del empleado" id="cedula" name="cedula" required>
                      </div>
                      <div class="form-group">
                          <label>Dirección</label>
                          <input type="text" class="form-control" placeholder="Digite la dirección" id="dir" name="dir" required>
                      </div>
                      <div class="form-group">
                          <label>Teléfono</label>
                          <input type="number" class="form-control" placeholder="Digite el telefono del empleado" id="tel" name="tel" required>
                      </div>



                      <div class="form-group">
                          <label>Seleccione la mina donde sera asignado</label>
                          <div class="col-xs-12">
                              <div class="box">

                                  <div class="box-body">

                                      <table id="minas" class="table table-bordered table-hover">
                                          <thead>
                                          <tr>
                                              <th>Nombre de la mina</th>
                                              <th>Direccion</th>
                                              <th>Seleccionar</th>

                                          </tr>
                                          </thead>
                                          <tbody>

                                          <?php echo $facade->cargarMinasRegistrarEmpleado();?>

                                          </tbody>
                                          <tfoot>
                                          <tr>
                                              <th>Nombre de la mina</th>
                                              <th>Direccion</th>
                                              <th>Seleccionar</th>

                                          </tr>
                                          </tfoot>
                                      </table>
                                  </div><!-- /.box-body -->

                              </div><!-- /.box -->

                          </div><!-- /.col -->
                      </div>


                     <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>

                  </form>

             
              </div>
          </div>


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