<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_GET['id_mina'])&& isset($_GET['id_tipo_labor']) ){
    $facade= new facade();
    $facade->eliminarTipoLabor($_GET['id_tipo_labor']);
    header('Location: ver-labores.php?estado=eliminado&id_mina='.$_GET['id_mina']);
}
else{
    header("Location: administrar-mina.php");
}
