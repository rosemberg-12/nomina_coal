<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';

echo "entra aca";

if( isset($_GET['id_puesto']) && isset($_GET['nombre_mina']) && isset($_GET['id_mina']) && isset($_GET['nombre_manto']) && isset($_GET['id_manto']) )
{
    echo "aca no";
    $facade = new facade();

    $cadena=$facade->eliminarPuestoT($_GET['id_puesto']);
    echo $cadena;

    header('Location: administrar-m.php?estado=eliminado&id_mina='.$_GET['id_mina'].'&nombre_mina='.$_GET['nombre_mina'].'&nombre_manto='.$_GET['nombre_manto'].'&id_manto='.$_GET['id_manto']);
}
else{

}
