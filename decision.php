<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_POST['crear1'])){
    header('Location: registrarLabor1.php?id_mina='.$_POST['mina']);
}
elseif(isset($_POST['crear2'])){
    header('Location: registrarLabor2.php?id_mina='.$_POST['mina']);
}
elseif(isset($_POST['ver'])){
    header('Location: ver-labores.php?id_mina='.$_POST['mina']);;
}
else{
    echo "nada";
}
