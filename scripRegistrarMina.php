<?php
require_once 'php/facade/facade.php';

if( isset($_POST['nombre'])	&& isset($_POST['id'])	&& isset($_POST['descripcion']) && isset($_POST['direccion']))
{

	 $facade = new facade();

    $cadena=$facade->registrarMina($_POST['id'],$_POST['nombre'],$_POST['descripcion'], $_POST['direccion']);
    echo $cadena;
	
     header('Location: administrar-mina.php?estado=creado');
}


