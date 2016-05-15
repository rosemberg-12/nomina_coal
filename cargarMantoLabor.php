<?php

$options="<option value=''>Seleccione uno</option>";

if (isset($_POST['labor']) and !empty($_POST['labor']) || isset($_POST['mina']) and !empty($_POST['mina'])) {
    require_once 'php/facade/facade.php';

    session_start();

    $_SESSION['id_mina']=$_POST['mina'];
    $facade = new facade();

    $cadena=$facade->cargarMantoLabor($_POST['labor']);

    echo $cadena;
}

?>