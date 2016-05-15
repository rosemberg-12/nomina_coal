<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_POST['periodo'])){
    $facade= new facade();
    $facade->cambiarPeriodo($_POST['periodo']);
    header('Location: administrar-mina.php?estado=p_cambiado');
}
else{
    header("Location: administrar-mina.php");
}
