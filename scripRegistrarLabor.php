<?php
require_once 'php/facade/facade.php';
session_start();
if(isset($_POST['precio_jornal'])){

    if( isset($_POST['l1']) && isset($_POST['l2']) && isset($_POST['precio_jornal']) && isset($_POST['mantoS'])
        && isset($_POST['identificador']) && isset($_POST['cantidad']) && isset($_POST['comentario'])){

        $facade = new facade();

        $cadena=$facade->registrarLaborJornal($_POST['l1'],$_POST['l2'],$_POST['mantoS'],$_POST['identificador'],$_POST['cantidad'],$_POST['comentario'],$_POST['id_empleado'],$_POST['precio_jornal']);

        echo $cadena;

        header('Location: pick-trabajador.php?estado=lregistrado');


    }

}
elseif(isset($_POST['precio_otro'])){

    if( isset($_POST['l1']) && isset($_POST['l2']) && isset($_POST['precio_otro']) && isset($_POST['mantoS'])
        && isset($_POST['identificador']) && isset($_POST['cantidad']) && isset($_POST['comentario'])){

        $facade = new facade();

        $cadena=$facade->registrarLaborJornal($_POST['l1'],$_POST['l2'],$_POST['mantoS'],$_POST['identificador'],$_POST['cantidad'],$_POST['comentario'],$_POST['id_empleado'],$_POST['precio_otro']);

        echo $cadena;

        header('Location: pick-trabajador.php?estado=lregistrado');


    }

}
elseif( isset($_POST['l1']) && isset($_POST['l2']) && isset($_POST['concepto']) && isset($_POST['mantoS'])
	&& isset($_POST['identificador']) && isset($_POST['cantidad']) )
{

	 $facade = new facade();

    $cadena=$facade->registrarLabor($_POST['l1'],$_POST['l2'],$_POST['concepto'],$_POST['mantoS'],$_POST['identificador'],$_POST['cantidad'],$_POST['comentario'],$_POST['id_empleado']);

    echo $cadena;

    header('Location: pick-trabajador.php?estado=lregistrado');
}


