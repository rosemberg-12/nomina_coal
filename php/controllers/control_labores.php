<?php

require_once 'php/dto/labor.php';
require_once 'php/dto/empleado.php';
require_once 'php/dto/puesto_trabajo.php';
require_once 'php/dto/tipo_labor.php';
require_once 'php/dao/tipo_labor_dao.php';
require_once 'php/dao/labor_dao.php';

class control_labores{

	public function registrarLabor($l1,$l2,$concepto,$mantoS,$identificador,$cantidad,$comentario,$empleadoo){

		$empleado=new empleado();
		$empleado->_SET("id",$empleadoo);

		$puesto_trabajo=new puesto_trabajo();
		$puesto_trabajo->_SET("id",$identificador);


		$tipo_labor=new tipo_labor();
		$tipo_labor->_SET("id",$concepto);


		$labor=new labor();
		$labor->_SET("cantidad",$cantidad);
		$labor->_SET("tipo_labor",$tipo_labor);
		$labor->_SET("puesto_trabajo",$puesto_trabajo);

		$labor_dao=new labor_dao();

		return $labor_dao->registrar_labor($labor, $empleado,$comentario);

	}

    public function registrarLaborJornal($l1,$l2,$mantoS,$identificador,$cantidad,$comentario,$empleadoo, $precio){

        $labor_dao=new labor_dao();

        $id=$labor_dao->getIdTipoLaborEspecial($l1,$l2);

        $empleado=new empleado();
        $empleado->_SET("id",$empleadoo);

        $puesto_trabajo=new puesto_trabajo();
        $puesto_trabajo->_SET("id",$identificador);



        $tipo_labor=new tipo_labor();
        $tipo_labor->_SET("id",$id);


        $labor=new labor();
        $labor->_SET("cantidad",$cantidad);
        $labor->_SET("tipo_labor",$tipo_labor);
        $labor->_SET("puesto_trabajo",$puesto_trabajo);
        $labor->_SET("costo",$precio*$cantidad);


        return $labor_dao->registrar_laborJornal($labor, $empleado,$comentario);

    }

	public function cargarLabores($id_empleado){

		$campo_labores="";

		$empleado=new empleado();
		$empleado->_SET("id",$id_empleado);	

		$labor_dao=new labor_dao();
		$labores_empleado=$labor_dao->getLaboresEmpleado($empleado);

		foreach($labores_empleado as $row){


		$campo_labores.='<tr>
                        <td>'.$row->_GET('fecha').'</td>
                        <td>'.'Manto '.$row->_GET("puesto_trabajo")->_GET("manto")->_GET('nombre').'</td>
                        <td>'.$row->_GET('tipo_labor')->_GET('concepto_labor').'</td>
                        <td>'.$row->_GET('costo').'</td>
                        <td><a href="verDetalles.php?id='.$row->_GET('id').'&nombre='.$_GET['nombre'].'&id_emp='.$_GET['id'].'">ver detalles</a></td>
                      </tr>';

        }

        return $campo_labores;

	}


    public function cargarLaboresV($id_empleado){

        $campo_labores="";

        $empleado=new empleado();
        $empleado->_SET("id",$id_empleado);

        $labor_dao=new labor_dao();
        $labores_empleado=$labor_dao->getLaboresEmpleado($empleado);

        foreach($labores_empleado as $row){


            $campo_labores.='<tr>
                        <td>'.$row->_GET('fecha').'</td>
                        <td>'.'Manto '.$row->_GET("puesto_trabajo")->_GET("manto")->_GET('nombre').'</td>
                        <td>'.$row->_GET('tipo_labor')->_GET('concepto_labor').'</td>
                        <td>'.$row->_GET('costo').'</td>
                        <td><a href="verDetallesV.php?id='.$row->_GET('id').'&nombre='.$_GET['nombre'].'&id_emp='.$_GET['id'].'">ver detalles</a></td>
                      </tr>';

        }

        return $campo_labores;

    }

    public function cargarDetallesLabor($id_labor){

		$labor= new labor();

		$labor->_SET("id",$id_labor);

		$labor_dao=new labor_dao();

		$labor_dao->getLabor($labor);

		$vector= array();


        $vector[]=$labor->_GET("tipo_labor")->_GET("tipo_labor");
        $vector[]=$labor->_GET("tipo_labor")->_GET("subtipo_labor");
        $vector[]=$labor->_GET("tipo_labor")->_GET("concepto_labor");
		$vector[]=$labor->_GET("puesto_trabajo")->_GET("manto")->_GET("nombre");
		$vector[]=$labor->_GET("puesto_trabajo")->_GET("tipo_puesto_trabajo")->_GET("nombre");
		$vector[]=$labor->_GET("puesto_trabajo")->_GET("nombre");
		$vector[]=$labor->_GET("cantidad");
        $vector[]=$labor->_GET("comentario");
        $vector[]=$labor->_GET("costo");

		return $vector;

	}

    public function registrarTipoLabor($l1,$l2,$concepto,$cantidad,$mina){

    $tipolaborDAO=new tipo_labor_dao();

    $tipoLabor=new tipo_labor();
    $tipoLabor->_SET("tipo_labor",$l1);
    $tipoLabor->_SET("subtipo_labor",$l2);
    $tipoLabor->_SET("concepto_labor",$concepto);
    $tipoLabor->_SET("precio_unidad",$cantidad);
    $minaa=new mina();
    $minaa->_SET("id_mina",$mina);
    $tipoLabor->_SET("mina",$minaa);

    $tipolaborDAO->registrarTipoLabor($tipoLabor);

    }

    public function registrarTipoLabor2($l1,$l2,$concepto,$cantidad,$mina, $manto){

        $tipolaborDAO=new tipo_labor_dao();

        $tipoLabor=new tipo_labor();
        $tipoLabor->_SET("tipo_labor",$l1);
        $tipoLabor->_SET("subtipo_labor",$l2);
        $tipoLabor->_SET("concepto_labor",$concepto);
        $tipoLabor->_SET("precio_unidad",$cantidad);
        $minaa=new mina();
        $minaa->_SET("id_mina",$mina);
        $mantoo=new manto();
        $mantoo->_SET("id",$manto);
        $tipoLabor->_SET("mina",$minaa);
        $tipoLabor->_SET("manto",$mantoo);
        $tipolaborDAO->registrarTipoLabor2($tipoLabor);

    }

    public function cargarTiposLaboresMina($id_mina){

        $tipolaborDAO=new tipo_labor_dao();
        $tipos_labores=$tipolaborDAO->getTiposLaboresMina($id_mina);

        $campo_t_labores="";

        foreach ($tipos_labores as $row)
        {

            $campo_t_labores.='<tr>
                        <td>'.$row->_GET('tipo_labor').'</td>
                        <td>'.$row->_GET('subtipo_labor').'</td>
                        <td>'.$row->_GET('concepto_labor').'</td>
                        <td>'.$row->_GET('precio_unidad').'</td>
                        <td>'.$row->_GET('manto').'</td>
                        <td><a href="eliminar-tipo-l.php?id_mina='.$id_mina.'&id_tipo_labor='.$row->_GET('id').'">Eliminar</a> /
                        <a href="cambiar-costo.php?id_mina='.$id_mina.'&id_tipo_labor='.$row->_GET('id').'">Cambiar Costo</a></td>
                      </tr>';

        }
        if( empty($campo_t_labores)){

            return "";
        }

        return $campo_t_labores;

    }

    public function eliminarTipoLabor($id_tipo){
        $tipo=new tipo_labor_dao();

        $tipo->eliminarTipoLabor($id_tipo);
    }

    public function cambiarCosto($id_tipo,$cant ){
        $tipo=new tipo_labor_dao();

        $tipo->cambiarCosto($id_tipo,$cant);
    }
    public function getConceptosLabores($l1,$l2,$m){
        $laborDAO=new tipo_labor_dao();
        $vector_t_labores=$laborDAO->getConceptosLabores($l1,$l2,$m);

        $cadena="";

        foreach ($vector_t_labores as $row) {

            $cadena.='<option value="'.$row->_GET('id').'">'.$row->_GET('concepto_labor').'</option>';

        }

        if(empty($cadena)){
            return "<option value=''>No existen aun creados</option>";
        }
        return $cadena;
    }

    public function cargarMantoLabor($labor){

        $tipo_l=new tipo_labor_dao();

        $manto=$tipo_l->cargarMantoLabor($labor);

        if($manto!=null){

            return '<option value="'.$manto->_GET('id').'">Manto '.$manto->_GET('nombre').'</option>';

        }

        return "";
    }

}