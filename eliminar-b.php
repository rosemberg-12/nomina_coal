<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_GET['id_d'])){
    $facade= new facade();
    $facade->eliminarBono($_GET['id_d']);
    header("Location: verBonos.php?id=".$_GET['id_e']."&nombre=".$_GET['nombre']."&estado=eliminados");
}
else{
    header("Location: verBonos.php.php");
}
