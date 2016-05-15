<?php 
require_once 'php/dao/empleado_dao.php';
require_once 'php/dao/mina_dao.php';
require_once 'php/dto/empleado.php';
class control_sesion{

    public function cambiarContrasena($codigo_cliente, $contrasena, $nueva_contrasena){

        $empleadoDao=new empleado_dao();

        $emp=new empleado();

        $emp->_SET("cedula",$codigo_cliente);
        $emp->_SET("contrasena", $contrasena);

        $emp=$empleadoDao->cargarDatosEmpleado($emp);


        if($emp!=null){

            return $empleadoDao->cambiarContrasena($emp, $nueva_contrasena);


        }
        return null;

    }


	public function validarInicioSesion($empleado, $tipo)
	{

		$empleado_dao= new empleado_dao();

		$empleado=$empleado_dao->cargarDatosEmpleado($empleado);

		if($empleado==null)
		{
			return false;
		}

		session_start();
        $_SESSION["cedula"]=$empleado->_GET('cedula');
        $_SESSION["id"]=$empleado->_GET('id');
        $_SESSION["nombre"]=$empleado->_GET('nombre');
        $_SESSION['tipo']=$tipo;

        if($tipo==1){
            return "Location: pick-mina.php";
        }
        if($tipo==2){
            return "Location: pick-minaV.php";
        }

	}

    public function validarInicioSesionAdmin($empleado, $tipo)
    {

        $empleado_dao= new empleado_dao();

        $empleado=$empleado_dao->cargarDatosEmpleadoAdmin($empleado, $tipo);

        if($empleado==null)
        {
            return false;
        }

        session_start();
        $_SESSION["user"]="Admin";
        $_SESSION['tipo']=$tipo;

        if($tipo==1){
            return "Location: administrar-mina.php";
        }
        if($tipo==2){
            return "Location: exportar.php";
        }

    }

	public function cargarMinas()
	{

		$mina_dao=new mina_dao();
		$minas=$mina_dao->cargarMinasEncargado();
		$campo_mina="";
		foreach ($minas as $row) {

			$campo_mina.=' <div class="col-md-6">
                         <div class="small-box bg-yellow">
                            <div class="inner">
                                  <h2>'. $row->_GET('nombre_mina').'</h2>
                                  <p>'.$row->_GET('descripcion').'</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-ios-folder-outline"></i>
                            </div>

                            <a href="indexUser.php?id='.$row->_GET('id_mina').'" class="small-box-footer">
                              Acceder <i class="fa fa-arrow-circle-right"></i>
                            </a>
                         </div>
                        </div>';

		}
		if( empty($campo_mina)){

			return '<div class="col-xs-12">
                            <div class="box">

                                <div class="box-body">
                                    <div style="text-align: center;"><b>No hay minas asignadas a este usuario</b> </div>
                                </div>
                            </div>
                        </div>';
		}

		return $campo_mina;
	}
    public function cargarMinasVisitante()
    {

        $mina_dao=new mina_dao();
        $minas=$mina_dao->cargarMinasVisitante();
        $campo_mina="";
        foreach ($minas as $row) {

            $campo_mina.=' <div class="col-md-6">
                         <div class="small-box bg-yellow">
                            <div class="inner">
                                  <h2>'. $row->_GET('nombre_mina').'</h2>
                                  <p>'.$row->_GET('descripcion').'</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-ios-folder-outline"></i>
                            </div>

                            <a href="indexUserV.php?id='.$row->_GET('id_mina').'" class="small-box-footer">
                              Acceder <i class="fa fa-arrow-circle-right"></i>
                            </a>
                         </div>
                        </div>';

        }
        if( empty($campo_mina)){

            return '<div class="col-xs-12">
                            <div class="box">

                                <div class="box-body">
                                    <div style="text-align: center;"><b>No hay minas asignadas a este usuario</b> </div>
                                </div>
                            </div>
                        </div>';
        }

        return $campo_mina;
    }


}	