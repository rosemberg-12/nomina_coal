<?php
require_once 'php/controllers/control_sesion.php';
require_once 'php/controllers/control_mina.php';
require_once 'php/controllers/control_labores.php';
require_once 'php/controllers/control_empleados.php';
require_once 'php/controllers/control_descuentos.php';
require_once 'php/controllers/control_bonos.php';
require_once 'php/controllers/control_cvs.php';
class facade{

	public function iniciarSesion($empleado, $tipo)
	{
		$controlador=new control_sesion();
		return $controlador->validarInicioSesion($empleado, $tipo) ;
	}
    public function iniciarSesionAdmin($empleado,$tipo)
    {
        $controlador=new control_sesion();
        return $controlador->validarInicioSesionAdmin($empleado, $tipo) ;
    }
	public function cargarMinas()
	{
		$controlador=new control_sesion();
		return $controlador->cargarMinas();
	}
    public function cargarMinasVisitante()
    {
        $controlador=new control_sesion();
        return $controlador->cargarMinasVisitante();
    }
    public function cargarMinasSelect()
    {
        $controlador=new control_mina();
        return $controlador->cargarMinasSelect();
    }
	public function cargarEmpleados(){
		$controlador=new control_mina();
		return $controlador->cargarEmpleados();
	}
    public function cargarEmpleadosV(){
        $controlador=new control_mina();
        return $controlador->cargarEmpleadosV();
    }
	public function cargarMantos(){
		$controlador=new control_mina();
		return $controlador->cargarMantos();
	}
	public function cargarTiposPuestoTrabajo(){
		$controlador=new control_mina();
		return $controlador->cargarTiposPuestoTrabajo();
	}
	public function getPuestosByTipoLugar($var,$var2){
		$controlador=new control_mina();
		return $controlador->getPuestosByTipoLugar($var,$var2);
	}
    public function registrarLabor($l1,$l2,$concepto,$mantoS,$identificador,$cantidad,$comentario, $empleado){
        $controlador=new control_labores();
		return $controlador->registrarLabor($l1,$l2,$concepto,$mantoS,$identificador,$cantidad,$comentario, $empleado);
	}
	public function cargarLabores($id_empleado){
		$controlador= new control_labores();
		return $controlador->cargarLabores($id_empleado);
	}
    public function cargarLaboresV($id_empleado){
        $controlador= new control_labores();
        return $controlador->cargarLaboresV($id_empleado);
    }

	public function cargarDetallesLabor($id_labor){
		$controlador= new control_labores();
		return $controlador->cargarDetallesLabor($id_labor);
	}
    public function cargarAllMinas(){
        $controlador= new control_mina();

        return $controlador->cargarAllMinas();
    }
    public function eliminarMina($id){
        $controlador= new control_mina();
        return $controlador->eliminarMina($id);
    }
    public function cargarAllEmpleados($id){
        $controlador= new control_mina();
        return $controlador->cargarAllEmpleados($id);
    }
    public function cargarAllEmpleadosAsignarInvitados($id){
        $controlador= new control_mina();
        return $controlador->cargarAllEmpleadosAsignarInvitados($id);
    }
    public function validarAsigadoMina($id_mina){
        $controlador= new control_mina();
        return $controlador->validarAsigadoMina($id_mina);
    }
    public function validarVisitanteMina($id_mina){
        $controlador= new control_mina();
        return $controlador->validarVisitanteMina($id_mina);
    }
    public function asignarEncargado($id_mina,$id_empleado){
        $controlador= new control_mina();
        return $controlador->asignarEncargado($id_mina,$id_empleado);

    }
    public function asignarVisitantes($id_mina,$id_empleado){
        $controlador= new control_mina();
        return $controlador->asignarVisitantes($id_mina,$id_empleado);

    }
    public function registrarMina($id,$n,$d,$dir){
        $controlador=new control_mina();
        return $controlador->registrarMina($id,$n,$d,$dir);
    }
    public function cargarEmpleadosGeneral(){
        $controlador=new control_empleados();
        return $controlador->cargarEmpleadosGeneral();
    }
    public function cargarMinasRegistrarEmpleado(){
        $controlador= new control_mina();

        return $controlador->cargarMinasRegistrarEstudiante();
    }
    public function cargarMinasAdministrarLabores(){
        $controlador= new control_mina();

        return $controlador->cargarMinasAdministrarLabores();
    }
    public function cargarMinasReasignar($idEmp){

        $controlador= new control_mina();
        return $controlador->cargarMinasReasignar($idEmp);

    }
    public function cargarMinasAsignarSueldo($idEmp){

        $controlador= new control_mina();
        return $controlador->cargarMinasAsignarSueldo($idEmp);

    }
    public function registrarEmpleado($n,$c,$d,$t,$m,$cod){
        $controlador=new control_empleados();
        $controlador->registrarEmpleado($n,$c,$d,$t,$m,$cod);
    }
    public function eliminarEmpleado($id){
        $controlador=new control_empleados();
        $controlador->eliminarEmpleado($id);
    }
    public function cargarMantosMina($id,$nombre){

        $controlador=new control_mina();
        return $controlador->cargarMantosMina($id,$nombre);

    }
    public function registrarManto($nombre,$id_mina){
        $controlador=new control_mina();
        return $controlador->registrarManto($nombre,$id_mina);
    }
    public function eliminarManto($id_manto){
        $controlador=new control_mina();
        return $controlador->eliminarManto($id_manto);
    }
    public function cargarPuestosTrabajoMina($id_mina,$nombre_manto, $id_manto,$nombre_m){

        $controlador=new control_mina();
        return $controlador->cargarPuestosTrabajoMina($id_mina,$nombre_manto, $id_manto,$nombre_m);

    }

    public function cargarPuestosTrabajoLabor( $id_manto){

        $controlador=new control_mina();
        return $controlador->cargarPuestosTrabajoLabor($id_manto);

    }

    public function registrarPuestoTrabajo($nombre1,$id_tipo_p1,$nombre2,$id_tipo_p2,$nombre3,$id_tipo_p3,$id_manto){
        $controlador=new control_mina();
        return $controlador->registrarPuestoTrabajo($nombre1,$id_tipo_p1,$nombre2,$id_tipo_p2,$nombre3,$id_tipo_p3,$id_manto);
    }
    public function eliminarPuestoT($id_puesto){
        $controlador=new control_mina();
        return $controlador->eliminarPuestoT($id_puesto);
    }
    public function registrarTipoLabor($l1,$l2,$concepto,$cantidad,$mina){
        $controlador=new control_labores();
        $controlador->registrarTipoLabor($l1,$l2,$concepto,$cantidad,$mina);
    }
    public function registrarTipoLabor2($l1,$l2,$concepto,$cantidad,$mina,$manto){
        $controlador=new control_labores();
        $controlador->registrarTipoLabor2($l1,$l2,$concepto,$cantidad,$mina,$manto);
    }

    public function cargarTiposLaboresMina($id_mina){
        $controlador=new control_labores();
        return $controlador->cargarTiposLaboresMina($id_mina);
    }

    public function eliminarTipoLabor($id_tipo){
        $controlador=new control_labores();
        return $controlador->eliminarTipoLabor($id_tipo);
    }

    public function cambiarCosto($id_tipo, $cant){
        $controlador=new control_labores();
        return $controlador->cambiarCosto($id_tipo,$cant);
    }

    public function getConceptosLabores($var,$var2,$var3){
        $controlador=new control_labores();
        return $controlador->getConceptosLabores($var,$var2,$var3);
    }

    public function cargarMantoLabor($labor){
        $controlador=new control_labores();
        return $controlador->cargarMantoLabor($labor);
    }

    public function registrarLaborJornal($l1,$l2,$mantoS,$identificador,$cantidad,$comentario, $empleado, $precio){
        $controlador=new control_labores();
        return $controlador->registrarLaborJornal($l1,$l2,$mantoS,$identificador,$cantidad,$comentario, $empleado,$precio);
    }

    public function reasignarEmpleado($empleado,$mina){
        $controlador=new control_empleados();
        return $controlador->reasigarEmpleado($empleado,$mina);
    }
    public function validarPeriodoActual(){
        $controlador=new control_mina;
        return $controlador->validarPeriodoActual();
    }

    public function cargarPeriodos(){
        $controlador=new control_mina;
        return $controlador->cargarPeriodos();
    }

    public function cambiarPeriodo($periodo){
        $controlador=new control_mina;
        return $controlador->cambiarPeriodo($periodo);
    }

    public function cargarTipoDescuentos(){
        $controlador=new control_descuentos;
        return $controlador->cargarTipoDescuentos();
    }

    public function registrarTipoDescuento($nombre, $codigo){
        $controlador=new control_descuentos;
        return $controlador->registrarTipoDescuentos($nombre, $codigo);
    }

    public function eliminarTipoDescuento($id){
        $controlador=new control_descuentos;
        return $controlador->eliminarTipoDescuentos($id);
    }

    public function cargarComboTBonos(){
        $controlador=new control_bonos;
        return $controlador->cargarComboTBono();
    }

    public function cargarComboTDescuentos(){
        $controlador=new control_descuentos();
        return $controlador->cargarComboTDescuentos();
    }

    public function registrarDescuento($t_descuento, $cantidad, $empleado, $comentario){
        $controlador=new control_descuentos;
        return $controlador->registrarDescuento($t_descuento, $cantidad, $empleado, $comentario);

    }

    public function cargarDescuento($id_empleado, $nombre){
        $controlador=new control_descuentos;
        return $controlador->cargarDescuentos($id_empleado,$nombre);

    }

    public function cargarDescuentoV($id_empleado, $nombre){
        $controlador=new control_descuentos;
        return $controlador->cargarDescuentosV($id_empleado,$nombre);

    }
    public function eliminarDescuento($id){
        $controlador=new control_descuentos;
        return $controlador->eliminarDescuentos($id);
    }

    public function registrarBono($t_bono, $cantidad, $empleado, $comentario){
        $controlador=new control_bonos();
        return $controlador->registrarBono($t_bono, $cantidad, $empleado, $comentario);

    }

    public function cargarBonos($id_empleado, $nombre){
        $controlador=new control_bonos();
        return $controlador->cargarBonos($id_empleado,$nombre);

    }
    public function cargarBonosV($id_empleado, $nombre){
        $controlador=new control_bonos();
        return $controlador->cargarBonosV($id_empleado,$nombre);

    }

    public function eliminarBono($id){
        $controlador=new control_bonos();
        return $controlador->eliminarBonos($id);
    }

    public function cargarTipoBonos(){
        $controlador=new control_bonos();
        return $controlador->cargarTipoBonos();
    }
    public function registrarTipoBonos($nombre, $codigo){
        $controlador=new control_bonos();
        return $controlador->registrarTipoBonos($nombre, $codigo);
    }

    public function eliminarTipoBono($id){
        $controlador=new control_bonos;
        return $controlador->eliminarTipoBonos($id);
    }

    public function importarMinas($archivo){
        $controlador=new control_cvs();
        return $controlador->importarMina($archivo);
    }

    public function importarEmpleados($archivo){
        $controlador=new control_cvs();
        return $controlador->importarEmpleados($archivo);
    }

    public function importarTDescuento($archivo){
        $controlador=new control_cvs();
        return $controlador->importarTDescuento($archivo);
    }


    public function importarTBonos($archivo){
        $controlador=new control_cvs();
        return $controlador->importarTBonos($archivo);
    }

    public function importarMantos($archivo){
        $controlador=new control_cvs();
        return $controlador->importarMantos($archivo);
    }

    public function importarTiposPTrabajo($archivo){
        $controlador=new control_cvs();
        return $controlador->importarTiposPTrabajo($archivo);
    }

    public function importarPTrabajo($archivo){
        $controlador=new control_cvs();
        return $controlador->importarPTrabajo($archivo);
    }

    public function exportarTLaboresMina($mina, $periodo){
        $controlador=new control_cvs();
        return $controlador->exportarTLaboresMina($mina, $periodo);
    }

    public function exportarTDescuentosMina($mina, $periodo){
        $controlador=new control_cvs();
        return $controlador->exportarTDescuentosMina($mina, $periodo);
    }

    public function exportarTBonosMina($mina, $periodo){
        $controlador=new control_cvs();
        return $controlador->exportarTBonosMina($mina, $periodo);
    }

    public function cargarPeriodosSelect(){
        $controlador=new control_mina;
        return $controlador->cargarPeriodosSelect();
    }
    public function importarTlabores1($archivo){
        $controlador=new control_cvs();
        return $controlador->importarTLabores1($archivo);
    }
    public function importarTLabores2($archivo){
        $controlador=new control_cvs();
        return $controlador->importarTlabores2($archivo);
    }
    public function cargarTiposLabor(){
        $controlador=new control_mina();
        return $controlador->cargarTiposLabor();
    }
    public function cargarSubtiposLabor(){
        $controlador=new control_mina();
        return $controlador->cargarSubtiposLabor();
    }

    public function asignarSueldo($id_emp, $id_mina, $sueldo){
        $controlador=new control_mina();
        return $controlador->asignarSueldo($id_emp, $id_mina, $sueldo);
    }
    public function cambiarContrasena($codigo_cliente, $contrasena, $nueva_contrasena){

        $contra=new control_sesion();
        return $contra->cambiarContrasena($codigo_cliente, $contrasena, $nueva_contrasena);

    }


}