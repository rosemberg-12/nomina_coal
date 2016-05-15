<?php 
require_once 'php/dao/empleado_dao.php';
require_once 'php/dao/mina_dao.php';
require_once 'php/dao/labor_dao.php';
require_once 'php/dao/manto_dao.php';
require_once 'php/dto/manto.php';
require_once 'php/dto/empleado.php';
require_once 'php/dao/tipo_puesto_trabajo_dao.php';
require_once 'php/dao/puesto_trabajo_dao.php';
require_once 'php/dto/puesto_trabajo.php';
class control_mina{


	public function cargarEmpleados()
	{

		$mina_dao=new mina_dao();
		$empleados=$mina_dao->cargarEmpleadosMinaSinSueldo();
		$campo_empleados="";

		foreach ($empleados as $row) 
		{

			$labor_dao=new labor_dao();
			$labores_empleado=$labor_dao->getLaboresEmpleado($row);

            $descuento_dao=new descuento_dao();
            $descuentos_empleado=$descuento_dao->getDescuentosEmpleado($row);

            $bono_dao=new bono_dao();
            $bonos_empleado=$bono_dao->getbonosEmpleado($row);

			$monto= $this->calcularMontoLabores($labores_empleado);
            $monto2= $this->calcularMontoDescuentos($descuentos_empleado);
            $monto3= $this->calcularMontoDescuentos($bonos_empleado);

            $total=( ( ($monto)-($monto*0.08) )+ $monto3 ) - $monto2;

            $campo_empleados.='<tr>
                        <td>'.$row->_GET('nombre').'</td>
                        <td>'.count($labores_empleado).' | '.$monto.'</td>
                        <td>'.count($descuentos_empleado).' | '.$monto2.'</td>
                        <td>'.count($bonos_empleado).' | '.$monto3.'</td>
                        <td>'.$total.'</td>
                        <td><a href="registrarNomina.php?id='.$row->_GET('id').'">Registrar labor</a> |
                        <a href="verNomina.php?id='.$row->_GET('id').'&nombre='.$row->_GET('nombre').'">Ver labores</a> <br>
                        <a href="registrarDescuento.php?id='.$row->_GET('id').'">Registrar descuento</a> |
                        <a href="verDescuentos.php?id='.$row->_GET('id').'&nombre='.$row->_GET('nombre').'">Ver descuentos</a><br>
                        <a href="registrarBonos.php?id='.$row->_GET('id').'">Registrar bonos</a> |
                        <a href="verBonos.php?id='.$row->_GET('id').'&nombre='.$row->_GET('nombre').'">Ver bonos</a>
                        </td>
                      </tr>';

		}
		if( empty($campo_empleados)){

			return "No hay empleados";
		}

		return $campo_empleados;

	}

    public function cargarEmpleadosV()
    {

        $mina_dao=new mina_dao();
        $empleados=$mina_dao->cargarEmpleadosMina();
        $campo_empleados="";

        foreach ($empleados as $row)
        {

            $labor_dao=new labor_dao();
            $labores_empleado=$labor_dao->getLaboresEmpleado($row);

            $descuento_dao=new descuento_dao();
            $descuentos_empleado=$descuento_dao->getDescuentosEmpleado($row);

            $bono_dao=new bono_dao();
            $bonos_empleado=$bono_dao->getbonosEmpleado($row);

            $monto= $this->calcularMontoLabores($labores_empleado);
            $monto2= $this->calcularMontoDescuentos($descuentos_empleado);
            $monto3= $this->calcularMontoDescuentos($bonos_empleado);

            $total=( ( ($monto)-($monto*0.08) )+ $monto3 ) - $monto2;

            $campo_empleados.='<tr>
                        <td>'.$row->_GET('nombre').'</td>
                        <td>'.count($labores_empleado).' | '.$monto.'</td>
                        <td>'.count($descuentos_empleado).' | '.$monto2.'</td>
                        <td>'.count($bonos_empleado).' | '.$monto3.'</td>
                        <td>'.$total.'</td>
                        <td>
                        <a href="verNominaV.php?id='.$row->_GET('id').'&nombre='.$row->_GET('nombre').'">Ver labores  </a>
                        |<a href="verDescuentosV.php?id='.$row->_GET('id').'&nombre='.$row->_GET('nombre').'">  Ver descuentos  </a>
                        | <a href="verBonosV.php?id='.$row->_GET('id').'&nombre='.$row->_GET('nombre').'">  Ver bonos  </a>
                        </td>
                      </tr>';

        }
        if( empty($campo_empleados)){

            return "No hay empleados";
        }

        return $campo_empleados;

    }

    public function calcularMontoLabores($vector_labores){

		$monto=0;
		
		foreach($vector_labores as $labor){

			$monto+=$labor->_GET('costo');

	}

		return $monto;

	}
    public function calcularMontoDescuentos($vector_d){

        $monto=0;

        foreach($vector_d as $d){

            $monto+=$d->_GET('cantidad');

        }

        return $monto;

    }

	public function cargarMantos(){

		$manto_dao=new manto_dao();
		$mantos=$manto_dao->getAllMantos();

		$concat="<option value>Seleccione uno</option>";
		
		foreach ($mantos as $row ) {
			
			$concat.='<option value="'.$row->_GET('id').'">Manto '.$row->_GET('nombre').'</option>';

		}
		if(empty($concat)){
			return "<option value=''>No hay mantos</option>";
		}
		return $concat;

	}

	public function cargarTiposPuestoTrabajo(){

		$tipos_pt= new tipo_puesto_trabajo_dao();
		$tipos_puestos_trabajo=$tipos_pt->cargarTiposPuestoTrabajo();

		$concat="";
		
		foreach ($tipos_puestos_trabajo as $row ) {
			if($row->_GET('id')!=0)
			$concat.='<option value="'.$row->_GET('id').'">'.$row->_GET('nombre').'</option>';

		}
		if(empty($concat)){
			return "<option value=''>No hay tipos cargados</option>";
		}
		return $concat;

	}

	public function getPuestosByTipoLugar($var,$var2){

		$puesto_t_dao=new puesto_trabajo_dao();

		$vector_puestos=$puesto_t_dao->getPuestosByTipo($var,$var2);

		$cadena="";

		foreach ($vector_puestos as $row) {

			$cadena.='<option value="'.$row->_GET('id').'">'.$row->_GET('nombre').'</option>';

		}

		if(empty($cadena)){
			return "<option value=''>No existen aun creados</option>";
		}
		return $cadena;

	}

    public function cargarAllMinas(){

        $minasDao=new mina_dao();

        $minas=$minasDao->cargarAllMinas();

        $campo_minas="";

        foreach ($minas as $row)
        {


            $campo_minas.='<tr>
                        <td>'.$row->_GET('codigo').'</td>
                        <td>'.$row->_GET('nombre_mina').'</td>
                        <td>'.$row->_GET('direccion').'</td>
                        <td>
                        <a href="asignarEncargado.php?id='.$row->_GET('id_mina').'&nombre='.$row->_GET('nombre_mina').'">Asignar encargado</a>  |
                         <a href="asignarVisitante.php?id='.$row->_GET('id_mina').'&nombre='.$row->_GET('nombre_mina').'">Asignar visitante</a>  |
                         <br><a href="administrar-mantos.php?id_mina='.$row->_GET('id_mina').'&nombre_m='.$row->_GET('nombre_mina').'">Admin mantos</a> |
                        <a href="cierre-sistema.php?id_mina='.$row->_GET('id_mina').'&nombre_m='.$row->_GET('nombre_mina').'">Admin periodo</a> |
                        <a href="eliminarMina.php?id='.$row->_GET('id_mina').'">Eliminar</a>
                        </td>
                      </tr>';

        }
        if( empty($campo_minas)){

            return "No hay minas";
        }

        return $campo_minas;

    }

    public function eliminarMina($id){

        $minaDao=new mina_dao();

        $minaDao->eliminarMina($id);

    }

    public function cargarAllEmpleados($id_mina){

        $mina_dao=new mina_dao();
        $empleados=$mina_dao->cargarAllEmpleados();
        $campo_empleados="";

        foreach ($empleados as $row)
        {

            $campo_empleados.='<tr>
                        <td>'.$row->_GET('nombre').'</td>
                        <td>'.$row->_GET('cedula').'</td>
                        <td><a href="asignar-e.php?id_mina='.$id_mina.'&id_empleado='.$row->_GET('id').'">Asignar</a></td>
                      </tr>';

        }
        if( empty($campo_empleados)){

            return "No hay empleados";
        }

        return $campo_empleados;


    }

    public function cargarAllEmpleadosAsignarInvitados($id_mina){

        $mina_dao=new mina_dao();
        $empleados=$mina_dao->cargarAllEmpleados();
        $campo_empleados="";

        foreach ($empleados as $row)
        {

            $campo_empleados.='<tr>
                        <td>'.$row->_GET('nombre').'</td>
                        <td>'.$row->_GET('cedula').'</td>
                        <td><a href="asignar-i.php?id_mina='.$id_mina.'&id_empleado='.$row->_GET('id').'">Asignar</a></td>
                      </tr>';

        }
        if( empty($campo_empleados)){

            return "No hay empleados";
        }

        return $campo_empleados;


    }

    public function validarAsigadoMina($id_mina){

        $minaDao=new mina_dao();
        $empleado=$minaDao->getEncargadoMina($id_mina);

        if(isset($empleado)){

            return "El empleado asignado a esta mina es <b>".$empleado->_GET('nombre').",</b> Con cedula <b>".$empleado->_GET('cedula')."</b>";

        }

        return "<b>Esta mina no tiene ningun empleado asignado</b>";

    }
    public function validarVisitanteMina($id_mina){

        $minaDao=new mina_dao();
        $empleado=$minaDao->getVisitanteMina($id_mina);

        if(isset($empleado)){

            return "El visitante asignado a esta mina es <b>".$empleado->_GET('nombre').",</b> Con cedula <b>".$empleado->_GET('cedula')."</b>";

        }

        return "<b>Esta mina no tiene ningun empleado visitante</b>";

    }

    public function asignarEncargado($id_mina, $id_empleado){

        $minaDao=new mina_dao();
        $minaDao->asignarEncargadoMina($id_mina, $id_empleado);

    }

    public function asignarVisitantes($id_mina, $id_empleado){

        $minaDao=new mina_dao();
        $minaDao->asignarVisitanteMina($id_mina, $id_empleado);

    }

    public function registrarMina($id,$n,$d,$dir){

        $minaDao=new mina_dao();
        $mina=new mina();
        $mina->_SET('codigo',$id);
        $mina->_SET('nombre',$n);
        $mina->_SET('descripcion',$d);
        $mina->_SET('direccion',$dir);

        return $minaDao->registrarMina($mina);


    }

    public function registrarTPT($id,$n){

        $tpt_dao=new tipo_puesto_trabajo_dao();
        $tpt=new tipo_puesto_trabajo();

        $tpt->_SET('id',$id);
        $tpt->_SET('nombre',$n);


        return $tpt_dao->registrarTPT($tpt);


    }

    public function cargarMinasRegistrarEstudiante(){
        $minasDao=new mina_dao();

        $minas=$minasDao->cargarAllMinas();

        $campo_minas="";

        foreach ($minas as $row)
        {


            $campo_minas.='<tr>
                        <td>'.$row->_GET('nombre_mina').'</td>
                        <td>'.$row->_GET('direccion').'</td>
                        <td><input type="checkbox" name="mina[]" value="'.$row->_GET('id_mina').'">
                        </tr>';

        }
        if( empty($campo_minas)){

            return "No hay minas";

        }

        return $campo_minas;

    }

    public function cargarMinasAdministrarLabores(){
        $minasDao=new mina_dao();

        $minas=$minasDao->cargarAllMinas();

        $campo_minas="";

        foreach ($minas as $row)
        {


            $campo_minas.='<tr>
                        <td>'.$row->_GET('nombre_mina').'</td>
                        <td>'.$row->_GET('direccion').'</td>
                        <td><input type="radio" name="mina" value="'.$row->_GET('id_mina').'" required>
                        </tr>';

        }
        if( empty($campo_minas)){

            return "No hay minas";

        }

        return $campo_minas;

    }

    public function cargarMinasReasignar($idEmp){
        $minasDao=new mina_dao();

        $minas=$minasDao->cargarAllMinas();

        $empleado=new empleado();
        $empleado->_SET('id',$idEmp);

        $minasE=$minasDao->cargarMinasEmpleado($empleado);

        $campo_minas="";

        foreach ($minas as $row)
        {

        if($this->estaLaMina($minasE,$row))
            {
                $campo_minas.='<tr>
                            <td>'.$row->_GET('codigo').'</td>
                            <td>'.$row->_GET('nombre_mina').'</td>
                            <td>'.$row->_GET('direccion').'</td>
                            <td><input type="checkbox" name="mina[]" value="'.$row->_GET('id_mina').'" checked>
                            </tr>';
            }
        else{
            $campo_minas.='<tr>
                            <td>'.$row->_GET('codigo').'</td>
                            <td>'.$row->_GET('nombre_mina').'</td>
                            <td>'.$row->_GET('direccion').'</td>
                            <td><input type="checkbox" name="mina[]" value="'.$row->_GET('id_mina').'">
                            </tr>';

            }
        }
        if( empty($campo_minas)){

            return "No hay minas";

        }

        return $campo_minas;

    }

    public function cargarMinasAsignarSueldo($idEmp){
        $minasDao=new mina_dao();

        $empleado=new empleado();
        $empleado->_SET('id',$idEmp);

        $minasE=$minasDao->cargarMinasEmpleadoSueldo($empleado);

        $campo_minas="";

        foreach ($minasE as $row)
        {

            if($this->estaLaMina($minasE,$row))
            {
                $campo_minas.='<tr>
                            <td>'.$row->_GET('codigo').'</td>
                            <td>'.$row->_GET('nombre_mina').'</td>
                            <td>'.$row->_GET('direccion').'</td>
                             <td>'.$row->_GET('sueldo').'</td>
                            <td><input type="radio" name="mina" value="'.$row->_GET('id_mina').'" required>
                            </tr>';
            }
            else{
                $campo_minas.='<tr>
                            <td>'.$row->_GET('codigo').'</td>
                            <td>'.$row->_GET('nombre_mina').'</td>
                            <td>'.$row->_GET('direccion').'</td>
                             <td>'.$row->_GET('sueldo').'</td>
                              <td><input type="radio" name="mina" value="'.$row->_GET('id_mina').'" required>
                            </tr>';

            }
        }
        if( empty($campo_minas)){

            return "No hay minas";

        }

        return $campo_minas;

    }


    public function estaLaMina($vectorMinas,$mina){

        foreach($vectorMinas as $row){

            if($row->_GET('id_mina')==$mina->_GET('id_mina'))
                return true;

        }

        return false;

    }



    public function cargarMantosMina($id,$nombre){

        $manto_dao=new manto_dao();
        $_SESSION['id_mina']=$id;
        $mantos=$manto_dao->getAllMantos();

        $concat="";

        foreach ($mantos as $row ) {

            $concat.='<tr>
                        <td>'.$row->_GET('nombre').'</td>
                        <td><a href="administrar-m.php?id_manto='.$row->_GET('id').'&nombre_manto='.$row->_GET('nombre').'&id_mina='.$id.'&nombre_mina='.$nombre.'">Administrar puestos de trabajo</a>
                        / <a href="eliminar-manto.php?id_manto='.$row->_GET('id').'&id_mina='.$id.'&nombre_mina='.$nombre.'">Eliminar Manto</a> </td>

                      </tr>';
        }
        if(empty($concat)){
            return "";
        }
        return $concat;


    }

    public function registrarManto($nombre,$id_mina){

        $manto=new manto();

        $manto->_SET("nombre",$nombre);

        $manto->_SET("id_mina",$id_mina);

        $mantoDao=new manto_dao();

        return $mantoDao->registrarManto($manto);


    }

    public  function  eliminarManto($id_manto){
        $mantoDao=new manto_dao();

        $mantoDao->eliminarManto($id_manto);

    }

    public function cargarPuestosTrabajoMina($id_mina,$nombre_manto, $id_manto,$nombre_m){

        $puestoTrabajoDao=new puesto_trabajo_dao();

        $puestos=$puestoTrabajoDao->cargarPuestosTrabajoMina($id_manto);

        $concat="";

        foreach($puestos as $row){

            $concat.='<tr>
                        <td>'.$row->_GET('nombre1').'</td>
                        <td>'.$row->_GET('nombre2').'</td>
                        <td>'.$row->_GET('nombre3').'</td>
                        <td><a href="eliminar-p.php?id_puesto='.$row->_GET('id').'&id_mina='.$id_mina.'&nombre_mina='.$nombre_m.'&id_manto='.$id_manto.'&nombre_manto='.$nombre_manto.'">Eliminar</a> </td>
                      </tr>';
        }

        if(empty($concat)){
            return "";
        }
        return $concat;


    }

    public function cargarPuestosTrabajoLabor($id_manto){

        $puestoTrabajoDao=new puesto_trabajo_dao();

        $puestos=$puestoTrabajoDao->cargarPuestosTrabajoMina($id_manto);

        $concat='';

        foreach($puestos as $row){

            $concat.='<tr>
                        <td>'.$row->_GET('tipo_puesto_trabajo1')->_GET('nombre').' '.$row->_GET('nombre1').'</td>
                        <td>'.$row->_GET('tipo_puesto_trabajo2')->_GET('nombre').' '.$row->_GET('nombre2').'</td>
                        <td>'.$row->_GET('tipo_puesto_trabajo3')->_GET('nombre').' '.$row->_GET('nombre3').'</td>
                      <td><input type="radio" name="identificador" value="'.$row->_GET('id').'" required>
                      </tr>';
        }

        if(empty($concat)){
            return "No hay puestos de trabajo registrados";
        }
        return '<table id="empleados" class="table table-bordered table-hover">
                                      <thead>
                                      <tr>
                                          <th>Nombre del lugar 1</th>
                                          <th>Nombre del lugar2</th>
                                          <th>Nombre del lugar 3</th>
                                          <th>accion</th>
                                      </tr>
                                      </thead>
                                      <tbody id="tablita">'.$concat.'                                          </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>Nombre del lugar 1</th>
                                          <th>Nombre del lugar2</th>
                                          <th>Nombre del lugar 3</th>
                                          <th>accion</th>
                                      </tr>
                                      </tfoot>
                                  </table>';


    }

    public function registrarPuestoTrabajo($nombre1,$id_tipo_p1,$nombre2,$id_tipo_p2,$nombre3,$id_tipo_p3,$id_manto){

        $puesto_trabajo= new puesto_trabajo();
        $puesto_trabajo->_SET('nombre1',$nombre1);
        $puesto_trabajo->_SET('nombre2',$nombre2);
        $puesto_trabajo->_SET('nombre3',$nombre3);

        $manto=new manto();
        $manto->_SET('id',$id_manto);

        $tipo_puesto_t1=new tipo_puesto_trabajo();
        $tipo_puesto_t1->_SET('id',$id_tipo_p1);

        $tipo_puesto_t2=new tipo_puesto_trabajo();
        $tipo_puesto_t2->_SET('id',$id_tipo_p2);

        $tipo_puesto_t3=new tipo_puesto_trabajo();
        $tipo_puesto_t3->_SET('id',$id_tipo_p3);

        $puesto_trabajo->_SET('tipo_puesto_trabajo1',$tipo_puesto_t1);
        $puesto_trabajo->_SET('tipo_puesto_trabajo2',$tipo_puesto_t2);
        $puesto_trabajo->_SET('tipo_puesto_trabajo3',$tipo_puesto_t3);

        $puesto_trabajo->_SET('manto',$manto);

        $puesto_t_dao=new puesto_trabajo_dao();

        return $puesto_t_dao->registrarPuesto($puesto_trabajo);
    }

    public function eliminarPuestoT($id_puesto){

        $puesto_t_dao=new puesto_trabajo_dao();
        $puesto_t_dao->eliminarPuestoT($id_puesto);

    }
    public function validarPeriodoActual(){
        $laborDao=new labor_dao();
        $periodo= $laborDao->getPeriodoActual();
        return $periodo;
    }

    public function cargarPeriodos(){

        $laborDao=new labor_dao();

        $periodos=$laborDao->cargarPeriodos();

        $campo_minas="";

        foreach ($periodos as $row)
        {


            $campo_minas.='<tr>
                        <td>'.$row.'</td>
                        <td><input type="radio" name="periodo" value="'.$row.'" required>
                        </tr>';

        }
        if( empty($campo_minas)){

            return "No hay periodos";

        }

        return $campo_minas;

    }

    public function cargarPeriodosSelect(){

        $laborDao=new labor_dao();

        $periodos=$laborDao->cargarPeriodos();

        $campo_minas="<option>Seleccione un periodo</option>";

        foreach ($periodos as $row)
        {

            if( !strcmp($row, "0 Inactivo") == 0)
            $campo_minas.='<option value='.$row.'>'.$row.'</option>';

        }
        if( empty($campo_minas)){

            return "No hay periodos";

        }

        return $campo_minas;

    }

    public function cambiarPeriodo($periodo){
        $minaDao=new mina_dao();

        $minaDao->cambiarPeriodo($periodo);
    }


    public function cargarMinasSelect()
    {

        $mina_dao=new mina_dao();
        $minas=$mina_dao->cargarAllMinas();
        $campo_mina="<option>Seleccione una mina</option>";
        foreach ($minas as $row) {

            $campo_mina.='<option value='.$row->_GET('id_mina').'>'.$row->_GET('nombre_mina').'</option>';

        }
        if( empty($campo_mina)){

            $campo_mina='<option>No hay minas creadas</option>';


    }
        return $campo_mina;


    }

    public function getIdManto($mina, $nombreManto){

        $manto_dao=new manto_dao();

        return $manto_dao->getIdManto($mina, $nombreManto);


    }

    public function cargarTiposLabor(){

        $laborD=new labor_dao();
        $tiposL=$laborD->cargarTiposLabor();
        $concat="<option value>Seleccione uno</option>";

        foreach ($tiposL as $row ) {

            $concat.='<option value="'.$row.'">'.$row.'</option>';

        }
        if(empty($concat)){
            return "<option value=''>No hay Tipos de labores</option>";
        }
        return $concat;

    }

    public function cargarSubtiposLabor(){

        $laborD=new labor_dao();
        $tiposL=$laborD->cargarSubtiposLabor();
        $concat="<option value>Seleccione uno</option>";

        foreach ($tiposL as $row ) {

            $concat.='<option value="'.$row.'">'.$row.'</option>';

        }
        if(empty($concat)){
            return "<option value=''>No hay Tipos de labores</option>";
        }
        return $concat;

    }

    public function asignarSueldo($id_emp, $id_mina, $sueldo){

        $empleado=new empleado();
        $empleado->_SET('id',$id_emp);

        $mina=new mina();
        $mina->_SET("id_mina",$id_mina);

        $empleado_dao=new empleado_dao();
        $empleado_dao->asignarSueldo($empleado,$mina,$sueldo);



    }
}