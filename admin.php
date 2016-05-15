<?php
require_once 'php/dto/empleado.php';

$muestra="";
if( ( isset($_POST['documento']) && isset($_POST['password']) && isset($_POST['tipo']) ) )
{

    require_once 'php/facade/facade.php';

    $documento=$_POST['documento'];
    $contraseña=$_POST['password'];
    $tipo=$_POST['tipo'];

    $empleado= new empleado();
    $empleado->_SET('cedula',$documento);
    $empleado->_SET('contrasena',$contraseña);

    $facade = new facade();

    $var=$facade->iniciarSesionAdmin($empleado,$_POST['tipo']);

    if($var!=null)
        header($var);

    else{
        $muestra= '<script type="text/javascript">alertify.error("Contraseña incorrecta");</script>';
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

              include('html/barraLateralIndex-a.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">
                    <!-- Incluir aqui el contenido-->
                        <div class="login-box">
                              <div class="login-logo" style="background-color: #f39c12;">
                                    <a href="#" style="color: #fff;"><b>Inicio </b>CoalNorth ADMINISTRADOR</a>
                              </div><!-- /.login-logo -->
                                      <div class="login-box-body">
                                        <p class="login-box-msg">Logueate para iniciar sesión</p>
                                                <form action="admin.php" method="post" id="login">
                                                <div id="tok">

                                                  <div class="form-group has-feedback">
                                                    <input type="text" class="form-control" placeholder="Número de Documento" name="documento" id="documento" required="" title="Número de Documento">
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                  </div>

                                                  <div class="form-group has-feedback">
                                                    <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required="" title="Contraseña">
                                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                  </div>

                                                    <div class="form-group has-feedback">
                                                        <select class="form-control" id="tipo" name="tipo" required>

                                                            <option value>Seleccione el rol</option>
                                                            <option value="1">Administrador</option>
                                                            <option value="2">Encargado de importar y exportar</option>

                                                        </select>
                                                    </div>

                                                  <div class="row">

                                                    <div class="col-xs-8">
                                                      <div class="checkbox icheck">
                                                        <label>

                                                        </label>
                                                      </div>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-4">
                                                      <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                                                    </div><!-- /.col -->
                                                  </div>

                                                </form>

                                        <br>

                                      </div><!-- /.login-box-body -->
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
        <?php echo $muestra;?>
    </body>

</html>
