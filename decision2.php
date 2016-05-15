<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 9/01/16
 * Time: 05:25 PM
 */
require_once 'php/facade/facade.php';



if(isset($_POST['mina'])){



    $facade=new facade();

    $estado=$facade->importarMinas($_FILES["archivo"]);

    if($estado==1){
    header('Location: exportar.php?estado=mina');
    }
    else{

    header('Location: exportar.php?estado='.$estado);
    }
}

elseif(isset($_POST['empleado'])){



    $facade=new facade();

    $estado=$facade->importarEmpleados($_FILES["archivo"]);

    if($estado==1){
        header('Location: exportar.php?estado=empleado');
    }
    else{

        header('Location: exportar.php?estado='.$estado);
    }
}

elseif(isset($_POST['tdescuento'])){



    $facade=new facade();

    $estado=$facade->importarTDescuento($_FILES["archivo"]);

    if($estado==1){
        header('Location: exportar.php?estado=tdescuento');
    }
    else{

        header('Location: exportar.php?estado='.$estado);
    }
}

elseif(isset($_POST['tbonos'])){



    $facade=new facade();

    $estado=$facade->importarTBonos($_FILES["archivo"]);

    if($estado==1){
        header('Location: exportar.php?estado=tbonos');
    }
    else{

        header('Location: exportar.php?estado='.$estado);
    }
}

elseif(isset($_POST['manto'])){



    $facade=new facade();

    $estado=$facade->importarMantos($_FILES["archivo"]);

    if($estado==1){
        header('Location: exportar.php?estado=manto');
    }
    else{

        header('Location: exportar.php?estado='.$estado);
    }
}

elseif(isset($_POST['tptrabajo'])){


    $facade=new facade();

    $estado=$facade->importarTiposPTrabajo($_FILES["archivo"]);

    if($estado==1){
        header('Location: exportar.php?estado=tpt');
    }
    else{

        header('Location: exportar.php?estado='.$estado);
    }
}

elseif(isset($_POST['ptrabajo'])){


    $facade=new facade();

    $estado=$facade->importarPTrabajo($_FILES["archivo"]);

    if($estado==1){
        header('Location: exportar.php?estado=pt');
    }
    else{

        header('Location: exportar.php?estado='.$estado);
    }
}

elseif(isset($_POST['l1'])){


    $facade=new facade();

    $estado=$facade->importarTlabores1($_FILES["archivo"]);

    if($estado==1){
        header('Location: exportar.php?estado=l1');
    }
    else{

        header('Location: exportar.php?estado='.$estado);
    }
}

elseif(isset($_POST['l2'])){


    $facade=new facade();

    $estado=$facade->importarTlabores2($_FILES["archivo"]);

    if($estado==1){
        header('Location: exportar.php?estado=l2');
    }
    else{

        header('Location: exportar.php?estado='.$estado);
    }
}

elseif(isset($_POST['r1'])){
    $facade=new facade();
    $periodo=$_POST['periodoo'];
    $mina=$_POST['minaa'];
    $estado=$facade->exportarTLaboresMina($mina,$periodo);
    header("Content-Disposition: attachment; filename=labores-nombremina-$periodo.txt");
    header ("Content-Type: application/force-download");
    echo $estado;
}

elseif(isset($_POST['r2'])){




    $facade=new facade();

    $periodo=$_POST['periodoo'];
    $mina=$_POST['minaa'];

    $estado=$facade->exportarTDescuentosMina($mina,$periodo);

    header("Content-Disposition: attachment; filename=descuentos-esperanza-$periodo.txt");
    header ("Content-Type: application/force-download");
    echo $estado;

}

elseif(isset($_POST['r3'])){




    $facade=new facade();

    $periodo=$_POST['periodoo'];
    $mina=$_POST['minaa'];

    $estado=$facade->exportarTBonosMina($mina,$periodo);

    header("Content-Disposition: attachment; filename=bonos-esperanza-$periodo.txt");
    header ("Content-Type: application/force-download");
    echo $estado;

}

else{
    echo "nada";
}
