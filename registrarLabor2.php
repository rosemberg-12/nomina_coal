<?php


session_start();

if (!isset($_SESSION['user']))
{
    header('Location: admin.php');
    die();
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
    include('html/barraLateralAdmin-l.php');
    ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">

                    <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Registrar Labor</a>
                              </div><!-- /.login-logo -->
                    <!-- Incluir aqui el contenido-->
                <div class="box" style="width: 70%; margin: 3% auto;">
                  
                        
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="login-box-body">
                  <form role="form" action="scripRegistrarTipoLabor2.php" method="post">
                    <!-- text input -->

                      <div class="form-group" >
                          <label>Selecciona el tipo de labor a registrar</label>

                          <select class="form-control" id="l1" name="l1" required>
                              <option value>Seleccione uno</option>
                              <option value="Desarrollo">Desarrollo</option>
                              <option value="Preparacion">Preparación</option>
                              <option value="Explotacion">Explotación</option>
                              <option value="Trabajo en Superficie">Trabajo en superficie</option>
                              <option value="Oficios Varios">Oficios Varios</option>
                          </select>
                          <br>

                          <select class="form-control" id="l2" name="l2">
                              <option value>Seleccione uno</option>
                              <option value="Avance">Avance</option>
                              <option value="Cargue">Cargue</option>
                              <option value="Carrilera">Carrilera</option>
                              <option value="Descuñe">Descuñe</option>
                              <option value="Otros">Otros</option>
                              <option value="Jornales">Jornales</option>
                              <option value="Madera">Madera</option>
                              <option value="Mantenimiento">Mantenimiento</option>
                              <option value="Trasporte">Trasporte</option>
                              <option value="Varios">Varios</option>
                          </select>

                      </div>

                    <div class="form-group">
                      <label>Concepto de la labor</label>
                      <input type="text" class="form-control" placeholder="Digite el concepto de la labor" id="concepto" name="concepto" required>
                    </div>

                      <div class="form-group">
                          <label>precio por unidad</label>
                          <input type="number" step="any"  class="form-control" placeholder="Digite el precio por unidad de esta labor" id="cantidad" name="cantidad" required>
                      </div>


                      <div class="form-group" >
                          <label>Selecciona el manto asignara este tipo de labor</label>
                          <select class="form-control"  id="mantoS" name="mantoS" required>

                              <?php $_SESSION['id_mina']=$_GET['id_mina'];
                              echo $facade->cargarMantos();
                              unset($_SESSION['id_mina']);?>

                          </select>
                      </div>

                     <input type="hidden" name="mina" value=<?php echo $_GET['id_mina'];?> >

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

<script src="./js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="./js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    </body>

</html>