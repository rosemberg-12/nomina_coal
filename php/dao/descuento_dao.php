<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 26/01/16
 * Time: 04:08 PM
 */

class descuento_dao {

    public function eliminarDescuento($id){
        include('bases.php');

        $consulta="UPDATE descuento set estado=0 WHERE id=?";

        echo $id;

        $resul = $base->prepare($consulta);

        $resul->execute(array($id));
    }

    public function registrarDescuento($descuento){

        include('bases.php');

        $consulta="INSERT INTO descuento (id_mina, id_empleado, periodo, fecha, cantidad, id_tipo_descuento, comentario, estado)
        values(?,?,?,?,?,?,?,1)";

        $resul = $base->prepare($consulta);

        $resul->execute(array(
            $descuento->_GET("mina")->_GET("id_mina"),
            $descuento->_GET("empleado")->_GET("id"),
            $descuento->_GET("periodo"),
            $descuento->_GET("fecha"),
            $descuento->_GET("cantidad"),
            $descuento->_GET("tdescuento")->_GET("id"),
            $descuento->_GET("comentario")
        ));

        return "Registro de descuento exitoso";


    }

    public function getDescuentosEmpleado($empleado){

        include('bases.php');

        $consulta="SELECT DISTINCT descuento.id, descuento.fecha, mina.id, mina.Nombre, tipo_descuento.id, tipo_descuento.nombre
        , tipo_descuento.codigo, descuento.cantidad, descuento.comentario
        FROM empleado, descuento, tipo_descuento, mina
        WHERE descuento.id_mina=mina.id and descuento.id_tipo_descuento=tipo_descuento.id and descuento.estado=1 and
        descuento.periodo=? and descuento.id_empleado=? and descuento.id_mina=?";


        $resul = $base->prepare($consulta);

        $laborDao=new labor_dao();
        $periodo= $laborDao->getPeriodoActual();
        $resul->execute(array( $periodo, $empleado->_GET('id'), $_SESSION['id_mina'] ) ) ;

        $descuentos=array();

        foreach ($resul as $row)
        {

            $descuento=new descuento();

            $descuento->_SET("id",$row[0]);
            $descuento->_SET("fecha",$row[1]);

            $mina=new mina();
            $mina->_SET("id_mina",$row[2]);
            $mina->_SET("nombre",$row[3]);

            $descuento->_SET("mina",$mina);

            $tipo_d=new tipo_descuento();
            $tipo_d->_SET("id",$row[4]);
            $tipo_d->_SET("nombre",$row[5]);
            $tipo_d->_SET("codigo",$row[6]);

            $descuento->_SET("tdescuento",$tipo_d);

            $descuento->_SET("cantidad",$row[7]);
            $descuento->_SET("comentario",$row[8]);

            $descuentos[]=$descuento;

        }

        return $descuentos;

    }

    public function getDescuentosEmpleadoByPeriodoMina($empleado, $mina, $periodo){

        include('bases.php');

        $consulta="SELECT DISTINCT descuento.id, descuento.fecha, mina.id, mina.Nombre, tipo_descuento.id, tipo_descuento.nombre
        , tipo_descuento.codigo, descuento.cantidad, descuento.comentario
        FROM empleado, descuento, tipo_descuento, mina
        WHERE descuento.id_mina=mina.id and descuento.id_tipo_descuento=tipo_descuento.id and descuento.estado=1 and
        descuento.periodo=? and descuento.id_empleado=? and descuento.id_mina=?";


        $resul = $base->prepare($consulta);

        $resul->execute(array( $periodo, $empleado->_GET('id'), $mina ) ) ;

        $descuentos=array();

        foreach ($resul as $row)
        {

            $descuento=new descuento();

            $descuento->_SET("id",$row[0]);
            $descuento->_SET("fecha",$row[1]);

            $mina=new mina();
            $mina->_SET("id_mina",$row[2]);
            $mina->_SET("nombre",$row[3]);

            $descuento->_SET("mina",$mina);

            $tipo_d=new tipo_descuento();
            $tipo_d->_SET("id",$row[4]);
            $tipo_d->_SET("nombre",$row[5]);
            $tipo_d->_SET("codigo",$row[6]);

            $descuento->_SET("tdescuento",$tipo_d);

            $descuento->_SET("cantidad",$row[7]);
            $descuento->_SET("comentario",$row[8]);

            $descuentos[]=$descuento;

        }

        return $descuentos;

    }

} 