<?php


/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 25/01/16
 * Time: 04:30 PM
 */

class tipo_bono_dao {

    public function eliminarTipoBono($id){

        include('bases.php');

        $consulta="UPDATE tipo_bono set estado=0 WHERE id=?";

        echo $id;

        $resul = $base->prepare($consulta);

        $resul->execute(array($id));
    }

    public function registrarTipoBono($tipo_bono){

        include('bases.php');

        $consulta="INSERT INTO tipo_bono (codigo, nombre, estado) values(?,?,1)";

        $resul = $base->prepare($consulta);

        $resul->execute(array($tipo_bono->_GET("codigo"),$tipo_bono->_GET("nombre")));

        return "Registro de tipo de bono exitoso";

    }


    public function cargarTipoBonos(){

        include('bases.php');

        $consulta="SELECT * FROM tipo_bono WHERE estado=1";

        $resul = $base->prepare($consulta);

        $resul->execute();

        $tipos=array();

        foreach ($resul as $row) {

            $tipo=new tipo_bono();


            $tipo->_SET('id',$row['id']);
            $tipo->_SET('codigo',$row['codigo']);
            $tipo->_SET('nombre',$row['nombre']);


            $tipos[]=$tipo;

        }

        return $tipos;


    }


} 