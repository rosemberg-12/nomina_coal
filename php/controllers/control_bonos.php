<?php

require_once 'php/dto/labor.php';
require_once 'php/dto/empleado.php';
require_once 'php/dto/puesto_trabajo.php';
require_once 'php/dto/tipo_labor.php';
require_once 'php/dao/tipo_labor_dao.php';
require_once 'php/dao/labor_dao.php';
require_once 'php/dto/tipo_bono.php';
require_once 'php/dto/bono.php';
require_once 'php/dao/tipo_bono_dao.php';
require_once 'php/dao/bono_dao.php';
require_once 'php/dto/tipo_bono.php';
require_once 'php/dto/bono.php';
require_once 'php/dao/tipo_bono_dao.php';
require_once 'php/dao/bono_dao.php';


class control_bonos{

    public function registrarTipoBonos($nombre, $codigo){

        $tipo_bono=new tipo_bono();

        $tipo_bono->_SET('codigo',$codigo);
        $tipo_bono->_SET('nombre',$nombre);

        $tipo_dao=new tipo_bono_dao();

        $tipo_dao->registrarTipoBono($tipo_bono);
    }

    public function cargarTipoBonos(){

        $tipo_bono_dao=new tipo_bono_dao();
        $tipos=$tipo_bono_dao->cargarTipobonos();
        $campo_t="";

        foreach ($tipos as $row)
        {

            $campo_t.='<tr>
                        <td>'.$row->_GET('codigo').'</td>
                        <td>'.$row->_GET('nombre').'</td>
                        <td><a href="eliminar-tb.php?id_td='.$row->_GET('id').'">Eliminar</a>
                      </tr>';

        }
        if( empty($campo_t)){

            return "";
        }

        return $campo_t;

    }

    public function eliminarTipobonos($id){

        $tipo_d_dao=new tipo_bono_dao();

        $tipo_d_dao->eliminarTipobono($id);


    }


    public function eliminarbonos($id){

        $bono_dao=new bono_dao();

        $bono_dao->eliminarBono($id);

    }

    public function cargarComboTBono(){
        $tipo_bono_dao=new tipo_bono_dao();
        $tipos=$tipo_bono_dao->cargarTipoBonos();
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

    public function RegistrarBono($t_bono, $cantidad, $id_empleado, $comentario){

        session_start();

        $mina=new mina();
        $mina->_SET("id_mina",$_SESSION['id_mina']);

        $empleado=new empleado();
        $empleado->_SET("id",$id_empleado);

        $laborDao=new labor_dao();
        $periodo=$laborDao->getPeriodoActual();

        $fecha =date("y")."-".date("m")."-".date("d");

        $tipo_b=new tipo_bono();

        $tipo_b->_SET("id",$t_bono);


        $bono=new bono();
        $bono->_SET("mina",$mina);
        $bono->_SET("empleado",$empleado);
        $bono->_SET("tbono",$tipo_b);
        $bono->_SET("periodo",$periodo);
        $bono->_SET("fecha",$fecha);
        $bono->_SET("cantidad",$cantidad);
        $bono->_SET("comentario",$comentario);

        $bonoDao=new bono_dao();

        return $bonoDao->registrarBono($bono);


    }

    public function cargarBonos($id_empleado,$nombre){


        $empleado=new empleado();
        $empleado->_SET("id",$id_empleado);

        $bono_dao=new bono_dao();
        $bonos_empleado=$bono_dao->getBonosEmpleado($empleado);

        $campo_t="";

        foreach ($bonos_empleado as $row)
        {

            $campo_t.='<tr>
                        <td>'.$row->_GET('fecha').'</td>
                        <td>'.$row->_GET('tbono')->_GET('nombre').'</td>
                        <td>'.$row->_GET('cantidad').'</td>
                        <td>'.$row->_GET('comentario').'</td>
                        <td><a href="eliminar-b.php?id_d='.$row->_GET('id').'&id_e='.$id_empleado.'&nombre='.$nombre.'">Eliminar</a>

                      </tr>';

        }
        if( empty($campo_t)){

            return "";
        }

        return $campo_t;

    }


    public function cargarBonosV($id_empleado,$nombre){


        $empleado=new empleado();
        $empleado->_SET("id",$id_empleado);

        $bono_dao=new bono_dao();
        $bonos_empleado=$bono_dao->getBonosEmpleado($empleado);

        $campo_t="";

        foreach ($bonos_empleado as $row)
        {

            $campo_t.='<tr>
                        <td>'.$row->_GET('fecha').'</td>
                        <td>'.$row->_GET('tbono')->_GET('nombre').'</td>
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