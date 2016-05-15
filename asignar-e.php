<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';

if(isset($_GET['id_mina']) && isset($_GET['id_empleado']) ){
    $facade= new facade();
    $facade->asignarEncargado($_GET['id_mina'],$_GET['id_empleado']);
    header("Location: administrar-mina.php?estado=asignado");
}
else{
    header("Location: administrar-mina.php");
}