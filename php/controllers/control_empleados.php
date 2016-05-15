<?php
require_once 'php/dto/empleado.php';


/**
 * Created by PhpStorm.
 * User: rosem
 * Date: 10/01/16
 * Time: 11:57 PM
 */

class control_empleados{

    public function cargarEmpleadosGeneral(){

        $mina_dao=new mina_dao();
        $empleados=$mina_dao->cargarAllEmpleados();
        $campo_empleados="";

        foreach ($empleados as $row)
        {

            $campo_empleados.='<tr>
                        <td>'.$row->_GET('nombre').'</td>
                        <td>'.$row->_GET('codigo').'</td>
                        <td>'.$row->_GET('cedula').'</td>
                        <td><a href="eliminar-e.php?id_empleado='.$row->_GET('id').'">Eliminar</a>
                        | <a href="reasignar-empleado.php?id_empleado='.$row->_GET('id').'">Reasignar minas</a>
                        | <a href="asignar-sueldo.php?id_empleado='.$row->_GET('id').'">Asignar sueldo</a></td>

                      </tr>';

        }
        if( empty($campo_empleados)){

            return "No hay empleados";
        }

        return $campo_empleados;


    }

    public function  registrarEmpleado($n,$c,$d,$t,$m,$cod){

    $empleado=new empleado();
    $empleado->_SET("nombre",$n);
    $empleado->_SET("cedula",$c);

    $empleado->_SET("codigo",$cod);
    $empleado->_SET("dir",$d);
    $empleado->_SET("tel",$t);

    $minas= array();

    foreach($m as $row){
        $mina=new mina();
        $mina->_SET("id_mina",$row);
        $minas[]=$mina;

    }

    $empleadoDao=new empleado_dao();

    $empleadoDao->registrarEmpleado($empleado);

    if($this->asignarMinaAEmpleadoByCodigo($empleado, $minas)){
        return "oka";
    }
    else return "paila";


}
    public function  registrarEmpleadoImportar($n,$c,$d,$t,$m,$cod){

        $empleado=new empleado();
        $empleado->_SET("nombre",$n);
        $empleado->_SET("cedula",$c);

        $empleado->_SET("codigo",$cod);
        $empleado->_SET("dir",$d);
        $empleado->_SET("tel",$t);

        $minas= array();

        foreach($m as $row){
            $mina=new mina();
            $minaDao=new mina_dao();
            $id=$minaDao->getIDMinaByCodigo($row);
            $mina->_SET("id_mina",$id);
            $minas[]=$mina;

        }

        $empleadoDao=new empleado_dao();

        $empleadoDao->registrarEmpleado($empleado);

        if($this->asignarMinaAEmpleadoByCodigo($empleado, $minas)){
            return "oka";
        }
        else return "paila";


    }



    public function asignarMinaAEmpleadoByCodigo($empleado, $minas){

        $minaDao=new mina_dao();

        foreach($minas as $mina){


            $minaDao->asignarMinaPorCodigo($mina, $empleado);

        }

        return true;

    }



    public function eliminarEmpleado($id){

        $empleado=new empleado();
        $empleado->_SET("id",$id);

        $empleadoDao=new empleado_dao();


        $empleadoDao->eliminarMinasEmpleado($empleado);

        $empleadoDao->eliminarEmpleado($empleado);


    }

    public function reasigarEmpleado($empleado,$minas){

        $empleadoDao=new empleado_dao();

        $empleadoX= new empleado();
        $empleadoX->_SET('id',$empleado);

        $empleadoDao->eliminarMinasEmpleado($empleadoX);

        foreach($minas as $row){

            $minaDao=new mina_dao();

            $mina= new mina();
            $mina->_SET('id_mina',$row);



            if($minaDao->existeMinaAsignada($mina, $empleadoX )){

                $minaDao->activarMinaAsignada($mina, $empleadoX);

            }
            else{

                $minaDao->asignarMinaPorID($mina, $empleadoX);

                }

        }

    }

}