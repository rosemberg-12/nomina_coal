<?php 
require_once 'php/dto/puesto_trabajo.php';
class puesto_trabajo_dao{

	public function getPuestosByTipo($var,$var2){

		include('bases.php');

    	$consulta="SELECT puesto_trabajo.nombre, puesto_trabajo.id FROM puesto_trabajo
    	WHERE puesto_trabajo.id_puesto_trabajo=? and puesto_trabajo.id_manto=? and puesto_trabajo.estado=1";

    	$resul = $base->prepare($consulta);
		
		$resul->execute(array($var,$var2));

		$puestos=array();

		foreach ($resul as $row) {

			$puesto=new puesto_trabajo();

			$puesto->_SET('id',$row['id']);
			$puesto->_SET('nombre',$row['nombre']);

			$puestos[]=$puesto;

		}
		return $puestos;
	}

    public function cargarPuestosTrabajoMina($id_manto){

        include('bases.php');

        $consulta="SELECT
            puesto_trabajo.id,
            t1.nombre,
            puesto_trabajo.nombre1,
            t2.nombre,
            puesto_trabajo.nombre2,
            t3.nombre,
            puesto_trabajo.nombre3

            FROM puesto_trabajo, tipo_puesto_trabajo t1, tipo_puesto_trabajo t2, tipo_puesto_trabajo t3

            where puesto_trabajo.id_manto=? and t1.id=puesto_trabajo.id_puesto_trabajo1 and t2.id=puesto_trabajo.id_puesto_trabajo2 and t3.id=puesto_trabajo.id_puesto_trabajo3 and puesto_trabajo.estado=1";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id_manto));

        $puestos=array();

        foreach ($resul as $row) {

            $puesto=new puesto_trabajo();

            $t_puesto1=new tipo_puesto_trabajo();
            $t_puesto1->_SET('nombre',$row[1]);

            $t_puesto2=new tipo_puesto_trabajo();
            $t_puesto2->_SET('nombre',$row[3]);

            $t_puesto3=new tipo_puesto_trabajo();
            $t_puesto3->_SET('nombre',$row[5]);

            $puesto->_SET('tipo_puesto_trabajo1',$t_puesto1);
            $puesto->_SET('tipo_puesto_trabajo2',$t_puesto2);
            $puesto->_SET('tipo_puesto_trabajo3',$t_puesto3);
            $puesto->_SET('nombre1',$row[2]);
            $puesto->_SET('nombre2',$row[4]);
            $puesto->_SET('nombre3',$row[6]);
            $puesto->_SET('id',$row[0]);

            $puestos[]=$puesto;

        }
        return $puestos;

    }

    public function registrarPuesto($puesto_trabajo){

        include('bases.php');

        $consulta="INSERT INTO puesto_trabajo (nombre1,id_puesto_trabajo1,nombre2,id_puesto_trabajo2, nombre3,id_puesto_trabajo3,id_manto, estado) values(?,?,?,?,?,?,?,1)";

        $resul = $base->prepare($consulta);

        $resul->execute(array($puesto_trabajo->_GET("nombre1"),
            $puesto_trabajo->_GET("tipo_puesto_trabajo1")->_GET("id"),
            $puesto_trabajo->_GET("nombre2"),
            $puesto_trabajo->_GET("tipo_puesto_trabajo2")->_GET("id"),
            $puesto_trabajo->_GET("nombre3"),
            $puesto_trabajo->_GET("tipo_puesto_trabajo3")->_GET("id"),

            $puesto_trabajo->_GET("manto")->_GET("id")));

        return "Registro de la manto exitoso";


    }

    public function eliminarPuestoT($id_puesto){

        include('bases.php');

        $consulta="UPDATE puesto_trabajo set estado=0 WHERE id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id_puesto));


    }

}