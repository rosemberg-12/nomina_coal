<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_GET['id'])){
    $facade= new facade();
    $facade->eliminarMina($_GET['id']);
    header("Location: administrar-mina.php?estado=eliminado");
}
else{
    header("Location: administrar-mina.php");
}
