<?php 
require_once 'php/dto/manto.php';
class manto_dao{

	public function getAllMantos(){

		include('bases.php');

    	$consulta="SELECT manto.nombre, manto.id FROM manto WHERE manto.id_mina=? and estado=1";

    	$resul = $base->prepare($consulta);
		
		$resul->execute(array($_SESSION["id_mina"]));

		$mantos=array();

		foreach ($resul as $row) {

			$manto=new manto();

			$manto->_SET('nombre',$row['nombre']);

			$manto->_SET('id',$row['id']);
			
			$mantos[]=$manto;
		}
	return $mantos;		

	}

    public function registrarManto($manto){

        include('bases.php');

        $consulta="INSERT INTO manto (Nombre,id_mina, estado) values(?,?,1)";

        $resul = $base->prepare($consulta);

        $resul->execute(array($manto->_GET("nombre"),$manto->_GET("id_mina")));

        return "Registro de la manto exitoso";

    }

    public function eliminarManto($id_manto){

        include('bases.php');

        $consulta="UPDATE manto set estado=0 WHERE id=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id_manto));

    }

    public function getIdManto($mina, $nombreManto){

        include('bases.php');

        $consulta="SELECT manto.id FROM manto WHERE manto.id_mina=? and estado=1 and Nombre=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($mina,$nombreManto));

        $manto="";

        foreach ($resul as $row) {
        $manto=$row['id'];
        }
        return $manto;
    }

}