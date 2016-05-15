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
    include('html/barraLateralAdmin-e.php');
    ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">

                    <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Registrar puesto de trabajo</a>
                              </div><!-- /.login-logo -->
                    <!-- Incluir aqui el contenido-->
                <div class="box" style="width: 70%; margin: 3% auto;">
                  
                        
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="login-box-body">
                  <form role="form" action="scripRegistrarPuesto.php" method="post">
                    <!-- text input -->

                    <div class="form-group">
                      <label>Nombre puesto de trabajo 1</label>
                      <input type="text" class="form-control" placeholder="Digite el nombre del puesto de trabajo" id="nombre1" name="nombre1" required>
                    </div>
                      <div class="form-group" >
                          <label>Selecciona el tipo de puesto de trabajo 1</label>
                          <select class="form-control" id="tipo_p1" name="tipo_p1" required>
                              <option value>Seleccione uno</option>
                              <?php echo $facade->cargarTiposPuestoTrabajo();?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Nombre puesto de trabajo 2</label>
                          <input type="text" class="form-control" placeholder="Digite el nombre del puesto de trabajo" id="nombre2" name="nombre2" >
                      </div>
                      <div class="form-group" >
                          <label>Selecciona el tipo de puesto de trabajo 2</label>
                          <select class="form-control" id="tipo_p2" name="tipo_p2">
                              <option value>Seleccione uno</option>
                              <?php echo $facade->cargarTiposPuestoTrabajo();?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Nombre puesto de trabajo 3</label>
                          <input type="text" class="form-control" placeholder="Digite el nombre del puesto de trabajo" id="nombre3" name="nombre3">
                      </div>
                      <div class="form-group" >
                          <label>Selecciona el tipo de puesto de trabajo 3</label>
                          <select class="form-control" id="tipo_p3" name="tipo_p3">
                              <option value>Seleccione uno</option>
                              <?php echo $facade->cargarTiposPuestoTrabajo();?>
                          </select>
                      </div>
                      <input type="hidden" name="id_mina" id="id_mina" value=<?php echo $_GET['id_mina'];?> >
                      <input type="hidden" name="nombre_mina" id="nombre_mina" value=<?php echo  str_replace(' ','%20',$_GET['nombre_mina']);?> >
                      <input type="hidden" name="id_manto" id="id_manto" value=<?php echo $_GET['id_manto'];?> >
                      <input type="hidden" name="nombre_manto" id="nombre_manto" value=<?php echo  str_replace(' ','%20',$_GET['nombre_manto']);?> >
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
        <script src="./js/app/main.js" type="text/javascript"></script>
<script src="./js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="./js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    </body>

</html>