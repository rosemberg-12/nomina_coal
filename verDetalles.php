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


$vector= $facade->cargarDetallesLabor($_GET['id']);

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
              include('html/barraLateralUserVolverLabores.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">

                    <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Detalles de la labor</a>
                              </div><!-- /.login-logo -->
                    <!-- Incluir aqui el contenido-->
                    <div class="box" style="width: 70%; margin: 3% auto;">


                        <div class="box-header">

                        </div><!-- /.box-header -->
                        <div class="login-box-body">
                            <form role="form" action="scripRegistrarLabor.php" method="post">
                                <!-- text input -->

                                <div class="form-group" >
                                    <label>Tipo de labor</label>

                                    <select class="form-control" id="l1" name="l1" require disabled>
                                        <option value><?php echo $vector[0];?></option>
                                    </select>
                                    <br>
                                    <label>Subtipo de labor</label>

                                    <select class="form-control" id="l2" name="l2" require disabled>
                                        <option value><?php echo $vector[1];?></option>
                                    </select>

                                </div>


                                <!-- Aca se cargan los mantos que se encuentren en la mina   -->

                                <div class="form-group" >
                                    <label>Concepto de la labor</label>
                                    <select class="form-control"  id="concepto" name="concepto" required  disabled>
                                        <option value><?php echo $vector[2];?></option>

                                    </select>
                                </div>

                                <!-- Aca se cargan los mantos que se encuentren en la mina   -->

                                <div class="form-group" >
                                    <label>Manto sobre el cual se desarrolló la labor</label>
                                    <select class="form-control"  id="mantoS" name="mantoS" required  disabled>

                                        <option value><?php echo $vector[3];?></option>
                                    </select>
                                </div>


                                <!-- Aca se cargan los tipos elementos de la mina(Tipo_pueso_trabajo)   -->


                                <!-- Aca se cargan los tipos de labor realizada   -->
                                <input type="hidden" name="mina" id="mina" value=<?php echo $_SESSION['id_mina'];?>>

                                <div class="form-group">
                                    <label>Cantidad</label>
                                    <input type="number" class="form-control" placeholder="Digite la cantidad" id="cantidad" name="cantidad" value="<?php echo $vector[6];?>" required  disabled>
                                </div>

                                <div class="form-group">
                                    <label>Costo de la labor</label>
                                    <input type="number" class="form-control" placeholder="Digite la cantidad" id="cantidad" name="cantidad" value="<?php echo $vector[8];?>" required  disabled>
                                </div>

                                <div class="form-group">
                                    <label>Comentario</label>
                                    <input type="text" class="form-control"  id="comentario" name="comentario" value="<?php echo $vector[7];?>" required  disabled>
                                </div>


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
    </body>

</html>