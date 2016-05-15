<?php
require_once 'php/facade/facade.php';

    session_start();
	 $facade = new facade();

    $cadena=$facade->cambiarContrasena($_SESSION['cedula'],$_POST['contrasena'], $_POST['contrasenaN']);

	if($cadena==1)

     header('Location: cambiarContrasena.php?estado=exitoso');

    else{

     header('Location: cambiarContrasena.php?estado='.$cadena);

    }





