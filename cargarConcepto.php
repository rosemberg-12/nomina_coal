<?php

$options="<option value=''>Seleccione uno</option>";

if (isset($_POST['tipo']) and !empty($_POST['tipo']) ||
    isset($_POST['subtipo']) and !empty($_POST['subtipo']) ||
    isset($_POST['mina']) and !empty($_POST['mina'])
) {
    require_once 'php/facade/facade.php';
    
    $facade = new facade();

    $cadena=$facade->getConceptosLabores($_POST['tipo'],$_POST['subtipo'], $_POST['mina']);

   if($cadena != "<option value=''>No existen aun creados</option>")
   	$options.=$cadena;

   else
   	$options=$cadena;
}


echo $options;    
?>