<?php
require_once 'php/facade/facade.php';

if( isset($_POST['nombre']) && isset($_POST['codigo']) )
{

	 $facade = new facade();

    $cadena=$facade->registrarTipoBonos($_POST['nombre'], $_POST['codigo']);
    echo $cadena;

     header('Location: administrar-bonos.php?estado=rexitoso');
}


