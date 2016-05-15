<?php
require_once 'php/facade/facade.php';

if( isset($_POST['nombre'])	&& isset($_POST['cedula']) && isset($_POST['mina']) && isset($_POST['codigo']))
{

	 $facade = new facade();

    $cadena=$facade->registrarEmpleado($_POST['nombre'],$_POST['cedula'],$_POST['dir'],$_POST['tel'], $_POST['mina'], $_POST['codigo']);

    header('Location: administrar-empleados.php?estado=registrado');
	

}
else{
    header('Location: registrarEmpleado.php?estado=error');
}


