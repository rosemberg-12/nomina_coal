<?php
require_once 'php/facade/facade.php';

if( isset($_POST['l1'])	&& isset($_POST['l2']) && isset($_POST['concepto']) && isset($_POST['ppu'])&&  isset($_POST['mina']))
{

	 $facade = new facade();

    $cadena=$facade->registrarTipoLabor($_POST['l1'],$_POST['l2'], $_POST['concepto'], $_POST['ppu'], $_POST['mina']);
    echo $cadena;
	
     header('Location: administrar-labores.php');
}

if( isset($_POST['l1'])	&& isset($_POST['l2']) && isset($_POST['mina']))
{

    $facade = new facade();

    $con="";

    $cadena=$facade->registrarTipoLabor($_POST['l1'],$_POST['l2'], $con, $con, $_POST['mina']);
    echo $cadena;

    header('Location: administrar-labores.php');
}

