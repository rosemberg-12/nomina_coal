<?php
require_once 'php/facade/facade.php';

if( isset($_POST['nombre1'])&& isset($_POST['tipo_p1']) &&
    isset($_POST['nombre_mina']) && isset($_POST['id_mina']) && isset($_POST['nombre_manto']) && isset($_POST['id_manto']) )
{

    $n1=0;
    $n2=0;
    $n3;
    $id1;
    $id2;
    $id3;

    $n1=$_POST['nombre1'];
    $id1=$_POST['tipo_p1'];

    if(isset($_POST['nombre1'])&& isset($_POST['tipo_p1'])){
        $n1=$_POST['nombre1'];
        $id1=$_POST['tipo_p1'];
    }

    if(isset($_POST['nombre2'])&& isset($_POST['tipo_p2'])){
        $n2=$_POST['nombre2'];
        $id2=$_POST['tipo_p2'];
    }

    if(isset($_POST['nombre3'])&& isset($_POST['tipo_p3'])){
        $n3=$_POST['nombre3'];
        $id3=$_POST['tipo_p3'];
    }


	 $facade = new facade();

    $cadena=$facade->registrarPuestoTrabajo($_POST['nombre1'], $_POST['tipo_p1'],$_POST['nombre2'], $_POST['tipo_p2'],
        $_POST['nombre3'], $_POST['tipo_p3'],$_POST['id_manto']);
    echo $cadena;

     header('Location: administrar-m.php?id_mina='.$_POST['id_mina'].'&nombre_mina='.$_POST['nombre_mina'].'&nombre_manto='.$_POST['nombre_manto'].'&id_manto='.$_POST['id_manto']);
}


