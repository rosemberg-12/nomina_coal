<?php
require_once 'php/facade/facade.php';

if( isset($_POST['nombre']) && isset($_POST['codigo']) )
{

	 $facade = new facade();

    $cadena=$facade->registrarTipoDescuento($_POST['nombre'], $_POST['codigo']);
    echo $cadena;
	
     header('Location: administrar-descuentos.php?estado=rexitoso');
}


