<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_POST['id_empleado'])&& isset($_POST['mina'])){
    $facade= new facade();
    $facade->reasignarEmpleado($_POST['id_empleado'],$_POST['mina']);
    header('Location: administrar-empleados.php');
}
else{
    header("Location: administrar-mina.php");
}
