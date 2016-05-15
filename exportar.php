<?php
    session_start();

if (!isset($_SESSION['user']))
{
    header('Location: admin.php');
    die();
}
$muestra="";
if (isset($_GET['estado'])){
    if(strcmp($_GET['estado'], "mina") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación de minas correcta, no olvide asignarles encargados y los periodos");</script>';
    }
    elseif(strcmp($_GET['estado'], "empleado") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación de empleados correcta");</script>';
    }
    elseif(strcmp($_GET['estado'], "tdescuento") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación de tipos de descuento exitoso");</script>';
    }
    elseif(strcmp($_GET['estado'], "tnonos") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación de tipos de descuento exitoso");</script>';
    }
    elseif(strcmp($_GET['estado'], "manto") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación de mantos exitoso");</script>';
    }
    elseif(strcmp($_GET['estado'], "tpt") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación de tipos de puesto de trabajo exitoso");</script>';
    }
    elseif(strcmp($_GET['estado'], "pt") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación de tipos de puesto de trabajo exitoso");</script>';
    }
    elseif(strcmp($_GET['estado'], "l1") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación de tipos de labores exitoso");</script>';
    }
    elseif(strcmp($_GET['estado'], "l2][") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación de tipos labores exitoso");</script>';
    }
    else{
        $muestra= '<script type="text/javascript">alertify.error("'.$_GET['estado'].'");</script>';
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
              include('html/headerIndex.php');
            ?>

            <!-- aca va la barra lateral -->
            <?php
            if(strcmp($_SESSION['tipo'], "1") == 0){
                include('html/barraLateralAdmin-ie.php');
            }

            elseif(strcmp($_SESSION['tipo'], "2") == 0){
                include('html/barraLateralAdmin-soloe.php');
            }

            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">
                    <!-- Incluir aqui el contenido-->
                     <br>
                     <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#">Importar y exportar</a>
                              </div><!-- /.login-logo -->
                              <br>
                              <br>

                    <br>

                    <div class="row">

                        <!-- Comienza item -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Importar mina</h3></center>
                                        <center><h4>(id, nombre, descripcion, direccion)</h4></center>
                                        <br><input name="archivo" type="file" id="archivo" accept=".csv" required><br>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="mina" value="1">Importar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Importar mantos</h3></center>
                                        <center><h4>(nombre del manto, codigo de la mina)</h4></center>
                                        <br><input name="archivo" type="file" id="archivo" accept=".csv" required><br>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="manto" value="1">Importar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <!-- Termina item -->

                        <!-- Comienza item -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Importar empleados</h3></center>
                                        <center><h4>(nombre, cedula, codigo, direccion, tel, mina 1, mina 2, ...)</h4></center>
                                        <br><input name="archivo" type="file" id="archivo" accept=".csv" required><br>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="empleado" value="1">Importar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <!-- Termina item -->

                        <!-- Comienza item -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Importar tipos de puestos de trabajo</h3></center>
                                        <center><h4>(codigo, nombre del tipo)</h4></center>
                                        <br><input name="archivo" type="file" id="archivo" accept=".csv" required><br>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="tptrabajo" value="1">Importar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <!-- Termina item -->

                        <!-- Comienza item -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Importar puestos de trabajo</h3></center>
                                        <center><h4>(cod de mina, nombre del manto, 	nombre1, idtipo1, nombre2, idtipo2, nombre3, idtipo3)</h4></center>
                                        <br><input name="archivo" type="file" id="archivo" accept=".csv" required><br>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="ptrabajo" value="1">Importar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <!-- Termina item -->

                        <!-- Comienza item -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Importar tipo de labores sin manto asignada</h3></center>
                                        <center><h4>(tipo, subtipo, concepto, valor, id mina)</h4><br></center>
                                        <br><input name="archivo" type="file" id="archivo"><br>
                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="l1"  value="1" >Importar</button>
                                    </form>

                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <!-- Termina item -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Importar tipo de labores con manto asignado</h3></center>
                                        <center><h4>(tipo, subtipo, concepto, valor, id mina, nombre manto)</h4></center>
                                        <br><input name="archivo" type="file" id="archivo"><br>
                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="l2" value="1" >Importar</button>
                                    </form>

                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <!-- Termina item -->

                        <!-- Comienza item -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Importar tipo de descuento</h3></center>
                                        <center><h4>(codigo, nombre)</h4></center>
                                        <br><input name="archivo" type="file" id="archivo" accept=".csv" required><br>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="tdescuento" value="1">Importar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <!-- Termina item -->

                        <!-- Comienza item -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Importar tipo de bonos</h3></center>
                                        <center><h4>(codigo, nombre)</h4></center>
                                        <br><input name="archivo" type="file" id="archivo" accept=".csv" required><br>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="tbonos" value="1">Importar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Exportar total labores devengado por mina</h3></center><br>

                                        <div class="form-group" >
                                            <label>Selecciona la mina</label>
                                            <select class="form-control"  id="minaa" name="minaa" required>

                                                <?php echo $facade->cargarMinasSelect();?>
                                            </select>
                                        </div>
                                        <div class="form-group" >
                                            <label>Selecciona el periodo</label>
                                            <select class="form-control"  id="periodoo" name="periodoo" required>

                                                <?php echo $facade->cargarPeriodosSelect();?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="r1" value="1">Generar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Exportar total descuentos devengados por mina</h3></center>

                                        <div class="form-group" >
                                            <label>Selecciona la mina</label>
                                            <select class="form-control"  id="minaa" name="minaa" required>

                                                <?php echo $facade->cargarMinasSelect();?>
                                            </select>
                                        </div>
                                        <div class="form-group" >
                                            <label>Selecciona el periodo</label>
                                            <select class="form-control"  id="periodoo" name="periodoo" required>

                                                <?php echo $facade->cargarPeriodosSelect();?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="r2" value="1">Generar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <div class="col-md-6">

                            <div class="box">

                                <div class="box-body">

                                    <form role="form" action="decision2.php" enctype="multipart/form-data" method="post" >
                                        <center><h3>Exportar total bonos devengados por mina</h3></center><br>

                                        <div class="form-group" >
                                            <label>Selecciona la mina</label>
                                            <select class="form-control"  id="minaa" name="minaa" required>

                                                <?php echo $facade->cargarMinasSelect();?>
                                            </select>
                                        </div>
                                        <div class="form-group" >
                                            <label>Selecciona el periodo</label>
                                            <select class="form-control"  id="periodoo" name="periodoo" required>

                                                <?php echo $facade->cargarPeriodosSelect();?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-block btn-flat" name="r3" value="1">Generar</button>
                                    </form>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <!-- Termina item -->


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