<?php

session_start();
$mina='';
$nomina='active';

if (!isset($_SESSION['id'])) 
{
    header('Location: index.php');
    die();
}
elseif( !isset($_SESSION['id_mina']) )
{
    header('Location: pick-mina.php');
    die();
}
elseif( !isset($_GET['id']) ) {
    header('Location: pick-trabajador.php');
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

    <div class="modal"><!-- Place at bottom of page --></div>
        <div class="wrapper">
            <!-- Encabezado -->
            
            <?php
              include('html/headerUser.php');
            ?>

            <!-- aca va la barra lateral -->
            <?php
              include('html/barraLateralUser.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">

                    <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Registrar descuento</a>
                              </div><!-- /.login-logo -->

                    <div id="carga"></div>
                    <!-- Incluir aqui el contenido-->
                    <div class="box" style="width: 70%; margin: 3% auto;">
                  
                        
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="login-box-body">
                  <form role="form" action="scripRegistrarDescuento.php" method="post">
                    <!-- text input -->

                      <!-- Aca se cargan los identificadores de cada tipo de puesto   -->

                      <div class="form-group" >
                          <label>Selecciona el tipo de descuento</label>
                          <select class="form-control" id="tdescuento" name="tdescuento" required>
                              <option value>Seleccione uno</option>
                                <!-- cargar aca los tipos del descuento-->
                                <?php echo $facade->cargarComboTDescuentos();?>
                              </select>
                      </div>

                      <div class="form-group">
                          <label>Valor del descuento</label>
                          <input type="number" class="form-control" placeholder="Digite la cantidad" id="cantidad" name="cantidad" required>
                      </div>

                      <div class="form-group">
                          <label>Comentario</label>
                          <input type="text" class="form-control" placeholder="Digite la un comentario respecto al descuento" id="comentario" name="comentario" required>
                      </div>

                      <input type="hidden" name="id_empleado" value=<?php echo $_GET['id']?>>
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