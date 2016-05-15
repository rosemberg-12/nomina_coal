<?php

require_once 'php/dto/labor.php';
require_once 'php/dto/empleado.php';
require_once 'php/dto/puesto_trabajo.php';
require_once 'php/dto/tipo_labor.php';
require_once 'php/dao/tipo_labor_dao.php';
require_once 'php/dao/labor_dao.php';
require_once 'php/dto/tipo_descuento.php';
require_once 'php/dto/descuento.php';
require_once 'php/dao/tipo_descuento_dao.php';
require_once 'php/dao/descuento_dao.php';


class control_descuentos{

    public function registrarTipoDescuentos($nombre, $codigo){

        $tipo_descuento=new tipo_descuento();

        $tipo_descuento->_SET('codigo',$codigo);
        $tipo_descuento->_SET('nombre',$nombre);

        $tipo_dao=new tipo_descuento_dao();

        $tipo_dao->registrarTipoDescuento($tipo_descuento);
    }

    public function cargarTipoDescuentos(){

        $tipo_descuento_dao=new tipo_descuento_dao();
        $tipos=$tipo_descuento_dao->cargarTipoDescuentos();
        $campo_t="";

        foreach ($tipos as $row)
        {

            $campo_t.='<tr>
                        <td>'.$row->_GET('codigo').'</td>
                        <td>'.$row->_GET('nombre').'</td>
                        <td><a href="eliminar-td.php?id_td='.$row->_GET('id').'">Eliminar</a>
                      </tr>';

        }
        if( empty($campo_t)){

            return "";
        }

        return $campo_t;

    }

    public function eliminarTipoDescuentos($id){

        $tipo_d_dao=new tipo_descuento_dao();

        $tipo_d_dao->eliminarTipoDescuento($id);


    }


    public function eliminarDescuentos($id){

        $descuento_dao=new descuento_dao();

        $descuento_dao->eliminarDescuento($id);

    }

    public function cargarComboTDescuentos(){
        $tipo_descuento_dao=new tipo_descuento_dao();
        $tipos=$tipo_descuento_dao->cargarTipoDescuentos();
        $campo_t="";

        foreach ($tipos as $row)
        {

            $campo_t.='<option value="'.$row->_GET('id').'">'.$row->_GET('nombre').'</option>';


        }
        if( empty($campo_t)){

            return "";
        }

        return $campo_t;


    }

    public function RegistrarDescuento($t_descuento, $cantidad, $id_empleado, $comentario){

        session_start();

        $mina=new mina();
        $mina->_SET("id_mina",$_SESSION['id_mina']);

        $empleado=new empleado();
        $empleado->_SET("id",$id_empleado);

        $laborDao=new labor_dao();
        $periodo=$laborDao->getPeriodoActual();

        $fecha =date("y")."-".date("m")."-".date("d");

        $tipo_d=new tipo_descuento();

        $tipo_d->_SET("id",$t_descuento);


        $descuento=new descuento();
        $descuento->_SET("mina",$mina);
        $descuento->_SET("empleado",$empleado);
        $descuento->_SET("tdescuento",$tipo_d);
        $descuento->_SET("periodo",$periodo);
        $descuento->_SET("fecha",$fecha);
        $descuento->_SET("cantidad",$cantidad);
        $descuento->_SET("comentario",$comentario);

        $descuentoDao=new descuento_dao();

        return $descuentoDao->registrarDescuento($descuento);


    }

    public function cargarDescuentos($id_empleado,$nombre){


        $empleado=new empleado();
        $empleado->_SET("id",$id_empleado);

        $descuento_dao=new descuento_dao();
        $descuentos_empleado=$descuento_dao->getDescuentosEmpleado($empleado);

        $campo_t="";

        foreach ($descuentos_empleado as $row)
        {

            $campo_t.='<tr>
                        <td>'.$row->_GET('fecha').'</td>
                        <td>'.$row->_GET('tdescuento')->_GET('nombre').'</td>
                        <td>'.$row->_GET('cantidad').'</td>
                        <td>'.$row->_GET('comentario').'</td>
                        <td><a href="eliminar-d.php?id_d='.$row->_GET('id').'&id_e='.$id_empleado.'&nombre='.$nombre.'">Eliminar</a>

                      </tr>';

        }
        if( empty($campo_t)){

            return "";
        }

        return $campo_t;

    }

    public function cargarDescuentosV($id_empleado,$nombre){


        $empleado=new empleado();
        $empleado->_SET("id",$id_empleado);

        $descuento_dao=new descuento_dao();
        $descuentos_empleado=$descuento_dao->getDescuentosEmpleado($empleado);

        $campo_t="";

        foreach ($descuentos_empleado as $row)
        {

            $campo_t.='<tr>
                        <td>'.$row->_GET('fecha').'</td>
                        <td>'.$row->_GET('tdescuento')->_GET('nombre').'</td>
                        <td>'.$row->_GET('cantidad').'</td>
                        <td>'.$row->_GET('comentario').'</td>

                      </tr>';

        }
        if( empty($campo_t)){

            return "";
        }

        return $campo_t;

    }



}