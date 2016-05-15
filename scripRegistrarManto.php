<?php
require_once 'php/facade/facade.php';

if( isset($_POST['nombre'])	&& isset($_POST['mina']))
{

	 $facade = new facade();

    $cadena=$facade->registrarManto($_POST['nombre'],$_POST['mina']);
    echo $cadena;
	
     header('Location: administrar-mantos.php?id_mina='.$_POST['mina'].'&nombre_m='.$_POST['nombre_m']);
}


