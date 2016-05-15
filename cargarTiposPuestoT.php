<?php

$options="";

if ( isset($_POST['manto']) and !empty($_POST['manto'])) {
    require_once 'php/facade/facade.php';

    $facade = new facade();

    $cadena=$facade->cargarPuestosTrabajoLabor( $_POST['manto'] );


if($cadena != "")
   	$options.=$cadena;

   else 
   	$options=$cadena;
}


echo $options;    
?>