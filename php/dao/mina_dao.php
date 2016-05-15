

<?php
require_once 'php/dto/mina.php';
require_once 'php/dto/empleado.php';
class mina_dao{

    public function getIdMinaByCodigo($codigo){

        include('bases.php');

        $consulta="SELECT id FROM mina WHERE codigo=? and estado=1 ";

        $resul=$base->prepare($consulta);

        $resul->execute(array($codigo ));

        foreach ($resul as $row) {

            return $row[0];

        }

    }

    public function cargarMinasEmpleado($empleado){

        include('bases.php');

        $consulta="SELECT mina.id, mina.Nombre, mina.codigo, mina.Direccion FROM mina, empleado
        WHERE empleado.id=? and mina.id=empleado.id_mina and  mina.estado=1 and empleado.estado=1";

        $resul = $base->prepare($consulta);

        $resul->execute(array($empleado->_GET('id') ));

        $minas=array();

        foreach ($resul as $row) {

            $mina=new mina();

            $mina->_SET('nombre_mina',$row['Nombre']);

            $mina->_SET('direccion',$row['Direccion']);

            $mina->_SET('id_mina',$row['id']);

            $mina->_SET('codigo',$row['codigo']);


            $minas[]=$mina;

        }

        return $minas;

    }
    public function cargarMinasEmpleadoSueldo($empleado){

        include('bases.php');

        $consulta="SELECT mina.id, mina.Nombre, mina.codigo, mina.Direccion, empleado.sueldo FROM mina, empleado
        WHERE empleado.id=? and mina.id=empleado.id_mina and  mina.estado=1 and empleado.estado=1";

        $resul = $base->prepare($consulta);

        $resul->execute(array($empleado->_GET('id') ));

        $minas=array();

        foreach ($resul as $row) {

            $mina=new mina();

            $mina->_SET('nombre_mina',$row['Nombre']);

            $mina->_SET('direccion',$row['Direccion']);

            $mina->_SET('id_mina',$row['id']);

            $mina->_SET('codigo',$row['codigo']);

            $mina->_SET('sueldo',$row['sueldo']);


            $minas[]=$mina;

        }

        return $minas;

    }

	public function cargarMinasEncargado(){

		include('bases.php');

    	$consulta="SELECT * FROM mina WHERE mina.id_encargado=? and estado=1 and periodo<>'0 Inactivo'";

    	$resul = $base->prepare($consulta);
		
		$resul->execute(array($_SESSION["id"]));

		$minas=array();

		foreach ($resul as $row) {
				
			$mina=new mina();

			$mina->_SET('nombre_mina',$row['Nombre']);

			$mina->_SET('descripcion',$row['Descripcion']);

			$mina->_SET('id_mina',$row['id']);

			$minas[]=$mina;

			}

			return $minas;

	}

    public function cargarMinasVisitante(){

        include('bases.php');

        $consulta="SELECT * FROM mina WHERE mina.id_visitante=? and estado=1 and periodo<>'0 Inactivo'";

        $resul = $base->prepare($consulta);

        $resul->execute(array($_SESSION["id"]));

        $minas=array();

        foreach ($resul as $row) {

            $mina=new mina();

            $mina->_SET('nombre_mina',$row['Nombre']);

            $mina->_SET('descripcion',$row['Descripcion']);

            $mina->_SET('id_mina',$row['id']);

            $minas[]=$mina;

        }

        return $minas;

    }

	public function cargarEmpleadosMina(){

		include('bases.php');

    	$consulta="SELECT * FROM empleado, empleado_coal
    	WHERE empleado.id_mina=? and empleado_coal.id=empleado.id AND empleado.estado=1";

    	$resul = $base->prepare($consulta);
		
		$resul->execute(array($_SESSION["id_mina"]));

		$empleados=array();

		foreach ($resul as $row) {

			$empleado=new empleado();

			$empleado->_SET('nombre',$row['nombre']);
			$empleado->_SET('id', $row['id']);
            $empleado->_SET('codigo',$row['codigo']);

			$empleados[]=$empleado;

		}

		return $empleados;
		
	}
    public function cargarEmpleadosMinaSinSueldo(){

        include('bases.php');

        $consulta="SELECT * FROM empleado, empleado_coal
    	WHERE empleado.id_mina=? and empleado_coal.id=empleado.id AND empleado.sueldo=0 and empleado.estado=1";

        $resul = $base->prepare($consulta);

        $resul->execute(array($_SESSION["id_mina"]));

        $empleados=array();

        foreach ($resul as $row) {

            $empleado=new empleado();

            $empleado->_SET('nombre',$row['nombre']);
            $empleado->_SET('id', $row['id']);
            $empleado->_SET('codigo',$row['codigo']);

            $empleados[]=$empleado;

        }

        return $empleados;

    }

    public function cargarAllMinas(){

        include('bases.php');

        $consulta="SELECT * FROM mina WHERE estado=1";

        $resul = $base->prepare($consulta);

        $resul->execute();

        $minas=array();

        foreach ($resul as $row) {

            $mina=new mina();

            $mina->_SET('nombre_mina',$row['Nombre']);

            $mina->_SET('direccion',$row['Direccion']);

            $mina->_SET('id_mina',$row['id']);

            $mina->_SET('codigo',$row['codigo']);


            $minas[]=$mina;

        }

        return $minas;
    }

    public function eliminarMina($id){

        include('bases.php');

        $consulta="UPDATE mina set estado=0 WHERE id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id));


    }

    public function cargarAllEmpleados(){

        include('bases.php');

        $consulta="SELECT empleado_coal.id, empleado_coal.codigo, empleado_coal.nombre, empleado_coal.cedula FROM empleado_coal WHERE empleado_coal.estado=1 ";

        $resul = $base->prepare($consulta);

        $resul->execute();

        $empleados=array();

        foreach ($resul as $row) {

            $empleado=new empleado();

            $empleado->_SET('id',$row['id']);
            $empleado->_SET('nombre',$row['nombre']);
            $empleado->_SET('cedula',$row['cedula']);
            $empleado->_SET('codigo',$row['codigo']);
            $empleados[]=$empleado;

        }

        return $empleados;

    }

    public function getEncargadoMina($id_mina){

        include('bases.php');

        $consulta="SELECT empleado_coal.id, empleado_coal.nombre, empleado_coal.cedula FROM empleado_coal, mina
         WHERE mina.id=? and empleado_coal.id=mina.id_encargado";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id_mina));



        foreach ($resul as $row) {

            $empleado=new empleado();

            $empleado->_SET('nombre',$row['nombre']);
            $empleado->_SET('cedula',$row['cedula']);
            $empleado->_SET('id', $row['id']);

            return $empleado;

        }

        return null;

    }
    public function getVisitanteMina($id_mina){

        include('bases.php');

        $consulta="SELECT empleado_coal.id, empleado_coal.nombre, empleado_coal.cedula FROM empleado_coal, mina
         WHERE mina.id=? and empleado_coal.id=mina.id_visitante";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id_mina));



        foreach ($resul as $row) {

            $empleado=new empleado();

            $empleado->_SET('nombre',$row['nombre']);
            $empleado->_SET('cedula',$row['cedula']);
            $empleado->_SET('id', $row['id']);

            return $empleado;

        }

        return null;

    }
    public function asignarEncargadoMina($id_mina, $id_empleado){

        include('bases.php');

        $consulta="UPDATE mina set id_encargado=? WHERE id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id_empleado,$id_mina));

    }
    public function asignarVisitanteMina($id_mina, $id_empleado){

        include('bases.php');

        $consulta="UPDATE mina set id_visitante=? WHERE id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id_empleado,$id_mina));

    }

    public function registrarMina($mina){

        include('bases.php');

        $consulta="INSERT INTO mina (codigo,Nombre,Descripcion, Direccion, estado, periodo) values(?,?,?,?,1,'0 Inactivo')";

        $resul = $base->prepare($consulta);

        $cosa=$resul->execute(array($mina->_GET("codigo"),$mina->_GET("nombre"),$mina->_GET("descripcion"), $mina->_GET("direccion")));

        return $cosa;

    }

    public function cambiarPeriodo($periodo){

        include('bases.php');

        $consulta="UPDATE mina set periodo=? WHERE id=?";

        $resul = $base->prepare($consulta);
        session_start();
        $resul->execute(array($periodo,$_SESSION['id_mina']));

    }

    public function asignarMinaPorCodigo($mina, $empleado){

        include('bases.php');

        $consulta="SELECT id from empleado_coal where codigo=? and estado=?";
        $resul = $base->prepare($consulta);
        $resul->execute(array( $empleado->_GET("codigo"), 1));

        $id="";

        foreach ($resul as $row) {
            $id=$row['id'];

        }


        $consulta="INSERT INTO empleado (id, id_mina, estado) values(?,?,?)";
        $resul = $base->prepare($consulta);
        $resul->execute(array( $id, $mina->_GET("id_mina"), 1));

    }

    public function asignarMinaPorID($mina, $empleado){

        include('bases.php');

        $consulta="INSERT INTO empleado (id, id_mina, estado) values(?,?,?)";
        $resul = $base->prepare($consulta);

        $resul->execute(array( $empleado->_GET('id'), $mina->_GET("id_mina"), 1));

    }

    public function existeMinaAsignada($mina, $empleado){
        include('bases.php');

        $consulta="SELECT * from empleado where id=? and id_mina=?";
        $resul = $base->prepare($consulta);
        $resul->execute(array( $empleado->_GET("id"), $mina->_GET("id_mina")));

        $i=0;
        foreach ($resul as $row) {
            $i++;

        }

        if($i==0)
            return false;
        else
            return true;


    }

    public function activarMinaAsignada($mina, $empleado){

        include('bases.php');

        $consulta="UPDATE empleado set estado=1 WHERE id=? and id_mina=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array( $empleado->_GET('id'), $mina->_GET('id_mina')  ));


    }

}