<?php

    require_once 'php/facade/facade.php';
    
    $facade = new facade();

session_start();

    $_SESSION['id_mina']=$_POST['mina'];

    echo $facade->cargarMantos();


echo $options;    
?>