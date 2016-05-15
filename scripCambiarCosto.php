<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_POST['id_mina'])&& isset($_POST['id_tipo']) && isset($_POST['unidad'])){
    $facade= new facade();
    $facade->cambiarCosto($_POST['id_tipo'],$_POST['unidad']);
    header('Location: ver-labores.php?estado=cambiado&id_mina='.$_POST['id_mina']);
}
else{
    header("Location: administrar-mina.php");
}
