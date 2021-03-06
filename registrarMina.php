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
    include('html/barraLateralAdmin.php');
    ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">

                    <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Registrar mina</a>
                              </div><!-- /.login-logo -->
                    <!-- Incluir aqui el contenido-->
                    <div class="box" style="width: 70%; margin: 3% auto;">
                  
                        
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="login-box-body">
                  <form role="form" action="scripRegistrarMina.php" method="post">
                    <!-- text input -->
                      <div class="form-group">
                          <label>ID de la mina</label>
                          <input type="number" class="form-control" placeholder="ID de la mina" id="id" name="id" required>
                      </div>


                    <div class="form-group">
                      <label>Nombre de la mina</label>
                      <input type="text" class="form-control" placeholder="Digite el nombre de la nueva mina" id="nombre" name="nombre" required>
                    </div>

                      <div class="form-group">
                          <label>Descripcion de la mina</label>
                          <input type="text" class="form-control" placeholder="Digite una descripcion" id="descripcion" name="descripcion" required>
                      </div>

                      <div class="form-group">
                          <label>Direccion de la mina</label>
                          <input type="text" class="form-control" placeholder="Digite la direccion de la mina" id="direccion" name="direccion" required>
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
        <script src="./js/app/main.js" type="text/javascript"></script>
    </body>

</html>