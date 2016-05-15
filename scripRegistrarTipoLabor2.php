<?php
require_once 'php/facade/facade.php';

if(isset($_POST['mantoS']) && isset($_POST['l1'])	&& isset($_POST['l2']) && isset($_POST['concepto']) && isset($_POST['cantidad'])&&  isset($_POST['mina']))
{

	 $facade = new facade();

    $cadena=$facade->registrarTipoLabor2($_POST['l1'],$_POST['l2'], $_POST['concepto'], $_POST['cantidad'], $_POST['mina'], $_POST['mantoS']);
    echo $cadena;

     header('Location: administrar-labores.php');
}


