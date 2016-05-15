<?php
    session_start();


    if (!isset($_SESSION['id'])) 
    {
      header('Location: index.php');
      die();
    }

$muestra="";
if(isset($_GET['estado'])){
    if(strcmp($_GET['estado'], "exitoso") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Contraseña cambiada");</script>';
    }
    else{
        $muestra= '<script type="text/javascript">alertify.error("Ha ocurrido un problema, comuniquese con el administrador");</script>';
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
         include('html/barraLateralPickHacienda.php');
         ?>

         <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
         <div class="content-wrapper inicio">
             <!-- Encabezado -->


             <!-- Contenido Principal de la pagina -->
             <section class="content">
                 <br><br>
                 <div class="login-logo titulo" style="color: #fff;">
                     <a href="#">Cambiar Contraseña</a>
                 </div><!-- /.login-logo -->
                 <!-- Incluir aqui el contenido-->
                 <div class="box" style="width: 70%; margin: 3% auto;">


                     <div class="box-header">

                     </div><!-- /.box-header -->
                     <div class="login-box-body">
                         <form role="form" action="cambiarPass.php" method="post">

                             <!-- text input -->

                             <div class="form-group">
                                 <label>Contraseña vieja</label>
                                 <input type="password" class="form-control" placeholder="Contraseña" id="contrasena" name="contrasena" required>
                             </div>

                             <div class="form-group">
                                 <label>Contraseña nueva</label>
                                 <input type="password" class="form-control" placeholder="Contraseña" id="contrasenaN" name="contrasenaN" required>
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
     <script src="js/app/app.min.js" type="text/javascript"></script>
     <script src="js/alertify.min.js"></script>
     <script src="js/app/main.js" type="text/javascript"></script>

     <?php echo $muestra;?>


     </body>
</html>