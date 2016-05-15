<?php 
require_once 'php/dto/empleado.php';
require_once 'php/dto/labor.php';
require_once 'php/dto/manto.php';
require_once 'php/dto/puesto_trabajo.php';
require_once 'php/dto/tipo_puesto_trabajo.php';
require_once 'php/dto/tipo_labor.php';

class labor_dao{

    public function getIdTipoLaborEspecial($l1,$l2){

        include('bases.php');
        $consulta="SELECT id FROM tipo_labor WHERE tipo_labor=? and subtipo_labor=? and estado=1 ";

        $resul=$base->prepare($consulta);

        $resul->execute(array($l1, $l2));

        foreach ($resul as $row) {

            return $row[0];

        }

    }

	public function     getLaboresEmpleado($empleado){
include('bases.php');

    	$consulta="SELECT DISTINCT labor.id, labor.fecha, manto.Nombre, t1.nombre, puesto_trabajo.nombre1,t2.nombre,
        puesto_trabajo.nombre2, t3.nombre, puesto_trabajo.nombre3, tipo_labor.id, tipo_labor.tipo_labor, tipo_labor.subtipo_labor,
        tipo_labor.concepto_labor, labor.precio, labor.cantidad

        FROM empleado, puesto_trabajo, tipo_labor, manto, labor, tipo_puesto_trabajo t1, tipo_puesto_trabajo t2,
        tipo_puesto_trabajo t3

        WHERE labor.id_empleado=? and tipo_labor.id=labor.id_tipo_labor and puesto_trabajo.id=labor.id_puesto and t1.id=puesto_trabajo.id_puesto_trabajo1 and
        t2.id=puesto_trabajo.id_puesto_trabajo2 and t3.id=puesto_trabajo.id_puesto_trabajo3 and puesto_trabajo.estado=1 and
        manto.id=puesto_trabajo.id_manto and manto.id_mina=? and labor.periodo=?";


    	$resul = $base->prepare($consulta);

        $laborDao=new labor_dao();
        $periodo= $laborDao->getPeriodoActual();
		$resul->execute(array( $empleado->_GET('id'),$_SESSION['id_mina'],$periodo ) ) ;

		$labores=array();

		foreach ($resul as $row) 
		{

			$labor=new labor();
			$labor->_SET('id',$row[0]);
			$labor->_SET('fecha',$row[1]);
			$labor->_SET('cantidad',$row['cantidad']);
            $labor->_SET('costo',$row['precio']);

            $tipo=new tipo_labor();

            $tipo->_SET("id",$row["id"]);
            $tipo->_SET("tipo_labor",$row["tipo_labor"]);
            $tipo->_SET("subtipo_labor",$row["subtipo_labor"]);
            $tipo->_SET("concepto_labor",$row["concepto_labor"]);
            $tipo->_SET("precio_unidad",$row["precio"]);

			$labor->_SET('tipo_labor',$tipo);

			$manto=new manto();
			$manto->_SET('nombre',$row[2]);

			$puesto_trabajo=new puesto_trabajo();
			$puesto_trabajo->_SET('nombre',$row[4]);

			$tipo_puesto_trabajo=new tipo_puesto_trabajo();
			$tipo_puesto_trabajo->_SET('nombre',$row[3]);
			
			$puesto_trabajo->_SET('manto',$manto);
			$puesto_trabajo->_SET('tipo_puesto_trabajo',$tipo_puesto_trabajo);

			$labor->_SET('puesto_trabajo',$puesto_trabajo);

			$labores[]=$labor;
			
		}

		return $labores;

	}
    public function getLaboresEmpleadoByPeriodoMina($empleado,$mina,$periodo){
        include('bases.php');



        $consulta="SELECT DISTINCT labor.id, labor.fecha, manto.Nombre, t1.nombre, puesto_trabajo.nombre1,t2.nombre,
        puesto_trabajo.nombre2, t3.nombre, puesto_trabajo.nombre3, tipo_labor.id, tipo_labor.tipo_labor, tipo_labor.subtipo_labor,
        tipo_labor.concepto_labor, labor.precio, labor.cantidad

        FROM empleado, puesto_trabajo, tipo_labor, manto, labor, tipo_puesto_trabajo t1, tipo_puesto_trabajo t2,
        tipo_puesto_trabajo t3

        WHERE labor.id_empleado=? and tipo_labor.id=labor.id_tipo_labor and puesto_trabajo.id=labor.id_puesto and t1.id=puesto_trabajo.id_puesto_trabajo1 and
        t2.id=puesto_trabajo.id_puesto_trabajo2 and t3.id=puesto_trabajo.id_puesto_trabajo3 and puesto_trabajo.estado=1 and
        manto.id=puesto_trabajo.id_manto and manto.id_mina=? and labor.periodo=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array( $empleado->_GET('id'),$mina,$periodo ) ) ;

        $labores=array();

        foreach ($resul as $row)
        {

            $labor=new labor();
            $labor->_SET('id',$row[0]);
            $labor->_SET('fecha',$row[1]);
            $labor->_SET('cantidad',$row['cantidad']);
            $labor->_SET('costo',$row['precio']);

            $tipo=new tipo_labor();

            $tipo->_SET("id",$row["id"]);
            $tipo->_SET("tipo_labor",$row["tipo_labor"]);
            $tipo->_SET("subtipo_labor",$row["subtipo_labor"]);
            $tipo->_SET("concepto_labor",$row["concepto_labor"]);
            $tipo->_SET("precio_unidad",$row["precio"]);

            $labor->_SET('tipo_labor',$tipo);

            $manto=new manto();
            $manto->_SET('nombre',$row[2]);

            $puesto_trabajo=new puesto_trabajo();
            $puesto_trabajo->_SET('nombre',$row[4]);

            $tipo_puesto_trabajo=new tipo_puesto_trabajo();
            $tipo_puesto_trabajo->_SET('nombre',$row[3]);

            $puesto_trabajo->_SET('manto',$manto);
            $puesto_trabajo->_SET('tipo_puesto_trabajo',$tipo_puesto_trabajo);

            $labor->_SET('puesto_trabajo',$puesto_trabajo);

            $labores[]=$labor;

        }

        return $labores;

    }

    public function registrar_labor($labor, $empleado, $comentario){
			
		include('bases.php');

		$consulta="SELECT precio_unidad from tipo_labor where id=?";

		$resul = $base->prepare($consulta);

		$resul->execute(array($labor->_GET("tipo_labor")->_GET("id")));

        $unidad=0;

		foreach ($resul as $row)
		{

			$unidad=$row[0];

		}

    	$consulta="INSERT INTO labor (id_puesto ,id_empleado, id_tipo_labor, cantidad, fecha, precio, periodo,comentario) values(?,?,?,?,?,?,?,?)";

    	$resul = $base->prepare($consulta);
    	$fecha =date("y")."-".date("m")."-".date("d");
        $laborDao=new labor_dao();
        session_start();
        $periodo= $laborDao->getPeriodoActual();

        echo $periodo;

		$resul->execute(array($labor->_GET("puesto_trabajo")->_GET("id"),
            $empleado->_GET("id"),
            $labor->_GET("tipo_labor")->_GET("id"),
		    $labor->_GET("cantidad"),
            $fecha,
            $unidad*$labor->_GET("cantidad"),
            $periodo,
            $comentario ));

		return "Registro de la labor exitoso";
	}

    public function registrar_laborJornal($labor, $empleado, $comentario){

       include('bases.php');

        $consulta="INSERT INTO labor (id_puesto ,id_empleado, id_tipo_labor, cantidad, fecha, precio, periodo,comentario) values(?,?,?,?,?,?,?,?)";

        $resul = $base->prepare($consulta);
        $fecha =date("y")."-".date("m")."-".date("d");
        $laborDao=new labor_dao();
        $periodo= $laborDao->getPeriodoActual();

        $resul->execute(array($labor->_GET("puesto_trabajo")->_GET("id"),
            $empleado->_GET("id"),
            $labor->_GET("tipo_labor")->_GET("id"),
            $labor->_GET("cantidad"),
            $fecha,
            $labor->_GET("costo"),
            $periodo,
            $comentario ));

        return "Registro de la labor exitoso";
    }

	public function getLabor($labor){


        include('bases.php');

        $consulta="SELECT DISTINCT labor.id, labor.fecha, manto.Nombre, t1.nombre, puesto_trabajo.nombre1,t2.nombre,
        puesto_trabajo.nombre2, t3.nombre, puesto_trabajo.nombre3, tipo_labor.id, tipo_labor.tipo_labor, tipo_labor.subtipo_labor,
        tipo_labor.concepto_labor, labor.precio, labor.cantidad, labor.comentario

        FROM empleado, puesto_trabajo, tipo_labor, manto, labor, tipo_puesto_trabajo t1, tipo_puesto_trabajo t2,
        tipo_puesto_trabajo t3

        WHERE labor.id=? and tipo_labor.id=labor.id_tipo_labor and puesto_trabajo.id=labor.id_puesto and t1.id=puesto_trabajo.id_puesto_trabajo1 and
        t2.id=puesto_trabajo.id_puesto_trabajo2 and t3.id=puesto_trabajo.id_puesto_trabajo3 and puesto_trabajo.estado=1 and
        manto.id=puesto_trabajo.id_manto  and labor.periodo=?";

        $resul = $base->prepare($consulta);

        $laborDao=new labor_dao();
        $periodo= $laborDao->getPeriodoActual();
        $resul->execute(array( $labor->_GET('id'),$periodo ) ) ;


        foreach ($resul as $row)
        {



            $labor->_SET('id',$row[0]);
            $labor->_SET('fecha',$row[1]);
            $labor->_SET('cantidad',$row['cantidad']);
            $labor->_SET('costo',$row['precio']);
            $labor->_SET('comentario',$row['comentario']);

            $tipo=new tipo_labor();

            $tipo->_SET("id",$row["id"]);
            $tipo->_SET("tipo_labor",$row["tipo_labor"]);
            $tipo->_SET("subtipo_labor",$row["subtipo_labor"]);
            $tipo->_SET("concepto_labor",$row["concepto_labor"]);
            $tipo->_SET("precio_unidad",$row["precio"]);

            $labor->_SET('tipo_labor',$tipo);

            $manto=new manto();
            $manto->_SET('nombre',$row[2]);

            $puesto_trabajo=new puesto_trabajo();
            $puesto_trabajo->_SET('nombre',$row[4]);

            $tipo_puesto_trabajo=new tipo_puesto_trabajo();
            $tipo_puesto_trabajo->_SET('nombre',$row[3]);

            $puesto_trabajo->_SET('manto',$manto);
            $puesto_trabajo->_SET('tipo_puesto_trabajo',$tipo_puesto_trabajo);

            $labor->_SET('puesto_trabajo',$puesto_trabajo);




        }

        return $labor;
	}

    public function getPeriodoActual(){

        include('bases.php');

        $consulta="SELECT periodo from mina where id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($_SESSION['id_mina']));

        foreach ($resul as $row)
        {

          $periodo= $row['periodo']."";

        }

        return $periodo;

    }

    public function cargarPeriodos(){


       include('bases.php');

        $consulta="SELECT periodo.periodo from periodo";

        $resul = $base->prepare($consulta);

        $resul->execute();

        $periodos=array();


        foreach ($resul as $row)
        {

            $periodos[]= $row['periodo']."";

        }

        return $periodos;

    }

    public function cargarTiposLabor(){
        include('bases.php');

        $consulta="SELECT DISTINCT tipo_labor from tipo_labor";

        $resul = $base->prepare($consulta);

        $resul->execute();

        $tipos_labores=array();


        foreach ($resul as $row)
        {

            $tipos_labores[]= $row['tipo_labor']."";

        }

        return $tipos_labores;
    }
    public function cargarSubtiposLabor(){
        include('bases.php');

        $consulta="SELECT DISTINCT subtipo_labor from tipo_labor";

        $resul = $base->prepare($consulta);

        $resul->execute();

        $tipos_labores=array();


        foreach ($resul as $row)
        {

            $tipos_labores[]= $row['subtipo_labor']."";

        }

        return $tipos_labores;
    }

}	