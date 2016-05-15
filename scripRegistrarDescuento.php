<?php
require_once 'php/facade/facade.php';



    if( isset($_POST['tdescuento']) && isset($_POST['cantidad']) && isset($_POST['id_empleado'])){

        $facade = new facade();

        $cadena=$facade->registrarDescuento($_POST['tdescuento'],$_POST['cantidad'], $_POST['id_empleado'], $_POST['comentario']);

        echo $cadena;

        header('Location: pick-trabajador.php?estado=dregistrado');

    }


