<?php


/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 25/01/16
 * Time: 04:30 PM
 */

class tipo_descuento_dao {

    public function eliminarTipoDescuento($id){

        include('bases.php');

        $consulta="UPDATE tipo_descuento set estado=0 WHERE id=?";

        echo $id;

        $resul = $base->prepare($consulta);

        $resul->execute(array($id));
    }

    public function registrarTipoDescuento($tipo_descuento){

        include('bases.php');

        $consulta="INSERT INTO tipo_descuento (codigo, nombre, estado) values(?,?,1)";

        $resul = $base->prepare($consulta);

        $resul->execute(array($tipo_descuento->_GET("codigo"),$tipo_descuento->_GET("nombre")));

        return "Registro de tipo de descuento exitoso";

    }


    public function cargarTipoDescuentos(){

        include('bases.php');

        $consulta="SELECT * FROM tipo_descuento WHERE estado=1";

        $resul = $base->prepare($consulta);

        $resul->execute();

        $tipos=array();

        foreach ($resul as $row) {

            $tipo=new tipo_descuento();


            $tipo->_SET('id',$row['id']);
            $tipo->_SET('codigo',$row['codigo']);
            $tipo->_SET('nombre',$row['nombre']);


            $tipos[]=$tipo;

        }

        return $tipos;


    }


} 