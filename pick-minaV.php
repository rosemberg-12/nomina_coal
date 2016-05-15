<?php
    session_start();
    if (!isset($_SESSION['id'])) 
    {
      header('Location: index.php');
      die();
    }
    
    if(isset($_SESSION['id_mina']))
    {
      unset($_SESSION['id_mina']);
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
              include('html/barraLateralPickHacienda.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">
                    <!-- Incluir aqui el contenido-->
                     <br>
                     <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#"><b>Selecciona una mina<b></a>
                              </div><!-- /.login-logo -->
                              <br>
                              <br>

                       <div class="row">

                 <?php echo $facade->cargarMinasVisitante();?>

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
    </body>

</html>