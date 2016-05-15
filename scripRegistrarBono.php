<?php
require_once 'php/facade/facade.php';



    if( isset($_POST['tbono']) && isset($_POST['cantidad']) && isset($_POST['id_empleado'])){

        $facade = new facade();

        $cadena=$facade->registrarBono($_POST['tbono'],$_POST['cantidad'], $_POST['id_empleado'], $_POST['comentario']);

        echo $cadena;

        header('Location: pick-trabajador.php?estado=bregistrado');

    }


