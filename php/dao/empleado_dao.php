<?php 
require_once 'php/dto/empleado.php';

class empleado_dao{

    public function cambiarContrasena($cliente, $n){

        include('bases.php');

        $consulta= "UPDATE empleado_coal set contrasena=?  where id=? ";

        $resul = $base->prepare($consulta);

        $resul->execute(array( $n , $cliente->_GET('id') ));

        return true;
    }

    public function asignarSueldo($empleado,$mina,$sueldo){

        include('bases.php');

        $consulta="UPDATE empleado set sueldo=? WHERE id_mina=? and id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($sueldo, $mina->_GET('id_mina'),$empleado->_GET('id')));

    }

	public function cargarDatosEmpleado($empleado){

	include('bases.php');

		$consulta= "SELECT * FROM empleado_coal WHERE empleado_coal.cedula=? AND empleado_coal.contrasena=? and empleado_coal.estado=1";

		$resul = $base->prepare($consulta);

		$resul->execute(array($empleado->_GET('cedula'), $empleado->_GET('contrasena')));


		if( $resul->fetchColumn()> 0) {

         	$resul = $base->prepare($consulta);

			$resul->execute(array($empleado->_GET('cedula'), $empleado->_GET('contrasena')));

			foreach ($resul as $row) {
				$empleado->_SET('nombre',$row["nombre"]);
				$empleado->_SET('id',$row["id"]);
			}
			return $empleado;

		}
		else
			return null;
	}

    public function cargarDatosEmpleadoAdmin($empleado,$tipo){

        include('bases.php');

        $consulta= 'SELECT * FROM administrador WHERE user= ? AND pass=? AND tipo=?';

        $resul = $base->prepare($consulta);

        $resul->execute(array($empleado->_GET('cedula'), $empleado->_GET('contrasena') , $tipo));


        if( $resul->rowCount()> 0) {

            return true;

        }
        else{
            return null;
        }
    }

    public function getEmpleadosGeneral(){

       include('bases.php');

        $consulta="SELECT * FROM empleado_coal WHERE empleado_coal.estado=1";

        $resul = $base->prepare($consulta);

        $resul->execute();

        $empleados=array();

        foreach ($resul as $row) {

            $empleado=new empleado();

            $empleado->_SET('nombre',$row['nombre']);
            $empleado->_SET('id', $row['id']);

            $empleados[]=$empleado;

        }

        return $empleados;

    }

    /**Falta por revisar
     * @param $empleado
     * @return string
     */
    public function registrarEmpleado($empleado){
        include('bases.php');
        $consulta="INSERT INTO empleado_coal (nombre, contrasena ,cedula,direccion,telefono, estado, codigo) values(?,?,?,?,?,?,?)";

        $resul = $base->prepare($consulta);

        $resul->execute(array( $empleado->_GET("nombre"), $empleado->_GET("cedula"), $empleado->_GET("cedula"), $empleado->_GET("dir"), $empleado->_GET("tel"), 1 , $empleado->_GET("codigo") ));

        return "Registro de la mina exitoso";
    }

    /**Falta por revisar
     * @param $e
     */
    public function eliminarEmpleado($e){

      include('bases.php');

$consulta="UPDATE empleado_coal set estado=0 WHERE id=?";

$resul = $base->prepare($consulta);

$resul->execute(array($e->_GET('id')));
}

    public function eliminarMinasEmpleado($e){
        include('bases.php');

        $consulta="UPDATE empleado set estado=0 WHERE id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($e->_GET('id')));
    }


    public function reasignar($empleado, $mina){

      include('bases.php');

        $consulta="UPDATE empleado set id_mina=? WHERE id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($mina, $empleado));

    }

}