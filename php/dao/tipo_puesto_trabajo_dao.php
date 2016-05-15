<?php 
class tipo_puesto_trabajo_dao{

	public function cargarTiposPuestoTrabajo(){

		include('bases.php');

    	$consulta="SELECT tipo_puesto_trabajo.nombre, tipo_puesto_trabajo.id FROM tipo_puesto_trabajo";

    	$resul = $base->prepare($consulta);
		
		$resul->execute();

		$tipos_pt=array();

		foreach ($resul as $row) {

			$tpt=new tipo_puesto_trabajo();
			$tpt->_SET('nombre',$row['nombre']);

			$tpt->_SET('id',$row['id']);

			$tipos_pt[]=$tpt;
		}

		return $tipos_pt;	

	}

    public function registrarTPT($tpt){
        include('bases.php');

        $consulta="INSERT INTO tipo_puesto_trabajo (id, nombre) values(?,?)";

        $resul = $base->prepare($consulta);

        $cosa=$resul->execute(array($tpt->_GET('id'), $tpt->_GET('nombre')));


        return $cosa;
    }

}