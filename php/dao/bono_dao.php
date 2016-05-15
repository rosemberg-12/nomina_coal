<?php
/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 26/01/16
 * Time: 04:08 PM
 */

class bono_dao {

    public function eliminarBono($id){
        include('bases.php');

        $consulta="UPDATE bono set estado=0 WHERE id=?";

        echo $id;

        $resul = $base->prepare($consulta);

        $resul->execute(array($id));
    }

    /**
     * Metodo que registra un bono
     * @param $bono el bono a registrar
     *
     */
    public function registrarBono($bono){

        include('bases.php');

        $consulta="INSERT INTO bono (id_mina, id_empleado, periodo, fecha, cantidad, id_tipo_bono, comentario, estado)
        values(?,?,?,?,?,?,?,1)";

        $resul = $base->prepare($consulta);

        $resul->execute(array(
            $bono->_GET("mina")->_GET("id_mina"),
            $bono->_GET("empleado")->_GET("id"),
            $bono->_GET("periodo"),
            $bono->_GET("fecha"),
            $bono->_GET("cantidad"),
            $bono->_GET("tbono")->_GET("id"),
            $bono->_GET("comentario")
        ));

        return "Registro de bonos exitoso";


    }

    public function getBonosEmpleado($empleado){

        include('bases.php');

        $consulta="SELECT DISTINCT bono.id, bono.fecha, mina.id, mina.Nombre, tipo_bono.id, tipo_bono.nombre
        , tipo_bono.codigo, bono.cantidad, bono.comentario
        FROM empleado, bono, tipo_bono, mina
        WHERE bono.id_mina=mina.id and bono.id_tipo_bono=tipo_bono.id and bono.estado=1 and
        bono.periodo=? and bono.id_empleado=? and bono.id_mina=?";


        $resul = $base->prepare($consulta);

        $laborDao=new labor_dao();
        $periodo= $laborDao->getPeriodoActual();
        $resul->execute(array( $periodo, $empleado->_GET('id'), $_SESSION['id_mina'] ) ) ;

        $bonos=array();

        foreach ($resul as $row)
        {

            $bono=new bono();

            $bono->_SET("id",$row[0]);
            $bono->_SET("fecha",$row[1]);

            $mina=new mina();
            $mina->_SET("id_mina",$row[2]);
            $mina->_SET("nombre",$row[3]);

            $bono->_SET("mina",$mina);

            $tipo_d=new tipo_bono();
            $tipo_d->_SET("id",$row[4]);
            $tipo_d->_SET("nombre",$row[5]);
            $tipo_d->_SET("codigo",$row[6]);

            $bono->_SET("tbono",$tipo_d);

            $bono->_SET("cantidad",$row[7]);
            $bono->_SET("comentario",$row[8]);

            $bonos[]=$bono;

        }

        return $bonos;

    }

    public function getBonosEmpleadoByPeriodoMina($empleado, $mina, $periodo){

        include('bases.php');

        $consulta="SELECT DISTINCT bono.id, bono.fecha, mina.id, mina.Nombre, tipo_bono.id, tipo_bono.nombre
        , tipo_bono.codigo, bono.cantidad, bono.comentario
        FROM empleado, bono, tipo_bono, mina
        WHERE bono.id_mina=mina.id and bono.id_tipo_bono=tipo_bono.id and bono.estado=1 and
        bono.periodo=? and bono.id_empleado=? and bono.id_mina=?";


        $resul = $base->prepare($consulta);


        $resul->execute(array( $periodo, $empleado->_GET('id'), $mina ) ) ;

        $bonos=array();

        foreach ($resul as $row)
        {

            $bono=new bono();

            $bono->_SET("id",$row[0]);
            $bono->_SET("fecha",$row[1]);

            $mina=new mina();
            $mina->_SET("id_mina",$row[2]);
            $mina->_SET("nombre",$row[3]);

            $bono->_SET("mina",$mina);

            $tipo_d=new tipo_bono();
            $tipo_d->_SET("id",$row[4]);
            $tipo_d->_SET("nombre",$row[5]);
            $tipo_d->_SET("codigo",$row[6]);

            $bono->_SET("tbono",$tipo_d);

            $bono->_SET("cantidad",$row[7]);
            $bono->_SET("comentario",$row[8]);

            $bonos[]=$bono;

        }

        return $bonos;

    }

} 