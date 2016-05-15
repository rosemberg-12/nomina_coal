<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_GET['id_td'])){
    $facade= new facade();
    $facade->eliminarTipoDescuento($_GET['id_td']);
    header("Location: administrar-descuentos.php?estado=eliminados");
}
else{
    header("Location: administrar-descuentos.php");
}
