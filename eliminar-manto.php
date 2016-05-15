<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_GET['id_manto'])&& isset($_GET['id_mina']) && isset($_GET['nombre_mina'])){
    $facade= new facade();
    $facade->eliminarManto($_GET['id_manto']);
    header('Location: administrar-mantos.php?estado=eliminado&id_mina='.$_GET['id_mina'].'&nombre_m='.$_GET['nombre_mina']);
}
else{
    header("Location: administrar-mina.php");
}
